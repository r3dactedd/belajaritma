<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\RegistrationCertification;
use App\Models\Transaction;
use App\Notifications\TransactionApprovedNotification;
use App\Notifications\TransactionDeclinedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManageTransactionController extends Controller
{
    //
    public function showTransactionList(){
        //isApproved = null -> Transaction not made
        //isApproved = false & is_pending =true -> Transaction for the second time after failing
        $data = Transaction::where(function($query) {
            $query->where('isApproved', null)
                  ->orWhere(function($query) {
                      $query->where('isApproved', false)
                            ->where('is_pending', true);
                  });
        })->get();
        return view('administrator.admin_transaction',['data'=>$data]);
    }
    public function approveTransaction(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        $transaction = Transaction::find($id);
        $transaction->isApproved = true;
        $transaction->is_pending = false;
        $transaction->save();

        $registerTransaction = new RegistrationCertification();
        $registerTransaction->user_id = $transaction->transactionToUser->id;
        $registerTransaction->certif_id = $transaction->transactionToCertification->id;
        $registerTransaction->registered = true;
        $registerTransaction->save();

        $addStudentsRegistered = [];
        $addStudentsRegistered = [
            'students_registered' => \DB::raw('students_registered + 1'),
        ];
        Certification::where('id', $transaction->transactionToCertification->id)->update($addStudentsRegistered);
        $user = $transaction->transactionToUser;
        $user->notify(new TransactionApprovedNotification($transaction));

        return redirect('/manager/transaction')->with('success', 'Transaction approved successfully!');
    }

    public function declineTransaction(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        $transaction = Transaction::find($id);
        $transaction->isApproved = false;
        $transaction->is_pending = false;
        $transaction->save();

        $user = $transaction->transactionToUser;
     $user->notify(new TransactionDeclinedNotification($transaction));

        return redirect('/manager/transaction')->with('success', 'Transaction declined successfully!');
    }
}

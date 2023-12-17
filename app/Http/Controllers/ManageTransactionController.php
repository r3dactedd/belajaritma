<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManageTransactionController extends Controller
{
    //
    public function showTransactionList(){
        $data = Transaction::where('isApproved', null)->get();
        return view('administrator.admin_transaction',['data'=>$data]);
    }
    public function approveTransaction(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        $transaction = Transaction::find($id);
        $transaction->isApproved = true;
        $transaction->save();

        return redirect('/manager/transaction')->with('success', 'Transaction approved successfully!');
    }

    public function declineTransaction(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());
        $transaction = Transaction::find($id);
        $transaction->isApproved = false;
        $transaction->save();

        return redirect('/manager/transaction')->with('success', 'Transaction declined successfully!');
    }
}

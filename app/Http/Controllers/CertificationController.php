<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    //
    public function showCertificationList(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            $data = Certification::where('certif_title', 'like', "%$searchKeyword%")->get();
            return view('contents.certifications', compact('data'));
        }
        else{
            $data = Certification::all();
            return view('contents.certifications',['data'=>$data]);
        }
    }

    public function certifDetail($id){
        $data=Certification::find($id);
        return view('contents.certification_details', ['data' => $data]);
    }
    public function registerCertification($id){
        $data=Certification::find($id);
        return view('transactions.transaction', ['data' => $data]);
    }
    public function createTransaction(Request $request){
        $request->validate([
            'transaction_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filename = Str::orderedUuid() . "." . $request->file('transaction_proof')->getClientOriginalExtension();
        $request->transaction_proof->storeAs('transaction_images', $filename, 'transaction_images');

        $transaction = new Transaction();
        $transaction->user_id = Auth()->user()->id;
        $transaction->certif_id =  $request->certif_id;
        $transaction->payment_code = Str::uuid();
        $transaction->transaction_proof = $filename;


        $transaction->save();
        // transaction_proof
        return redirect("/certifications/{$request->certif_id}");
    }
}

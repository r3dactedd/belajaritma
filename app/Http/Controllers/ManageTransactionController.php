<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ManageTransactionController extends Controller
{
    //
    public function showTransactionList(){
        $data = Transaction::all();
        return view('administrator.admin_transaction',['data'=>$data]);
    }
}

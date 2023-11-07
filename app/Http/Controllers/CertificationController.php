<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

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
        // dd($contentArray);
    }
}

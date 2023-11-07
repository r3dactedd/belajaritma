<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ManageCertificationController extends Controller
{
    //
    public function showCertificationData(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            // dd($searchKeyword);
            $data = Certification::where('certif_title', 'like', "%$searchKeyword%")->get();
            return view('administrator.admin_certifications.admin_certification', compact('data'));
        }
        else{
            $data = Certification::all();
            return view('administrator.admin_certifications.admin_certification',['data'=>$data]);
        }
    }

    public function createCertification(Request $request){
        $request->validate([
            'certif_title' => 'required|string',
            'certif_short_desc' => 'required|string',
            'certif_desc' => 'required|string',
            'certif_duration'=> 'required|integer|min:0',
            'certif_cost'=> 'required|integer|min:0',
            'certif_outline' => 'required|string',
        ]);
        $imageName = $request->certif_img->getClientOriginalName();
        $request->certif_img->storeAs('storage/images', $imageName);

        $certif = new Certification();
        $certif->certif_title = $request->certif_title;
        $certif->certif_short_desc = $request->certif_short_desc;
        $certif->certif_desc = $request->certif_desc;
        $certif->certif_duration = $request->certif_duration;
        $certif->certif_img = $request->certif_img;
        $certif->certif_cost = $request->certif_cost;
        $certif->certif_outline = $request->certif_outline;

        $certif->created_by = Auth()->user()->id;
        $certif->updated_by = Auth()->user()->id;

        $filename = Str::orderedUuid() . "." . $request->certif_img->getClientOriginalExtension();
        $certif->certif_img = $filename;

        Storage::putFileAs('public/images/', $request->certif_img, $filename);

        $certif->save();
        // dd($certif);
        return redirect('/manager/certification')->with('success', 'Certification creation successfull!');
    }

    public function editCertifPage($id){
        $data=Certification::find($id);
        return view('administrator.admin_certifications.admin_certification_edit', ['data' => $data]);
    }
    public function editCertifPOST(Request $request, $id){
        $validateCertif=$request->validate([
            'certif_title' => 'required|string',
            'certif_short_desc' => 'required|string',
            'certif_desc' => 'required|string',
            'certif_duration'=> 'required|integer|min:0',
            'certif_cost'=> 'required|integer|min:0',
            'certif_outline' => 'required|string',
        ]);
        $changeProfile = [];

        if ($request->hasFile('certif_img')) {
            $filename = Str::orderedUuid() . "." . $request->file('certif_img')->getClientOriginalExtension();
            $request->file('certif_img')->storeAs('public/images', $filename);
            $changeProfile['certif_img'] = $filename;
        }

        // Check if 'certif_img' exists in the validated data
        if (array_key_exists('certif_img', $validateCertif)) {
            unset($validateProfile['certif_img']);
        }

        $changeProfile += [
            'certif_title' => $validateCertif['certif_title'],
            'certif_short_desc' => $validateCertif['certif_short_desc'],
            'certif_desc' => $validateCertif['certif_desc'],
            'certif_duration'=> $validateCertif['certif_duration'],
            'certif_cost'=> $validateCertif['certif_cost'],
            'certif_outline' => $validateCertif['certif_outline'],
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id,
        ];

        Certification::where('id', $id)->update($changeProfile);
        return redirect('/manager/certification')->with('success', 'Certification edit successfull!');
    }
}

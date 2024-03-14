<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\CertifQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ManageCertificationController extends Controller
{
    //
    public function showCertificationData(Request $request)
    {
        $searchKeyword = $request->input('searchKeyword');

        if ($searchKeyword) {
            $data = Certification::where('certif_title', 'like', "%$searchKeyword%")->get();
        } else {
            $data = Certification::all();
        }

        return view('administrator.admin_certifications.admin_certification', compact('data'));
    }

    public function createCertification(Request $request){
        if (!Auth::check()) {
            // Jika pengguna belum masuk, redirect ke halaman login dengan pesan peringatan
            return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk mendaftar sertifikasi.');
        }
        $rules = [
            'certif_title' => 'required|string|max:50',
            'certif_short_desc' => 'required|string|max:150',
            'certif_desc' => 'required|string|max:500',
            'certif_duration'=> 'required|integer|min:1',
            'certif_cost'=> 'required|integer|min:1',
            'certif_outline' => 'required|string|max:500',
            'certif_img' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $filename = '';
        if ($request->hasFile('certif_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('certif_img')->getClientOriginalExtension();
            $request->file('certif_img')->storeAs('certif_images', $filename, 'certif_images');
        }

        $certif = new Certification();
        $certif->certif_title = $request->certif_title;
        $certif->certif_short_desc = $request->certif_short_desc;
        $certif->certif_desc = $request->certif_desc;
        $certif->certif_duration = $request->certif_duration;
        $certif->certif_img = $filename;
        $certif->certif_cost = $request->certif_cost;
        $certif->certif_outline = $request->certif_outline;

        $certif->created_by = Auth()->user()->id;
        $certif->updated_by = Auth()->user()->id;

        $certif->save();
        // dd($certif);
        return Redirect::to("/manager/certification/edit/test/{$certif->id}");
    }

    public function deleteCertification($id){
        $data=Certification::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Course not found.');
        }
        $data->delete();
        return redirect('/manager/certification')->with('success', 'Course deleted successfully.');
    }

    public function editCertifPage($id){
        $data=Certification::find($id);
        return view('administrator.admin_certifications.admin_certification_edit', ['data' => $data]);
    }
    public function editCertifPOST(Request $request, $id){
        $rules = [
            'certif_title' => 'required|string|max:50',
            'certif_short_desc' => 'required|string|max:150',
            'certif_desc' => 'required|string|max:500',
            'certif_duration'=> 'required|integer|min:1',
            'certif_cost'=> 'required|integer|min:1',
            'certif_outline' => 'required|string|max:500',
            'certif_img' =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }


        if ($request->hasFile('certif_img')) {
            $filename = Str::orderedUuid() . "." . $request->file('certif_img')->getClientOriginalExtension();
            $request->file('certif_img')->storeAs('certif_images', $filename, 'certif_images');
            Certification::where('id', $id)->update([
                'certif_title' => $request->certif_title,
                'certif_short_desc' => $request->certif_short_desc,
                'certif_desc' => $request->certif_desc,
                'certif_duration'=> $request->certif_duration,
                'certif_cost' => $request->certif_cost,
                'certif_outline'=> $request->certif_outline,
                'certif_img' => $request->certif_img,
                'updated_by' => Auth()->user()->id,
            ]);
            return redirect('/manager/certification')->with('success', 'Certification edit successfull!');
        }
        else{
            Certification::where('id', $id)->update([
                'certif_title' => $request->certif_title,
                'certif_short_desc' => $request->certif_short_desc,
                'certif_desc' => $request->certif_desc,
                'certif_duration'=> $request->certif_duration,
                'certif_cost' => $request->certif_cost,
                'certif_outline'=> $request->certif_outline,
                'updated_by' => Auth()->user()->id,
            ]);
            return redirect('/manager/certification')->with('success', 'Certification edit successfull!');
        }


    }

    public function editCertifTestPage($id){
        $data=Certification::find($id);
        $certif_questions = CertifQuestions::where('certification_id', $id)->get();
        return view('administrator.admin_certifications.admin_certification_test', ['data' => $data, 'certif_questions' => $certif_questions]);
    }

    public function setScore(Request $request){
        Log::info('Request Data:', $request->all());
        $certifId = $request->certification_id;
        $user = Auth::user();
        // dd($request);
        $validateScore = $request->validate([
            'minimum_score'=>'required|integer|max:100',
            'total_questions'=>'required|integer',
            'certif_duration' => 'required|numeric',
        ]);
        $changeScore= [];

        $changeScore += [
            'minimum_score'=> $validateScore['minimum_score'],
            'total_questions'=> $validateScore['total_questions'],
            'certif_duration'=> $validateScore['certif_duration'],
            'updated_by' => $user->id,
        ];
        // dd($changeMaterialDetail);
        Certification::where('id',$request->certification_id)->update($changeScore);
        return Redirect::to("/manager/certification/edit/test/{$certifId}");
    }

    public function createCertifQuestions(Request $request, $id){
        Log::info('Request Data:', $request->all());
        $user = Auth::user();
        $certif = Certification::find($id);
        $request->validate([
            'questions'=>'required|string',
            'jawaban_a'=>'required|string',
            'jawaban_b'=>'required|string',
            'jawaban_c'=>'required|string',
            'jawaban_d'=>'required|string',
            'jawaban_benar'=>'required|string',
        ]);
        $createCertifQuestions = new CertifQuestions();
        $createCertifQuestions->questions = $request->questions;
        $createCertifQuestions->jawaban_a = $request->jawaban_a;
        $createCertifQuestions->jawaban_b = $request->jawaban_b;
        $createCertifQuestions->jawaban_c = $request->jawaban_c;
        $createCertifQuestions->jawaban_d = $request->jawaban_d;
        $createCertifQuestions->jawaban_benar = $request->jawaban_benar;
        $createCertifQuestions->certification_id = $id;
        $filename = '';
        if ($request->hasFile('question_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('question_img')->getClientOriginalExtension();
            $request->file('question_img')->storeAs('certif_question_img', $filename, 'certif_question_img');
            $createCertifQuestions->question_img =  $filename;
        }
        // dd($createAssignment);
        if($certif->total_questions == 0){
            $addTotalQuestions = [];
            $addTotalQuestions = [
                'total_questions' => \DB::raw('total_questions + 1'),
                'updated_by' => $user->id,
            ];
            Certification::where('id', $createCertifQuestions->certification_id)->update($addTotalQuestions);
        }

        $createCertifQuestions->save();
        return Redirect::to("/manager/certification/edit/test/{$id}");
    }

    public function editCertifQuestions(Request $request,$id){
        Log::info('Request Data:', $request->all());
        $user = Auth::user();
        $validateQuestions=$request->validate([
            'questions'=>'required|string',
            'jawaban_a'=>'required|string',
            'jawaban_b'=>'required|string',
            'jawaban_c'=>'required|string',
            'jawaban_d'=>'required|string',
            'jawaban_benar'=>'required|string',
            'question_img'=>'image|file',
        ]);

        $changeCertTest = [];
        $filename = '';
        if ($request->hasFile('question_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('question_img')->getClientOriginalExtension();
            $request->file('question_img')->storeAs('certif_question_img', $filename, 'certif_question_img');
            $changeCertTest['question_img'] = $filename;
        }

        if (array_key_exists('question_img', $validateQuestions)) {
            unset($validateQuestions['question_img']);
        }
        $changeCertTest += [
            'questions'=> $validateQuestions['questions'],
            'jawaban_a'=>$validateQuestions['jawaban_a'],
            'jawaban_b'=>$validateQuestions['jawaban_b'],
            'jawaban_c'=>$validateQuestions['jawaban_c'],
            'jawaban_d'=>$validateQuestions['jawaban_d'],
            'jawaban_benar'=>$validateQuestions['jawaban_benar'],
        ];
        CertifQuestions::where('id', $request->certif_test_id)->update($changeCertTest);
        Certification::where('id', $request->certification_id)->update([
            'updated_by' => $user->id,
        ]);
        return Redirect::to("/manager/certification/edit/test/{$request->certification_id}");
        // return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }

    public function deleteCertifQuestion(Request $request,$id){
        $user = Auth::user();
        $certif_test_questions = CertifQuestions::find($request->certif_test_id);
        $certif = Certification::find($certif_test_questions->certification_id);
        if (!$certif_test_questions) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
        if($certif->total_questions == 1){
            $decreaseTotalQuestions = [];
            $decreaseTotalQuestions = [
                'total_questions' => \DB::raw('total_questions - 1'),
                'updated_by' => $user->id,
            ];
            Certification::where('id', $request->certification_id)->update($decreaseTotalQuestions);
        }


        $certif_test_questions->delete();
        // dd($assignment_questions);
        return Redirect::to("/manager/certification/edit/test/{$request->certification_id}");
    }

    public function unpublishCertif($id){
        $data=Certification::find($id);
        $data->ready_for_publish = false;
        $data->updated_by = Auth()->user()->id;;
        $data->save();
        return Redirect::to("/manager/certification/edit/{$id}");
    }

    public function publishCertif($id){
        $data=Certification::find($id);
        $data->ready_for_publish = true;
        $data->updated_by = Auth()->user()->id;;
        $data->save();
        return Redirect::to("/manager/certification/edit/{$id}");
    }
}

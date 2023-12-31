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
        $request->validate([
            'certif_title' => 'required|string',
            'certif_short_desc' => 'required|string',
            'certif_desc' => 'required|string',
            'certif_duration'=> 'required|integer|min:0',
            'certif_cost'=> 'required|integer|min:0',
            'certif_outline' => 'required|string',
            'certif_img' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

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
        $validateCertif=$request->validate([
            'certif_title' => 'required|string',
            'certif_short_desc' => 'required|string',
            'certif_desc' => 'required|string',
            'certif_duration'=> 'required|integer|min:0',
            'certif_cost'=> 'required|integer|min:0',
            'certif_outline' => 'required|string',
        ]);
        $changeCertif = [];

        if ($request->hasFile('certif_img')) {
            $filename = Str::orderedUuid() . "." . $request->file('certif_img')->getClientOriginalExtension();
            $request->file('certif_img')->storeAs('certif_images', $filename, 'certif_images');
            $changeCertif['certif_img'] = $filename;
        }

        // Check if 'certif_img' exists in the validated data
        if (array_key_exists('certif_img', $validateCertif)) {
            unset($validateCertif['certif_img']);
        }

        $changeCertif += [
            'certif_title' => $validateCertif['certif_title'],
            'certif_short_desc' => $validateCertif['certif_short_desc'],
            'certif_desc' => $validateCertif['certif_desc'],
            'certif_duration'=> $validateCertif['certif_duration'],
            'certif_cost'=> $validateCertif['certif_cost'],
            'certif_outline' => $validateCertif['certif_outline'],
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id,
        ];

        Certification::where('id', $id)->update($changeCertif);
        return redirect('/manager/certification')->with('success', 'Certification edit successfull!');
    }

    public function editCertifTestPage($id){
        $data=Certification::find($id);
        $certif_questions = CertifQuestions::where('certification_id', $id)->get();
        return view('administrator.admin_certifications.admin_certification_test', ['data' => $data, 'certif_questions' => $certif_questions]);
    }

    public function setScore(Request $request){
        Log::info('Request Data:', $request->all());

        // dd($request);
        $validateScore = $request->validate([
            'minimum_score'=>'required|integer|max:100',
        ]);
        $changeScore= [];

        $changeScore += [
            'minimum_score'=> $validateScore['minimum_score'],
        ];
        // dd($changeMaterialDetail);
        Certification::where('id',$request->certification_id)->update($changeScore);
        return Redirect::to("/manager/certification/edit/test/{$request->certification_id}");
    }

    public function createCertifQuestions(Request $request, $id){
        Log::info('Request Data:', $request->all());
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
        $addTotalQuestions = [];
        $addTotalQuestions = [
            'total_questions' => \DB::raw('total_questions + 1'),
        ];
        Certification::where('id', $createCertifQuestions->certification_id)->update($addTotalQuestions);

        $createCertifQuestions->save();
        return Redirect::to("/manager/certification/edit/test/{$id}");
    }

    public function editCertifQuestions(Request $request){
        Log::info('Request Data:', $request->all());
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
        return Redirect::to("/manager/certification/edit/test/{$request->certification_id}");
        // return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }

    public function deleteCertifQuestion(Request $request){
        $certif_test_questions = CertifQuestions::find($request->certif_test_id);
        if (!$certif_test_questions) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
        $decreaseTotalQuestions = [];
        $decreaseTotalQuestions = [
            'total_questions' => \DB::raw('total_questions - 1'),
        ];
        Certification::where('id', $request->certification_id)->update($decreaseTotalQuestions);

        $certif_test_questions->delete();
        // dd($assignment_questions);
        return Redirect::to("/manager/certification/edit/test/{$request->certification_id}");
    }
}

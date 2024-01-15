<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\CertifQuestions;
use App\Models\RegistrationCertification;
use App\Models\Transaction;
use App\Models\UserAnswerCertificationTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{

    public function showCertificationList(Request $request)
    {
        $searchKeyword = $request->input('searchKeyword');

        $query = Certification::where('ready_for_publish', 1);

        if ($searchKeyword) {
            $query->where('certif_title', 'like', "%$searchKeyword%");
        }

        $data = $query->get();

        $data = $data->map(function ($course) {
            $course->course_img_url = asset('uploads/course_images/' . $course->course_img);
            return $course;
        });

        return view('contents.certifications', compact('data'));
    }

    public function certifDetail($id){
        $data=Certification::find($id);
        $register = RegistrationCertification::where('user_id', auth()->id())->where('certif_id', $data->id)->first();
        $transaction = Transaction::where('user_id', auth()->id())->where('certif_id', $data->id)->first();
        return view('contents.certification_details', ['data' => $data, 'register' => $register, 'transaction'=>$transaction]);
    }

    public function registerCertification($id){
        $data=Certification::find($id);
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk mendaftar sertifikasi.');
        }
        if ($data) {
            session()->flash('success', 'Transaction Sent');
        }
        return view('transactions.transaction', ['data' => $data]);
    }
    public function createTransaction(Request $request, $id){

        $request->validate([
            'transaction_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $findTransaction = Transaction::where('user_id', auth()->id())->where('certif_id', $id)->first();
        if(!$findTransaction){
            $filename = Str::orderedUuid() . "." . $request->file('transaction_proof')->getClientOriginalExtension();
            $request->transaction_proof->storeAs('transaction_images', $filename, 'transaction_images');

            $transaction = new Transaction();
            $transaction->user_id = Auth()->user()->id;
            $transaction->certif_id =  $request->certif_id;
            $transaction->payment_code = Str::uuid();
            $transaction->transaction_proof = $filename;
            $transaction->is_pending = true;
            $transaction->save();
        }
        else{
            $filename = Str::orderedUuid() . "." . $request->file('transaction_proof')->getClientOriginalExtension();
            $request->transaction_proof->storeAs('transaction_images', $filename, 'transaction_images');

            $findTransaction->update([
                'payment_code' => Str::uuid(),
                'transaction_proof' => $filename,
                'is_pending' => true,
            ]);
        }

        // transaction_proof
        return redirect("/certifications/{$request->certif_id}");
    }
    public function aboutTest($certif_id){
        $data=Certification::find($certif_id);
        $firstIndexCERT = CertifQuestions::where('certification_id', $certif_id)->inRandomOrder()->first();
        return view('contents.certif_test_detail', ['data' => $data, 'firstIndexCERT'=>$firstIndexCERT]);
    }
    public function certifTestPage ($certif_id, $question_id, $isReshuffle){
        $totalQuestions = Certification::where('id', $certif_id)->first();
        if ($isReshuffle == 1) {
            // Retrieve all question IDs for the given material
            $allQuestionIds = CertifQuestions::where('certification_id', $certif_id)
                ->pluck('id')->toArray();

            // Shuffle all question IDs
            shuffle($allQuestionIds);

            // Set the desired count of shuffled questions (e.g., 5)
            $shuffledQuestionCount = $totalQuestions->total_questions;

            // Ensure that the first question after shuffling is the same as $question_id
            $firstShuffledId = intval($question_id);
            $firstShuffledIdIndex = array_search($firstShuffledId, $allQuestionIds);

            if ($firstShuffledIdIndex !== false) {
                // Remove the $firstShuffledId from the array
                unset($allQuestionIds[$firstShuffledIdIndex]);
            }

            // Take the desired count of shuffled questions
            $shuffledQuestionIds = array_slice($allQuestionIds, 0, $shuffledQuestionCount - 1);

            // Replace occurrences of $firstShuffledId with other IDs
            foreach ($shuffledQuestionIds as $index => $shuffledId) {
                if ($shuffledId == $firstShuffledId) {
                    // Replace with another ID from the allQuestionIds array
                    $shuffledQuestionIds[$index] = array_shift($allQuestionIds);
                }
            }

            // Add the $firstShuffledId to the beginning of the array
            array_unshift($shuffledQuestionIds, $firstShuffledId);

            session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => true]);
        } else {
            // If not set or not reshuffled, use the existing shuffledQuestionIds or the original order
            $shuffledQuestionIds = session('shuffledQuestionIds');
        }




        // dd($shuffledQuestionIds);
        $currentQuestionIndex = array_search($question_id, $shuffledQuestionIds);

        // Determine the next and previous question IDs
        $nextQuestionId = $shuffledQuestionIds[($currentQuestionIndex + 1) % count($shuffledQuestionIds)];
        $previousQuestionId = $shuffledQuestionIds[($currentQuestionIndex - 1 + count($shuffledQuestionIds)) % count($shuffledQuestionIds)];

        $firstQuestionId =intval($shuffledQuestionIds[0]);
        $firstQuestion = CertifQuestions::find($firstQuestionId);
        // Check if the current question is the last one in the shuffled order

        $isLastQuestion = ($currentQuestionIndex + 1) == count($shuffledQuestionIds);

        // dd($shuffledQuestionIds, $nextQuestionId, $previousQuestionId, $firstQuestionId);

        // Fetch the question details based on the shuffled order
        $shuffledQuestionId = $shuffledQuestionIds[$currentQuestionIndex];
        $questionDetail = CertifQuestions::find($shuffledQuestionId);

        // Calculate the current question number based on the shuffled order
        $currentQuestionNumber = $currentQuestionIndex + 1;
        $latestQuestion = CertifQuestions::where('certification_id', $certif_id)->orderBy('id', 'desc')->first();
        // $latestQuestion = CertifQuestions::where('certification_id', $certif_id)->orderBy('id', 'desc')->first();
        $listQuestionId = $shuffledQuestionIds;
        $data=Certification::find($certif_id);
        $certifDuration = $data->certif_duration;

        return view('contents.certif_test_questions', ['currentQuestionIndex'=>$currentQuestionIndex,'listQuestionId'=>$listQuestionId, 'questionDetail' => $questionDetail,'question_id'=>$question_id, 'nextQuestionId'=>$nextQuestionId, 'previousQuestionId'=>$previousQuestionId, 'isLastQuestion'=>$isLastQuestion, 'firstQuestion'=>$firstQuestion, 'certif_id'=>$certif_id,
        'currentQuestionNumber'=>$currentQuestionNumber, 'id'=>$certif_id, 'certifDuration'=>$certifDuration]);
    }


    public function submitAnswers(Request $request){
        Log::info('Submit Answers Request:', $request->all());
        // Validasi request jika diperlukan
        $user = Auth::user();
        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login'); // Redirect to the login page or another appropriate action
        }

        $submissionData = $request->only(['answers', 'courseId', 'materialId']);

        $userAnswers = $request->input('answers');
        $userId = $user->id; // Mendapatkan ID pengguna yang sedang login
        $certifId = $request->filled('certifId') ? $request->input('certifId') : null;
        $certification = Certification::findOrFail($certifId);
        if (is_array($userAnswers)) {
            // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
            foreach ($userAnswers as $answer) {
                $questionId = $answer['questionId'];
                $selectedAnswer = $answer['answer'];
                $answerDetail = $answer['answerDetail'];

                $existingAnswer = UserAnswerCertificationTest::where([
                    'user_id' => $userId,
                    'question_id' => $questionId,
                    'type' => 'Certification Test', // Adjust the type as needed
                ])->first();

                if ($existingAnswer) {
                    // Jika jawaban sudah ada, update jawaban yang ada
                    $existingAnswer->update([
                        'selected_answer' => $selectedAnswer,
                        'answer_detail' => $answerDetail,
                    ]);
                } else {
                    // Jika jawaban belum ada, tambahkan jawaban baru ke database
                    UserAnswerCertificationTest::create([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'selected_answer' => $selectedAnswer,
                        'answer_detail' => $answerDetail,
                        'type' => 'Certification Test', // Adjust the type as needed
                    ]);
                }
            }
        }
            return redirect()->route('certification.showResults', [$certifId]);
    }


    public function showResults($certif_id){
        $register = RegistrationCertification::where('user_id', auth()->id())->where('certif_id', $certif_id)->first();
        $certif = Certification::findOrFail($certif_id);

        if ($register) {
                // $certifQuestion = CertifQuestions::where('certification_id', $certif_id)->orderBy('id', 'asc')->get();

                // $userAnswers = UserAnswerCertificationTest::where('user_id', auth()->id())
                // ->orderBy('id', 'asc')
                // ->whereIn('question_id', $certifQuestion->pluck('id'))
                // ->get();

                $certifQuestion = CertifQuestions::where('certification_id', $certif_id)->orderBy('id', 'asc')->get();

                $userAnswers = UserAnswerCertificationTest::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $certifQuestion->pluck('id'))->get();

                Log::info('User Answers Count:', [$userAnswers->count()]);
                Log::info('User Answers:', $userAnswers->toArray());
                // Calculate the user's score
                $totalQuestions = $certif->total_questions;
                $correctAnswers = 0;
                $userScore=0;
                $counter = 0;
                Log::info('Total Questions:', [$totalQuestions]);
                foreach ($userAnswers as $userAnswer) {
                    $question = $certifQuestion->where('id', $userAnswer->question_id)->first();

                    // Check if the selected answer matches the correct answer
                    if ($userAnswer->selected_answer === $question->jawaban_benar) {
                        $userAnswer->is_correct=true;
                        $userAnswer->save();
                        $correctAnswers++;
                    }
                    else{
                        $userAnswer->is_correct=false;
                        $userAnswer->save();
                    }
                    $counter++;
                    if ($counter >= $totalQuestions) {
                        break;  // Exit the loop if the counter reaches 25
                    }
                }

                $userScore = ceil(($correctAnswers / $totalQuestions) * 100);

                RegistrationCertification::where('certif_id', $certif_id)->update([
                    'total_score' => $userScore,
                    'attempts' => \DB::raw('attempts + 1'),
                ]);
                if($userScore>=$certif->minimum_score){
                    $register->passed = true;
                    $register->save();
                }
                Log::info('Total Correct Answers:', [$correctAnswers]);
                Log::info('Total Scores:', [$userScore]);

                return response()->json(['message' => 'Success']);

        }
    }
    public function showScore($certif_id){
        $firstIndex = CertifQuestions::where('certification_id', $certif_id)->first();
        $certif = Certification::findOrFail($certif_id);
        $register = RegistrationCertification::where('user_id', auth()->id())->where('certif_id', $certif_id)->first();
        $questions = CertifQuestions::where('certification_id', $certif_id)->orderBy('id', 'asc')->get();
        $totalQuestions = $questions->count();
        $firstIndexCERT = CertifQuestions::where('certification_id', $certif_id)->inRandomOrder()->first();
        $userAnswers = UserAnswerCertificationTest::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $questions->pluck('id'))->get();
        $remainingTime=null;
        // dd($register);
        if ($register->attempts >= 1 && $register->total_score < $certif->minimum_score) {
            $this->blockUserforADay($register);
            $tempRegister = RegistrationCertification::where('user_id', auth()->id())->where('certif_id', $certif_id)->first();
            $remainingTime = Carbon::now()->diffInMinutes($tempRegister->blocked_until);
        }
        if($register->blocked_until){
            $remainingTime = Carbon::now()->diffInMinutes($register->blocked_until);
        }
        if($remainingTime == 0){
            $register->blocked_until = null;
            $register->save();
            $remainingTime = 0;
        }
        return view('contents.certif_test_results', compact('userAnswers', 'questions','certif','firstIndex','register','totalQuestions','firstIndexCERT','remainingTime'));
    }
    protected function blockUserForADay ($register){
        RegistrationCertification::where('id', $register->id)->update([
            'blocked_until' => Carbon::now()->addDay(1),
            'attempts' => 0,
        ]);

    }
}

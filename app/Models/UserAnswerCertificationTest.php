<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerCertificationTest extends Model
{
    use HasFactory;
    public $table = "user_answers_certification_test";
    protected $fillable = [
        'user_id',
        'question_id',
        'selected_answer',
        'answer_detail',
        'is_correct',
        'question_shown',
        'certif_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(CertifQuestions::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerFinalTest extends Model
{
    use HasFactory;
    public $table = "user_answers_final_test";
    protected $fillable = [
        'user_id',
        'question_id',
        'selected_answer',
        'answer_detail',
        'is_correct',
        'question_shown',
        'material_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(FinalTestQuestions::class);
    }
}

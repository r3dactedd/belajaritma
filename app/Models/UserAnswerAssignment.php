<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerAssignment extends Model
{
    use HasFactory;
    public $table = "user_answers_assignment";
    protected $fillable = [
        'user_id',
        'question_id',
        'selected_answer',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(AssignmentQuestions::class);
    }
}

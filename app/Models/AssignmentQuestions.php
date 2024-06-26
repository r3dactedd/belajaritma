<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentQuestions extends Model
{
    use HasFactory;
    public $table = "assignment_questions";
    protected $guarded='id';
    protected $fillable = [
        'material_id',
        'question_img',
        'questions',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_benar',
    ];
    public function questionToMaterial(){
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function questionToAnswer(){
        return $this->hasMany(UserAnswerAssignment::class,'question_id');
    }

}

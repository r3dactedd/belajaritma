<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalTestQuestions extends Model
{
    use HasFactory;
    public $table = "final_test_questions";
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertifQuestions extends Model
{
    use HasFactory;
    public $table = "certification_questions";
    protected $guarded='id';
    protected $fillable = [
        'certification_id',
        'question_img',
        'questions',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_benar',
    ];
    public function questionToCertification(){
        return $this->belongsTo(Certification::class, 'certification_id');
    }
}

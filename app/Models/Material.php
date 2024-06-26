<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public $table = "material";
    protected $guarded='id';
    protected $fillable = [
        'material_id',
        'master_type_id',
        'title',
        'course_id',
        'description',
        'detailed_description',
        'minimum_score',
        'total_questions',
        'material_duration',
        'pdf_link',
        'video_link',
    ];


    public function materialToCourse(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function materialContentToMasterType(){
        return $this->belongsTo(MasterType::class, 'master_type_id');
    }
    public function materialToAssignmentQuestion() {
        return $this->hasMany(AssignmentQuestions::class);
    }
    public function materialToFinalQuestions() {
        return $this->hasMany(FinalTestQuestions::class);
    }
}

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
        'course_id',
        'master_type_id',
        'material_title',
        'material_description',
        'question',
        'answer',
        'pdf_link',
        'video_link',
    ];

    public function materialToCourse(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function materialToMaster(){
        return $this->belongsTo(MasterType::class, 'master_type_id');
    }

    public function materialToModuleContent(){
        return $this->hasMany(ModuleContent::class, 'material_id','id');
    }
}

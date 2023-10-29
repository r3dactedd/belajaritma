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
        'description',
        'pdf_link',
        'video_link'
    ];


    public function materialToCourse(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function materialContentToMasterType(){
        return $this->belongsTo(MasterType::class, 'master_type_id');
    }
}

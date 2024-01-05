<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialCompleted extends Model
{
    use HasFactory;
    public $table = "material_completed";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'course_id',
        'material_id',
        'enrollment_id',
        'total_score',
        'attempts',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function material(){
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function enrollment(){
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }
}

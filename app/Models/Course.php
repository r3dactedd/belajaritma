<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded='id';
    protected $fillable = [
        'course_name',
        'short_desc',
        'course_desc',
        'level',
        'course_img',
        'screen_resolution',
        'minimum_ram',
        'processor',
        'total_time',
        'total_module',
        'operating_system',
        'other_programs',
        'created_by',
        'updated_by',
        'students_enrolled',
    ];

    public function courseToSidebar(){
        return $this->hasMany(Sidebar::class,'id','id');
    }

    public function corseToMaterial(){
        return $this->hasMany(Material::class,'id','id');
    }

    public function courseToMaterial(){
        return $this->hasMany(Material::class, 'course_id','id');
    }

    public function materialToCourse(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function findUpdatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function findCreatedBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}

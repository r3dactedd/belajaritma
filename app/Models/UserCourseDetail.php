<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseDetail extends Model
{
    use HasFactory;

    public $table = "user_course_detail";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'course_id',
        'last_accessed_material'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}

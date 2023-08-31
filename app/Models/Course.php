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
        'course_desc',
    ];

    public function courseToSidebar(){
        return $this->belongsTo(Sidebar::class,'id','id');
    }
}

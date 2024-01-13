<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSidebarProgress extends Model
{
    use HasFactory;

    public $table = "user_sidebar_progress";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'sidebar_id',
        'course_id',
        'material_id',
        'is_visible',
        'is_locked'
    ];
    public function sidebarProgressToUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function sidebarProgressToCourse(){
        return $this->belongsTo(Course::class,'course_id','id');
    }


    public function sidebarProgressToMaterial(){
        return $this->belongsTo(Material::class,'material_id','id');
    }

    public function sidebarProgressToSidebar(){
        return $this->belongsTo(Sidebar::class,'sidebar_id','id');
    }
}

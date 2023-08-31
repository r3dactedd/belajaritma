<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    use HasFactory;
    public $table = "sidebar";
    protected $guarded='id';
    protected $fillable = [
        'course_id',
        'parent_id',
        'title',
        'path',
        'type',
    ];
    public function sidebarToCourse(){
        return $this->hasMany(Course::class,'id','id');
    }
}

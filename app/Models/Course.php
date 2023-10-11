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
        return $this->hasMany(Sidebar::class,'id','id');
    }

    public function corseToMaterial(){
        return $this->hasMany(Material::class,'id','id');
    }

    public function courseToMaterial(){
        return $this->hasMany(Material::class, 'course_id','id');
    }
}

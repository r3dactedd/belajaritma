<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    public $table = "forum";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'course_id',
        'master_type_id',
        'material_id',
        'forum_title',
        'forum_message',
        'forum_attachment',
        'reply_id',
        'parent_id',
    ];
    public function formToUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function formToMasterType(){
        return $this->belongsTo(MasterType::class, 'master_type_id');
    }
    public function formToCourse(){
        return $this->belongsTo(Course::class, 'course_id','id');
    }
    public function formToMaterial(){
        return $this->belongsTo(Material::class, 'material_id');
    }
    public function allReplies(){
        return $this->hasMany(Forum::class, 'parent_id');
    }
    public function replies(){
        return $this->hasMany(Forum::class, 'reply_id');
    }
}

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
        'master_type_id',
        'forum_title',
        'forum_message',
        'forum_attachment'
    ];
    public function formToUser(){
        return $this->belongsTo(User::class);
    }
    public function formToMasterType(){
        return $this->belongsTo(MasterType::class);
    }
}

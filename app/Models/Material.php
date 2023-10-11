<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function mastertype(){
        return $this->belongsTo(MasterType::class);
    }
}

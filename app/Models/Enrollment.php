<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    public $table = "enrollments";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'course_id',
        'completed',
        'ready_for_final',
        'material_completed_count',
        'finished_at',
    ];
    protected $dates = ['finished_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function materialComplete()
    {
        return $this->hasMany(MaterialCompleted::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }
}

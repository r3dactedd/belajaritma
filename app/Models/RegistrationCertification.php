<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationCertification extends Model
{
    use HasFactory;
    public $table = "register_certification";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'certif_id',
        'registered',
        'passed',
        'total_score',
        'blocked_until',
        'finished_at',
        'attempts',
    ];
    protected $dates = ['finished_at'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function certification(){
        return $this->belongsTo(Certification::class, 'certif_id');
    }
}

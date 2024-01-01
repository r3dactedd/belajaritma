<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    public $table = "certification";
    protected $guarded='id';
    protected $fillable = [
        'certif_title',
        'certif_short_desc',
        'certif_desc',
        'certif_img',
        'certif_duration',
        'certif_cost',
        'certif_outline',
        'total_questions',
        'created_by',
        'updated_by',
        'students_registered',
        'minimum_score',
    ];
    public function findUpdatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function findCreatedBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function certifToTransaction(){
        return $this->hasMany(Transaction::class, 'certif_id','id');
    }
}

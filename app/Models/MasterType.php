<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterType extends Model
{
    use HasFactory;
    public $table = "master_type";
    protected $guarded='id';
    protected $fillable = [
        'master_type_code',
        'master_type_name',
    ];

    public function masterTypeToForm(){
        return $this->hasMany(Forum::class, 'master_type_id','id');
    }

    public function masterTypeToMaterial(){
        return $this->hasMany(Material::class, 'master_type_id','id');
    }
}

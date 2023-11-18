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
        'parent_id',
        'material_id',
        'title',
        'path',
        'type',
    ];
    public function sidebarToMaterial(){
        return $this->belongsTo(Material::class,'material_id','id');
    }

    public function sidebarToMaterialContent(){
        return $this->belongsTo(MaterialContent::class,'material_content_id','id');
    }
}
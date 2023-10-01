<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleContent extends Model
{
    use HasFactory;
    public $table = "module_content";
    protected $guarded='id';
    protected $fillable = [
        'content_title',
        'content_description',
    ];
    protected $casts = [
        'is_completed' => 'boolean',
    ];
    public function moduleContentToMaterial(){
        return $this->belongsTo(Material::class, 'material_id');
    }
}

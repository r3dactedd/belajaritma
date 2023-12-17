<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $table = "transaction";
    protected $guarded='id';
    protected $fillable = [
        'user_id',
        'certif_id',
        'payment_code',
        'transaction_proof',
        'isApproved',
    ];
    public function transactionToCertification(){
        return $this->belongsTo(Certification::class, 'certif_id');
    }
    public function transactionToUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

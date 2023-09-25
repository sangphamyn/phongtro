<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'sotien'
    ];
    public function author() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}

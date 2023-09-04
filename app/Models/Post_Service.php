<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Service extends Model
{
    use HasFactory;

    protected $table = "post_services";
    protected $fillable = [
        'id_services',
        'id_post'
    ];
}

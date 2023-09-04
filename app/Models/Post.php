<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'title',
        'description',
        'id_dt',
        'id_w',
        'dientich',
        'giaphong',
        'giadien',
        'gianuoc'
    ];
    public function huyen() {
        return $this->hasOne(District::class, 'id', 'id_dt');
    }
    public function xa() {
        return $this->hasOne(Ward::class,'id','id_w');
    }
    public function services() {
        return $this->belongsToMany(Service::class, 'post_services', 'id_post', 'id_services');
    }
    public function images() {
        return $this->hasMany(Image::class, 'id_post', 'id');
    }
}

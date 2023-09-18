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
        'gianuoc',
        'luotxem'
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
    public function author1() {
        return $this->hasOne(User::class,'id','author');
    }
    public function wishlist() {
        return $this->belongsToMany(wishlist::class,'wishlist', 'id_post', 'id_user');
    }
}

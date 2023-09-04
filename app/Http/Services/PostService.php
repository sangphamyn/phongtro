<?php

namespace App\Http\Services;
use App\Models\Post;
use App\Models\Image;
use App\Models\Post_Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PostService
{
    public function insert($request) {
        try {
            $request->offsetUnset('_token');
            $request->merge(["author"=>Auth::user()->id]);
            $post = Post::create($request->all());
            $post_id = $post->id;
            if($request->input('services')) {
                foreach($request->input('services') as $service) {
                    Post_Service::insert(["id_post" => $post_id, "id_services" => $service]);
                }
            }
            if($request->input('image')) {
                foreach($request->input('images') as $image) {
                    Image::insert(["id_post" => $post_id, "url" => $image]);
                }
            }
            Session::flash('success', 'Create success');
        } catch(\Exception $e) {
            dd($e);
            Session::flash('error', 'Create fail' . $e);
            return false;
        }
    }
}

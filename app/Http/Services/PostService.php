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
            if(Auth::user()->sodu < 15000) {
                Session::flash('error', 'Không đủ tiền');
                return;
            }
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
            DB::select('update users set sodu = sodu - 15000 where id = ' . Auth::user()->id);
            Session::flash('success', 'Đăng thành công');
        } catch(\Exception $e) {
            Session::flash('error', 'Lỗi' . $e);
            return false;
        }
    }
}

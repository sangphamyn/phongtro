<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Models\District;
use App\Models\Service;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostService $post){
        $this->post = $post;
    }
    public function index() {
        $districts = District::get();
        $services = Service::get();
        return view('post.create', [
            'title' => "Tạo bài đăng",
            'districts' => $districts,
            'services' => $services
        ]);
    }

    public function store(PostRequest $request) {
        $this->post->insert($request);
        return redirect()->back();
    }

    public function showAll(Request $request) {
        $districts = District::get();
        $services = Service::get();

        $postsQuery = Post::query();
        $postsQuery->where('trangthai','=','1')->with('xa')->with('services')->with('images');

        $title_search = '';
        $check = false;
        if($request->title!=null) {
            $check = true;
            $postsQuery->where('title', 'like','%'.$request->title.'%');
            $title_search .= $request->title;
        }
        if($request->xa!='none' && $request->xa!=null && $request->xa != 'Chọn xã/phường') {
            $check = true;if($title_search != '')
                $title_search .= ' ở ';
            $title_search .= DB::select('select name from wards where id = ' . $request->xa)[0]->name;
            $postsQuery->where('id_w', '=', $request->xa);
        }
        if($request->dt!='none'&&$request->dt!=null) {
            $check = true;
            if($title_search != '')
                $title_search .= ', ';
            $title_search .= DB::select('select name from districts where id = ' . $request->dt)[0]->name;
            $postsQuery->where('id_dt', '=', $request->dt);
        }
        if(($request->min_price!=null)&&($request->max_price!=null)) {
            if($title_search != '')
                $title_search .= ', ';
            $title_search .= number_format($request->min_price) . 'đ đến ' . number_format($request->max_price) . 'đ';
            $postsQuery->where('giaphong', '>=', $request->min_price)->where('giaphong', '<=', $request->max_price);
            $check = true;
        }
        if(($request->min_area!=null)&&($request->max_area!=null)) {
            $postsQuery->where('dientich', '>=', $request->min_area)->where('dientich', '<=', $request->max_area);
            $check = true;
            if($title_search != '')
                $title_search .= ', ';
            $title_search .= number_format($request->min_area) . 'm² đến ' . number_format($request->max_area) . 'm²';
        }
        if($check) {
            $title_search = 'Tìm kiếm: ' . $title_search;
        }
        if($request->orderby == 'new')
            $postsQuery->orderBy('created_at', 'desc');
        if($request->orderby == 'hot')
            $postsQuery->orderBy('luotquantam', 'desc');
        if($request->orderby == 'view')
            $postsQuery->orderBy('luotxem', 'desc');
        $total = count($postsQuery->get());
        $posts = $postsQuery->paginate(5);
        $title = "Danh sách bài đăng";
        return view('post.list', compact('posts', 'title', 'districts', 'services', 'title_search', 'total'));
    }
    public function show(Post $post) {
         $title = "Thông tin phòng";
         if($post->trangthai == 1) {
            DB::select('UPDATE posts SET luotxem = luotxem + 1 WHERE id = ' . $post->id);
            $isLike = DB::select('Select count(*) as a From wishlists Where id_user = ' . Auth::user()->id .' and id_post = ' . $post->id)[0]->a;
            $user_wishlist = DB::select('select * from wishlists as w, users as u where w.id_user = u.id and w.id_post = ' . $post->id);
            $author_list_post = Post::where('author', '=', $post->author)->where('trangthai', '=', '1')->get();
            $relate_post = Post::where('id_dt', '=', $post->id_dt)->where('id_w', '=', $post->id_w)->where('id','<>',$post->id)->paginate(5);
            if(count($relate_post) < 2) {
                $relate_post = Post::where('id_dt', '=', $post->id_dt)->where('id','<>',$post->id)->paginate(5);
            }
            return view('post.single', compact( 'title', 'isLike', 'user_wishlist', 'author_list_post', 'relate_post'), compact('post'));
         } else 
            return redirect('/post/list');
     }
     public function hetPhong(Request $request) {
            DB::select('UPDATE posts SET trangthai = 4 WHERE id = ' . $request->id);
            return redirect('/profile/dadang');
    }
    public function conPhong(Request $request) {
        DB::select('UPDATE posts SET trangthai = 1 WHERE id = ' . $request->id);
        return redirect('/profile/dadang');
}
}

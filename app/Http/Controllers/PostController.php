<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Models\District;
use App\Models\Service;
use App\Models\Post;
use Illuminate\Http\Request;
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
    // public function showAll(Request $request) {
    //     $dt = $request->dt;
    //     if($dt==null){
    //         $posts = Post::where('trangthai','=','1')->with('huyen')->with('xa')->with('services')->with('images')->paginate();
    //     }
    //     else{
    //         $posts = Post::where('trangthai','=','1')->where('id_dt', '=', $dt)->with('huyen')->with('xa')->with('services')->with('images')->paginate();
    //     }
    //     $title = "Danh sách bài đăng";
    //     return view('post.list', compact('posts', 'title'));
    // }

    public function showAll(Request $request) {
        $postsQuery = Post::query();
        $postsQuery->where('trangthai','=','1')->with('xa')->with('services')->with('images');
        if($request->title!=null) $postsQuery->where('title', 'like',"N'%'.$request->title.'%");
        if($request->dt!='none'&&$request->dt!=null) $postsQuery->where('id_dt', '=', $request->dt);
        if($request->xa!='none' && $request->xa!=null && $request->xa != 'Chọn xã/phường') $postsQuery->where('id_w', '=', $request->xa);
        if(($request->min_price!=null)&&($request->max_price!=null)) $postsQuery->where('giaphong', '>', $request->min_price)->where('giaphong', '<', $request->max_price);
        if(($request->min_area!=null)&&($request->max_area!=null)) $postsQuery->where('dientich', '>', $request->min_area)->where('dientich', '<', $request->max_area);
        
        $posts = $postsQuery->get();
        $title = "Danh sách bài đăng";
        return view('post.list', compact('posts', 'title'));
    }
    public function show(Post $post) {
         $title = "Thông tin phòng";
         DB::select('UPDATE posts SET luotxem = luotxem + 1 WHERE id = ' . $post->id);
         return view('post.single', compact( 'title'), compact('post'));
     }
}

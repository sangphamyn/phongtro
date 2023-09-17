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
    public function showAll(Request $request) {
        $dt = $request->dt;
        if($dt==null){
            $posts = Post::where('trangthai','=','1')->with('huyen')->with('xa')->with('services')->with('images')->paginate();
        }
        else{
            $posts = Post::where('trangthai','=','1')->where('id_dt', '=', $dt)->with('huyen')->with('xa')->with('services')->with('images')->paginate();
        }
        $title = "Danh sách bài đăng";
        return view('post.list', compact('posts', 'title'));
    }
    public function show(Post $post) {
         $title = "Thông tin phòng";
         DB::select('UPDATE posts SET luotxem = luotxem + 1 WHERE id = ' . $post->id);
         return view('post.single', compact( 'title'), compact('post'));
     }
    // public function showPost_District() {
    //     $posts = Post::where('trangthai','=','1')->with('huyen')->with('xa')->with('services')->with('images')->paginate();
    //     $title = "Danh sách bài đăng";
    //     return view('post.list', compact('posts', 'title'));
    // }
}

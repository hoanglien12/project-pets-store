<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\AdminPostRequest;
use App\Http\Requests\AdminEditPostRequest;

class PostController extends Controller
{
    public function __construct()
    {
    	$this->post = new Post();
    }

    public function index(Request $request)
    {
    	$request->flash();
        $title          = $request->input('title');
        $status         = $request->input('status');
        $type           = $request->input('type');
        // dd($type , $status);
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');

        $count_post 	= count($this->post->getAllDogPosts($title,$status,$type, $begin_date, $end_date)->get());
        $posts 			= $this->post->getAllDogPosts($title,$status,$type,$begin_date,$end_date)->paginate(10);
        // dd($posts);
    	return view('admin.post.index',compact('posts','count_post','status','type'));
    }

    public function add()
    {
    	return view('admin.post.create');
    }

    public function store(AdminPostRequest $request)
    {
        $request->flash();
        $filename_arr  = [];
        $i             = 1;
        // dd($request->hasFile('photos'));
        // dd($request->all());

        //kiem tra ton tai file hay k
        if($request->hasFile('photos')){
            // echo 1; die;
            $files    = $request->file('photos');
            foreach ($files as $file) {
                $filename       = $i . $file->getClientOriginalName();
                $file->move(public_path('/upload/post'), $filename);
                $filename_arr[] = $filename;
                $i++;
                // dd($filename_arr);
            }
        }
        else{
            $filename_arr  = [];
        }

        // dd($request->type);
        $newPost = POST::create([
                'title'         => $request->get('title'),
                'image'         => json_encode($filename_arr),
                'summary'       => $request->get('summary'),
                'active'        => $request->get('status'),
                'hot'           => $request->get('type'),
                'source'        => $request->get('source'),
                'content'       => $request->get('content'),
                'slugs'         => $request->get('slugs'),
                'author'        => $request->get('author')
            ]);

        if(!$newPost){
            $request->session()->flash('warning','Insert fail');
        }
        else{
            $request->session()->flash('success','Insert ' .$request->name. ' successfully');
        }
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $post          = Post::findOrFail($id);
        // dd($post);
        return view('admin.post.edit',compact('post'));
    } 

    public function update(AdminEditPostRequest $request, $id)
    {
        // echo 1; die;
        $request->flash();
        $filename_arr = [];
        $i            = 1;
        //kiem tra ton tai file hay k

        if($request->hasFile('photos')){
            $files              = $request->file('photos');
            foreach ($files as $file) {
                $filename       = $i . $file->getClientOriginalName();
                $file->move(public_path('/upload/post'), $filename);
                $filename_arr[] = $filename;
                $i++;
            }
            // dd($filename_arr);
            $post->photos = json_encode($filename_arr);
        }
        else{
            $filename_arr = [];
        }

        $update       = Post::query()->findOrFail($id);
        $update->update([
                'title'         => $request->get('title'),
                // 'image'         => json_encode($filename_arr),
                'summary'       => $request->get('summary'),
                'active'        => $request->get('status'),
                'hot'           => $request->get('type'),
                'source'        => $request->get('source'),
                'content'       => $request->get('content'),
                'slugs'         => $request->get('slugs'),
                'author'        => $request->get('author')
        ]);
        // dd($update);
        if(!$update){
            $request->session()->flash('warning','Update fail');
        }
        else{
            $request->session()->flash('success','Update ' .$request->title. ' successfully');
        }
        return redirect()->route('post.index');
    }

    public function delete(Request $request,$id)
    {
        $request->flash();
        $post = Post::findOrFail($id);
        $post->delete();
        if(!$post){
            $request->session()->flash('warning','Delete fail');
        }
        else{
            $request->session()->flash('success','Delete ' . $post->name . ' successfully');
        }
        return redirect()->route('post.index');
    }

    public function change_status(Request $request,$id)
    {
        $data     = array();
        $request  = $this->input->server('REQUEST_METHOD');
        if($request === 'POST'){
            $get_id     = $request->input('get_id');
            $get_type   = $request->input('get_type');
            if($get_type == 1)
            {
                $arr_data =array(
                 'status' => '2'
             );
            }
            else
            {
                $arr_data =array(
                    'status' => '1'
                );
            }
            $check_update       = Post::query()->findOrFail($id);
            $check_update->update([
                'active'        => $request->get('status')
            ]);
            $result = json_encode(array(
                'status' => $arr_data['status'],
                'request' => $check_update
            ));
            echo $result;
        }   

    }
}

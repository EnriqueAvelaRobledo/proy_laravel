<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::paginate(3);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
       // dd($categories);


        echo view('dashboard.post.create', compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
     //echo 'store';
     //obtines todos los datos

     //valida los datos que solo se pueden recibir
///$validated = $request ->validate(StoreRequest::myRules());

//dd($validated);
    // $data = array_merge($request->all(),['image' => '']);

// $data = $request->validated();
// $data['slug']=Str::slug($data['title']);
 //  dd($data);

    Post::create($request->validated());

     // return route("post.create");
       //return redirect("post.create");

       return to_route("post.index")->with('status',"Registro creado.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         $categories = Category::pluck('id', 'title');
          echo view('dashboard.post.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();

        if(isset($data["image"])){
             //dd($request->validated());
            //dd($request->validated()["image"]->getClientOriginalName);

            $data["image"]=$filename = time().".".$data["image"]->extension();
           // dd($filename);
            $request->image->move(public_path("image"), $filename);
    }

        $post->update($data);
        //$request->session()->flash('status',"Registro actualizado.");
        return to_route("post.index")->with('status',"Registro actualizado.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //echo "destroyer";
        $post->delete();
        return to_route("post.index")->with('status',"Registro eliminado.");

    }
}

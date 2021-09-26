<?php
 
namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth',['except'=>['index','show','recipe']]);
    }



    public function index()
    {   
        $posts=Post::orderby('updated_at','DESC')->get();
        
        return view('recipes.index')->with('posts',$posts);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instruction' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('img'),$newImageName);
        $slug = SlugService::createslug(Post::class,'slug',$request->title);
        
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createslug(Post::class,'slug',$request->title),
            'ingredients' => $request->input('ingredients'),
            'instruction' => $request->input('instruction'),
            
            'image_path' => $newImageName,
            
            'user_id' =>auth()->user()->id
        ]);

        return redirect('/recipes')->with('message','Your post has been added!');
        //     $data =  $request->title . $request->ingredients . $request->instruction;
        // return dd($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('recipes.show')->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('recipes.edit')->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instruction' => 'required'
     
        ]);
       
        Post::where('slug',$slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createslug(Post::class,'slug',$request->title),
            'ingredients' => $request->input('ingredients'),
            'instruction' => $request->input('instruction'),
            'user_id' =>auth()->user()->id
        ]);
        return redirect('/recipes')->with('message','Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Post::where('slug',$slug)->delete();
        return redirect('/recipes')->with('message','Your post has been deleted!');
    }
}

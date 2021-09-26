<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function recipes(){
        return view('recipe.index');
    }


    public function index(){

        // $posts = User::has('post')->get();
        $posts=Post::orderby('updated_at','DESC')->take(3)->get();
        
        return view('index')->with('posts',$posts);
        // 
        // $posts = DB::table('posts')->where('user_id', auth()->id())->get();
        //return view('index')->with('posts',$posts);

    }

    public function show_my_recipes($id){
        // $posts = Post::where('user_id','==',$id)->get();
        //$posts=Post::orderby('updated_at','DESC')->get();
        // $posts = Post::with('user')->get();
        //  $user = User::find($id);
        // $posts = $user->posts()->get();
        //return view('recipes.my_recipe')->with('posts',$posts);

       

        // $posts = DB::select('select * from post where user_id = ?', [$id]);
        // dd($posts);
        //$id = 4;
        // $user = Auth:: user();
        //$posts = Post::all();
        $posts = Post::where('user_id',$id)->get();

        //return view('recipes.my_recipe',compact('user','posts' ));
        
        //$posts = DB::table('posts')->where('user_id',$id)->get();
        //$posts = Post::where('user_id','==',$id)->get();
        return view('recipes/my_recipe')->with('posts',$posts);
        //return view('recipes.my_recipe')->with(array("user" => $user, "posts" => $posts));
    }

   

    
}

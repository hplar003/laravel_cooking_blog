@extends('layouts.app')

@section('content')


        
    
    <div class="w-4/5 m-auto text-center">
        <div class="py-20 border-b border-gray-200">
            <h1 class="text-6xl pb-10">{{ $post->title }}</h1>
            <span class="text-gray-500 text-sm  ">
                By <span class="italic text-gray-800 ">{{ $post->user->name }}  created on {{ date('jS M Y',strtotime($post->created_at)) }}</span>
            </span>
        </div>
        
    </div>

    
    <div class="w-4/5 m-auto pt-20">
       
        <p class="text-xl font-semibold italic text-gray-700 pt-8 pb-10 leading-8">{{ $post->description }}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2  mt-4">
        <div class="pl-10 h-1/4 lg:h-1/4">
            <img src="{{  asset('img/'.$post->image_path) }}" alt="" class="">
        </div>

       
        <div class="w-full m-auto my-10 px-10 lg:leading-relaxed text-2xl text-left">
            <h3 class="uppercase text-3xl font-semibold text-red-400 tracking-wider ">Ingredients:</h3>
            <p >{!! $post->ingredients !!}</p>
        </div>
        
    </div>


    <div class="w-full mx-10 my-10 px-10 lg:leading-relaxed text-left">
        <h3 class="uppercase text-3xl font-semibold text-red-400 tracking-wider ">Instructions</h3>
        <p class="text-5xl" >{!! $post->instruction !!}</p>

    </div>
   
   

   
    
@endsection
@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl text-gray-600">Recipe Posts</h1>
    </div>
</div>
@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2 text-center">
    <p class="w-3/6 mb-4 text-gray-700 bg-red-200 rounded-2xl py-4 ">
        {{ session()->get('message') }}
    </p>
</div>
@endif
          <div class="container mx-auto pb-20">
            <div class="flex flex-wrap -mx-4">
              @foreach ($posts as $post)
              <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                <a href="/recipes/{{ $post->slug }}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                <div class="relative pb-48 overflow-hidden">
                  <img class="absolute inset-0 h-full w-full object-cover hover:transition-all" src="{{ asset('img/'.$post->image_path) }}" alt="">
                </div>
                <div class="p-4">
                  <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">Highlight</span>
                  <h2 class="mt-2 mb-2  font-bold">{{ $post->title }}</h2>
                  <p class="text-sm">{{ $post->description }}</p>
                  
                </div>
                <div class="p-4 border-t border-b text-xs text-gray-700">
                  
                  <span class="flex items-center">
                    <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i>  {{ $post->user->name }} &bull; {{ date('jS M Y',strtotime($post->created_at)) }}
                  </span>        
                </div>
                
              </a>
              
                    
              </div>
              @endforeach
            </div>
          </div>
         

    
@endsection
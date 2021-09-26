@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-left">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-3xl text-gray-600">You have a total of {{ $posts->count() }} posts</h1>
    </div>
</div>
@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2 text-center">
    <p class="w-3/6 mb-4 text-gray-700 bg-red-200 rounded-2xl py-4 ">
        {{ session()->get('message') }}
    </p>
</div>
@endif

 @foreach ($posts as $post )
        <a href="/recipes/{{ $post->slug }}">
            <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
                <!-- card -->
            <div class="flex flex-col md:flex-row overflow-hidden
                bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
              <!-- media -->
              <div class="h-72 w-auto md:w-1/2 lg:w-full lg:h-80">
                <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('img/'.$post->image_path) }}" />
              </div>
              <!-- content -->
              <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                <h3 class="font-semibold underline leading-tight truncate text-2xl text-gray-600" ><a href="/recipes/{{ $post->slug }}">{{ $post->title }}</a></h3>
                <p class="mt-2">
                  {{ $post->description }}
                </p>
                <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                  {{ $post->user->name }} &bull; {{ date('jS M Y',strtotime($post->created_at)) }}
                </p>
              </div>
              @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <span class="float-right pr-2">
                        <a href="/recipes/{{ $post->slug }}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">edit</a>
                    </span>
                    <span class="float-right">
                        <form action="/recipes/{{ $post->slug }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-red-500 pr-3" type="submit">Delete</button>
                        </form>
                    </span>
                @endif
            </div><!--/ card-->
          </div><!--/ flex-->
        </a>
          @endforeach






    
@endsection
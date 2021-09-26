@extends('layouts.app')

@section('content')
        <div class="w-4/5 m-auto text-center">
            <div class="py-15 border-b border-gray-200">
                <h1 class="text-6xl">Edit Posts</h1>
            </div>
        </div>
{{--         
        @if ($errors->any())
            <div class="w-4/5 m-auto">
                <ul>
                    @foreach ($errors->any() as $error )
                        <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl y-4">{{ $error }}</li>
                    @endforeach
                
                </ul>
            </div>
        @endif --}}

        <div class="w-4/5 m-auto pt-20">
            <form action="/recipes/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="title"  class="bg-transparent block border-b-2 w-2/4 -20 text-3xl outline-none value=" value="{{ $post->title }}">

                <textarea name="description" class="py-20 bg-transparent block border-b-2 w-2/4 h-60 text-xl outline-none" >{{ $post->description }}</textarea>

                <textarea  id="editor-ingr" name="ingredients"  class="editor py-20 bg-transparent block border-b-2 w-2/4 h-60 text-xl outline-none" >{{ $post->ingredients }}</textarea>

                <textarea id="editor-instruction" name="instruction"  class="mt-5 py-20 bg-transparent block border-b-2 w-2/4 h-60 text-xl outline-none" >{{ $post->instruction }}</textarea>

                <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Submit Post</button>
            </form>
        </div>
@endsection

@section('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor-ingr' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( ' #editor-instruction' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

    
@endsection

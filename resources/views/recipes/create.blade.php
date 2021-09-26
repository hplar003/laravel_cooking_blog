@extends('layouts.app')

@section('content')
        <div class="w-4/5 m-auto text-center">
            <div class="py-15 border-b border-gray-200">
                <h1 class="text-6xl">Create New Posts</h1>
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
            <form action="/recipes" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Title..." class="bg-transparent block border-b-2 w-2/4 -20 text-3xl outline-none">
                <textarea name="description" placeholder="Write description" class="py-20 bg-transparent block border-b-2 w-2/4 h-60 text-xl outline-none" ></textarea>

                <textarea  id="editor-ingr" name="ingredients" placeholder="Write ingredients" class="editor py-20 bg-transparent block border-b-2 w-2/4 h-60 text-xl outline-none" ></textarea>

                <textarea id="editor-instruction" name="instruction" placeholder="Write the instructions" class="mt-5 py-20 bg-transparent block border-b-2 w-2/4 h-60 text-xl outline-none" ></textarea>

                <div class="bg-gray-lighter pt-12">
                    <label  class="w-44 flex flex-col items-center px-2 py-3 bg-white rounded-xl shadow-lg tracking-wide uppercase border border-blue cursor-pointer 
                    hover:bg-red-100">
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type="file" name="image" class="hidden">
                    </label>
                </div>
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

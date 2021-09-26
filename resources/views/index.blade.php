@extends('layouts.app')
@section('menu')
  {{-- @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
    <a class="no-underline hover:underline" href="/recipes/my_recipe/{{ Auth::user()->id }}">My Recipes </a>
  @endif --}}
  {{-- <a class="no-underline hover:underline" href="/recipes/my_recipe/{{ Auth::user()->id }}">My Recipes </a> --}}
  
@endsection

@section('content')


    


    <div class=" flow-root md:grid   md:grid-cols-2 lg:grid-cols-2 w-screen h-screen md:h-screen  bg-white md:py-10 lg:py-10">
        <div class="flow-root  w-full m-auto sm:min-h-full  " >
            <img src="{{ asset('/img/welcome.png') }}" alt=""  class="bg-transparent" >
        </div>
        <div class="flow-root h-screen md:w-full md:h-full m-auto p-auto  tracking-normal justify-center md:text-center lg:text-center leading-7" >
            <h2 class=" text-4xl font-sans py-4 text-center  text-gray-600 lg:py-10">Cook with me</h2>
            <p class="w-full h-full text-sm md:text-base text-center  md:px-5 md:py-5 lg:px-10 lg:py-10 text-gray-500 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fuga temporibus dolores neque ipsa fugit quasi eius inventore quaerat amet quos dicta a quis, in libero sit nostrum vero ullam doloremque aliquam expedita commodi. Saepe ipsum dolore aperiam blanditiis omnis maiores quaerat possimus tempora magnam a optio, repellendus necessitatibus veniam aliquam ut nobis odit aspernatur perferendis officiis. Eos, et aliquam quidem aliquid tempore praesentium error, tempora odio, quia architecto cumque eum odit facilis! Nisi incidunt voluptate ex minima! Totam alias neque quo modi. Nesciunt, quam ducimus tenetur eaque reprehenderit qui omnis magnam quasi sint laborum! Ullam ut a quasi ea.</p>
        </div>
    </div>
    
    {{-- latest Post --}}
    <div class="pt-6 pb-12 bg-red-100">  
    
        
        <div id="card" class="">
          <h2 class="text-center font-serif text-gray-500 uppercase text-4xl xl:text-5xl">Recent Articles</h2>
          <!-- container for all cards -->

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
                <h3 class="font-semibold underline leading-tight truncate text-2xl" ><a href="/recipes/{{ $post->slug }}">{{ $post->title }}</a></h3>
                <p class="mt-2">
                  {{ $post->description }}
                </p>
                <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                  {{ $post->user->name }} &bull; {{ date('jS M Y',strtotime($post->created_at)) }}
                </p>
              </div>
            </div><!--/ card-->
          </div><!--/ flex-->
        </a>
          @endforeach

        </div>
       
      </div>

  
    <div class="sm:grid grid-cols-2 gap-20 w-25 mx-auto py-15 border-b border-gray-200 container" >
        <div>
            <ul class="flex flex-col">
                <li  class="flex flex-row text-center font-semibold text-7xl px-3 py-3 mx-3 my-3"><img src="{{ asset('/img/facebook.png') }}" width="70" alt="">
                    <a href="/" class="text-center font-semibold text-7xl px-3 py-3 mx-3 my-3">Facebook.com/cookwithme</a>
                </li>
                <li  class="flex flex-row text-center font-semibold text-7xl px-3 py-3 mx-3 my-3"><img src="{{ asset('/img/twitter.png') }}" width="70" alt="">
                    <a href="/" class="text-center font-semibold text-7xl px-3 py-3 mx-3 my-3">Twitter/justCookWithMe</a>
                </li>
                <li  class="flex flex-row text-center font-semibold text-7xl px-3 py-3 mx-3 my-3"><img src="{{ asset('/img/instagram.png') }}" width="70" alt="">
                    <a href="/" class="text-center font-semibold text-7xl px-3 py-3 mx-3 my-3">Instagram/cookwithme</a>
                </li>
            </ul> 
        </div>
  
        <div class="m-auto sm:m-auto text-left w-4/5 block">
          <div class="px-4 pt-3 pb-4 border-b -mx-4 border-gray-400">
            <div class="max-w-xl mx-auto">
                <h2 class="text-xl text-left inline-block font-semibold text-gray-800">Join Our Newsletter</h2>
                <p class="text-gray-700 text-xs pl-px">
                    Latest news ,articles and updates montly delevered to your inbox.
                </p>
                <form action="newsletter" class="mt-2">
                    <div class="flex items-center">
                        <input type="email" class="w-full px-2 py-4 mr-2 bg-gray-100 shadow-inner rounded-md border border-gray-400 focus:outline-none " placeholder="Enter email address" required>

                        <button class="bg-pink-400 text-gray-200 px-5 py-2 rounded shadow " style="margin-left: -7.8rem;">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
 
  
@endsection
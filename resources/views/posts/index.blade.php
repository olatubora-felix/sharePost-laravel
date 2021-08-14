@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
            <form action="{{ route('posts') }}" method="post" enctype="multipart/form-data" class="mb-4">
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label for="body" class="sr-only">body</label>
                    <textarea name="body" id="body" cols="30" rows="4"
                     class="bg-gray-100 w-full
                     border-2 rounded-lg p-4
                     @error('body')
                        border-red-500 
                     @enderror"
                     placeholder="Post Something!" style="resize: none">
                     {{ old('name') }}
                    </textarea>
                </div>
                <div class="">
                    <input type="file" name="image" id="image" class="bg-gray-100
                    border-2 rounded-lg p-2
                    @error('image')
                    border-red-500 
                    @enderror"
                    >
              
                    
                    <button type="submit" class="bg-blue-500 text-white
                      px-4 py-2 hover:bg-blue-700
                      rounded font-medium float-right">
                     Posts
                    </button>
                  </div>
            </form>
            @endauth
            @if ($posts->count())
                @foreach ($posts as $post)
                   <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
            <h2>No Post is avaliable</h2> 
            @endif
        </div>
    </div>
@endsection


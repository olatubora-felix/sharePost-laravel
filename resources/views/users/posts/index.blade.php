@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
          <div class="p-6">
              <h1 class="font-medium text-2xl mb-1">{{ $user->name }}</h1>
              <p>Posted {{ $posts->count()}} {{ Str::plural('post', $posts->count())  }} and Received {{ $user->receivedLikes->count() }}</p>
          </div>
          <div class=" bg-white p-6 rounded-lg">
              @if ($posts->count())
                @foreach ($posts as $post)
                  <x-post :post="$post" />
                @endforeach
                  {{ $posts->links() }}
             @else
                <h2>{{ $user->name }} Does not have any Post</h2> 
            @endif
          </div>
         
        </div>
    </div>
@endsection
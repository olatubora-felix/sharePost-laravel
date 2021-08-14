@props(['post' => $post])
<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
      @if($post->user->image === null)
        <a href="{{ route('users.profile', $post->user) }}">
          <img class="w-8 h-8 rounded-full inline" src="{{ asset('images/profile/user.jpg') }}" alt="" width="384" height="512">
        </a>
      @else
        <a href="{{ route('users.profile', $post->user) }}">
          <img src="{{ $post->user->image }}" alt="" class="w-8 h-8 rounded-full inline">
        </a>
      @endif
      <span class="text-gray-600 text-sm" >
        {{ $post->created_at->diffForHumans()}}
      </span>
    <p class="my-3">
        {{ $post->body }}
    </p>
    <img src="{{ asset($post->image) }}" class="py-6 w-8/12" height="400px" alt="">

    {{-- Chech for User  --}}
    <div class="float-right">
      @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="text-blue-500 ">Delete</button>
        </form>
      @endcan
    </div>

    <div class="flex text-center">
    @auth
      @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.like', $post) }}" method="post" class="mr-1">
          @method('POST')
          @csrf
          <button type="submit" class="text-blue-500 ">Like</button>
        </form>    
      @else
        <form action="{{ route('posts.like', $post) }}" method="post" class="mr-1">
          @method('DELETE')
          @csrf
          <button type="submit" class="text-blue-500">Unlike </button>
      </form> 
      @endif
    @endauth
    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
  </div>
</div>
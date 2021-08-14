@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 rounded-lg">

            <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
                @if($user->image === null)
                    <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('images/profile/no_image.jpg') }}" alt="" width="384" height="512">
                @else
                    <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset($user->image) }}" alt="" width="384" height="512">
                @endif
                <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                    <div class="text-gray-600">
                       <strong> Welcome </strong><span class="text-blue-600">{{ $user->username }}!</span>
                       <p>Posted {{ $posts->count()}} {{ Str::plural('post', $posts->count())  }} and Received {{ $user->receivedLikes->count() }}</p>
                       </div>
                  <blockquote>
                   @if ($user->description == null)
                        <p class="text-lg font-semibold">Please Update Your Bio</p>
                     @else
                      <p class="text-lg font-semibold">
                        {{ $user->description }}
                      </p>
                   @endif
                  </blockquote>
                  <figcaption class="font-medium">
                      <div class="text-gray-500">
                        <div class="text-gray-600">
                         <strong>Name</strong >: <span class="text-blue-600">{{ $user->name }}</span>
                        </div>

                        <div class="text-gray-600">
                         <strong>Email</strong >: <span class="text-blue-600">{{ $user->email }}</span>
                        </div>

                        @if ($user->job == null)
                            <p class="text-lg font-semibold">what do you do for living?</p>
                        @else
                            <p class="text-lg font-semibold">
                                {{ $user->job }}
                            </p>
                        @endif
                            @if (!Auth::user()->name == $user->name)
                                 <a href="{{ route('dashboard.create') }}" class="bg-blue-300 text-white py-2 px-6 mt-3 float-right">Edit Profile</a>
                            @endif 
                    </div>
                  </figcaption>
                </div>
              </figure>
        </div>
@endsection
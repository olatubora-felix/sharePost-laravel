@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
          @if (session('status'))
              <div class="bg-red-500 mb-6 p-4 text-white text-center rounded-lg">
                {{ session('status') }}
              </div>
          @endif
           <form action="{{ route('dashboard.update'), $users->id }}" method="post" enctype="multipart/form-data">
              @method('POST')
              @csrf
              <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" id="name" name="name" 
                  placeholder="Your Name" 
                  class="bg-gray-100 border-2 w-full 
                  p-4 rounded-lg
                  @error('name')
                    border-red-500
                  @enderror" 
                  autocomplete="off"
                  value="{{  $users->name }}">
                  @error('name')
                      <small class="text-red-500 mt-2">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name="username" 
                  placeholder="Username" 
                  class="bg-gray-100 border-2 
                  w-full p-4 rounded-lg
                   @error('username')
                   border-red-500
                  @enderror" 
                  autocomplete="off"
                  value="{{  $users->username }}">
                @error('username')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
                </div>
              <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" 
                  placeholder="Your Email" 
                  class="bg-gray-100 border-2 
                  w-full p-4 rounded-lg 
                  @error('email')
                  border-red-500
                  @enderror" 
                  autocomplete="off"
                  value="{{  $users->email }}">
                @error('email')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
              </div>

              <div class="mb-4">
                <label for="job" class="sr-only">Your Profession</label>
                <input type="text" id="job" name="job" 
                  placeholder="Tell us your profession" 
                  class="bg-gray-100 border-2 
                  w-full p-4 rounded-lg 
                  @error('job')
                  border-red-500
                  @enderror" 
                  autocomplete="off"
                  value="{{  $users->job }}">
                @error('job')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
              </div>

              <div class="mb-4">
                <label for="image" class="sr-only">Your Profession</label>
                <input type="file" id="image" name="image" 
                  placeholder="Tell us your profession" 
                  class="bg-gray-100 border-2 
                  w-full p-4 rounded-lg 
                  @error('image')
                  border-red-500
                  @enderror" 
                  autocomplete="off"
                  value="{{  $users->image }}">
                @error('image')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
              </div>

              <div class="mb-4">
                <label for="description" class="sr-only">Email</label>
                <input name="description" 
                          cols="4" rows="3"
                          placeholder="Your us about yourself" 
                          class="bg-gray-100 border-2 
                          w-full p-4 rounded-lg 
                 @error('description')
                 border-red-500
                 @enderror" 
                 autocomplete="off"
                 value=" {{ $users->description}}">
                
                @error('description')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
              </div>
              
              <div class="">
                <button type="submit" class="bg-blue-500 text-white
                  px-4 py-3 hover:bg-blue-700
                  rounded font-medium w-full">
                  {{ __('Update Profile') }}
                </button>
              </div>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
           <form action="{{ route('register') }}" method="post">
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
                  value="{{ old('name') }}">
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
                  value="{{ old('username') }}">
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
                  value="{{ old('email') }}">
                @error('email')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
              </div>

              <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" 
                  placeholder="Your Password" 
                  class="bg-gray-100 border-2 
                  w-full p-4 rounded-lg
                  @error('password')
                  border-red-500
                  @enderror"
                  autocomplete="off">
                 @error('password')
                  <small class="text-red-500 mt-2">{{ $message }}</small>
                @enderror
              </div>

              <div class="mb-4">
                <label for="confirmPassword" class="sr-only">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                placeholder="Your Confirm Password" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg" autocomplete="off">

              </div>

              

              <div class="">
                <button type="submit" class="bg-blue-500 text-white
                  px-4 py-3 hover:bg-blue-700
                  rounded font-medium w-full">
                  Register
                </button>
              </div>
            </form>
        </div>
    </div>
@endsection
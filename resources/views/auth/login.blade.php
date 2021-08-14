@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
          @if (session('status'))
              <div class="bg-red-500 mb-6 p-4 text-white text-center rounded-lg">
                {{ session('status') }}
              </div>
          @endif
           <form action="{{ route('login') }}" method="post">
              @method('POST')
              @csrf
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
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Remember Me</label>
              </div>
              
              <div class="">
                <button type="submit" class="bg-blue-500 text-white
                  px-4 py-3 hover:bg-blue-700
                  rounded font-medium w-full">
                  Login
                </button>
              </div>
            </form>
        </div>
    </div>
@endsection
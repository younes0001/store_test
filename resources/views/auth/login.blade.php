@extends('layouts.app')

@section('content')
<div class="container my-10">
    <div class="flex justify-center">
        <div class="w-96">
            <div class="bg-white shadow-md rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6">{{ __('Login') }}</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">                    
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email Address') }}</label>
                      <input type="text" name="email" id="email" required value="{{ old('email') }}" autocomplete="name" autofocus class="@error('email') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" required="">
                      @error('email')
                       <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-4">                    
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Password') }}</label>
                      <input type="password" name="password" id="password" required value="{{ old('password') }}" autocomplete="name" autofocus class="@error('password') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="">
                      @error('password')
                       <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center">
                            <input class="form-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 text-sm text-gray-700" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

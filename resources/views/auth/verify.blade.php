@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-center">
        <div class="w-96">
            <div class="bg-white shadow-md rounded-lg p-8">
                <div class="text-2xl font-bold mb-6">{{ __('Verify Your Email Address') }}</div>

                <div class="mb-4">
                    @if (session('resent'))
                        <div class="text-green-500 mb-4">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div class="text-gray-700">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                    </div>

                    <form class="inline-block" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:text-blue-600 font-bold py-1 px-2 focus:outline-none focus:underline">
                            {{ __('click here to request another') }}
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

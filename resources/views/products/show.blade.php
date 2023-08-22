@extends('layouts.app')

@section('content')




<div x-data="{ cartOpen: false , isOpen: true }" class="bg-white">
   

    <main class="my-8">
        <div class="container mx-auto px-6">
        <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover mx-5" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2 px-10">
                        <h3 class="text-gray-700 uppercase text-lg">{{ $product->title }}</h3>
                        <span class="text-gray-500 mt-3">{{ $product->price }} $</span>
                        <span class="text-red-500 mt-3"><strike>{{ $product->old_price }} $</strike></span>
                        <hr class="my-3">
                        <form action="{{ route("add.cart",$product->slug) }}" method="post">
                            @csrf
                            <div class="mt-2">
                                <label class="text-gray-700 text-sm" for="count">Count:</label>
                                <div class="flex items-center mt-1">
                                    <input type="number" name="qty" id="qty" value="1" placeholder="Quantité" max="{{ $product->inStock }}" min="1" class="w-16 px-2 py-1 border rounded-lg">
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="font-weight-bold ">
                                    @if($product->inStock > 0)
                                        <span class="text-green-500 text-sm font-bold">In Stock</span>
                                    @else
                                        <span class="text-red-500 text-sm font-bold">N/A</span>
                                    @endif
                                </p>
                            </div>

                            <div class="flex items-center mt-6">
                                <button type="submit" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Order Now</button>
                                <a class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
</a>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="mt-3">
            <h3 class="text-gray-600 text-2xl font-medium">Description</h3>
                    <p class="font-weight-bold ">
                    {{ $product->description }}
                    </p>
                    </div>

            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Chanel</h3>
                            <span class="text-gray-500 mt-2">$12</span>
                        </div>
                    </div>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Chanel</h3>
                            <span class="text-gray-500 mt-2">$12</span>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </main>   
</div>
@endsection
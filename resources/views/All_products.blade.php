@extends('layouts.app')

@section('content')
<div class="pt-10  bg-white">
<h1 class="text-center text-2xl font-bold text-gray-800">All Products</h1>
</div>

<!-- Tab Menu -->
<div class="flex flex-wrap items-center  overflow-x-auto overflow-y-hidden py-10 justify-center   bg-white text-gray-800">
<a rel="noopener noreferrer" href="{{ route('All_products') }}" class="flex items-center flex-shrink-0 px-3 py-1 mx-2 rounded-full space-x-2 bg-gray-600 text-white">
        <i class="fa-solid fa-bars"></i>
		<span >Tous</span>
        <span class="bg-gray-600 text-white  rounded-full">{{$productCount}}</span>
</a>
@foreach ($categories as $category)
  <a id="category-{{ $category->id }}"  rel="noopener noreferrer" href="{{ route('category.products', $category->slug) }}" class="flex items-center flex-shrink-0 px-3 py-1 mx-2 rounded-full space-x-2 bg-gray-600 hover:bg-gray-400 text-white cursor-pointer" onclick="changeColor('category-{{ $category->id }}')">
    <i class="fa-solid fa-circle"></i>
    <span> {{ $category->title }}</span>
    <span class="text-white rounded-full text-sm">{{ $category->products->count() }}</span>
  </a>
@endforeach
</div>
    <!-- Product cards on the right side -->
    <section class="py-10 bg-gray-100">
    <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @foreach ($products as $product)
     
        <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
      <a href="#">
        <div class="relative flex items-end overflow-hidden rounded-xl">
          <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Hotel Photo" />
          <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            <button class="text-sm">Add to cart</button>
          </div>
        </div>

        <div class="mt-1 p-2">
          <h2 class="text-slate-700">{{ $product->title }}</h2>
          <p class="mt-1 text-sm text-slate-400">Lisbon, Portugal</p>

          <div class="mt-3 flex items-end justify-between">
              <p class="text-lg font-bold text-blue-500">{{ $product->price }} DH</p>

            <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg>

              <a href="{{ route("products.show", $product->slug) }}" class="text-sm">Add to cart</a>
            </div>
          </div>
        </div>
      </a>
    </article>
    @endforeach
</div>
</section>
<div id="color-changing-div" class="w-40 h-40 bg-blue-500 cursor-pointer">
  Click me to change my color!
</div>

<div class="mx-10 mt-10">
    <nav aria-label="Pagination">
        <ul class="pagination">
            {{ $products->links() }}
        </ul>
    </nav>
</div>
<script>
  function changeColor(event, categoryId) {
    event.preventDefault();
    const link = document.getElementById(categoryId);
    const specificColor = '#FF5733'; // Replace '#FF5733' with your desired color in hex, rgb, or named format
    link.style.backgroundColor = specificColor;
  }
</script>

@endsection

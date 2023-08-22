@extends('layouts.app')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

<article x-data="slider" x-init="startAutoplay" @mouseenter="stopAutoplay" @mouseleave="startAutoplay" class="relative w-full flex flex-shrink-0 overflow-hidden shadow-md my-10">
        <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center ">
            <span x-text="currentIndex"></span>/
            <span x-text="images.length"></span>
        </div>

        <template x-for="(image, index) in images">
            <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <img :src="image" alt="Image" class="absolute inset-0  h-full w-full object-cover opacity-70" />                
            </figure>
        </template>

        <button @click="back()"
            class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md  bg-gray-100 hover:bg-gray-200 opacity-50">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </button>

        <button @click="next()"
            class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md  bg-gray-100 hover:bg-gray-200 opacity-50">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-2 ">
            <template x-for="(image, index) in images">
                    <div
            class="w-3 h-3 rounded-full bg-white shadow-md cursor-pointer"
            :class="{ 'bg-indigo-500': currentIndex === index + 1 }"
            @click="currentIndex = index + 1"
            ></div>

            </template>
        </div>
    </article>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                currentIndex: 1,
                images: [
                    'https://source.unsplash.com/1600x900/?beach',
                    'https://source.unsplash.com/1600x900/?cat',
                    'https://source.unsplash.com/1600x900/?dog',
                    'https://source.unsplash.com/1600x900/?lego',
                    'https://source.unsplash.com/1600x900/?textures&patterns'
                ],
                interval: null, // Variable to store the interval ID for autoplay

                back() {
                    if (this.currentIndex > 1) {
                        this.currentIndex = this.currentIndex - 1;
                    }
                },
                next() {
                    if (this.currentIndex < this.images.length) {
                        this.currentIndex = this.currentIndex + 1;
                    } else {
                        this.currentIndex = 1;
                    }
                },
                // Function to start autoplay
                startAutoplay() {
                    this.interval = setInterval(() => {
                        this.next();
                    }, 3000); // Adjust the interval (in milliseconds) as needed
                },
                // Function to stop autoplay
                stopAutoplay() {
                    clearInterval(this.interval);
                },
            }))
        })
    </script>

<style>
.hover-trigger .hover-target {
    display: none;
}

.hover-trigger:hover .hover-target {
    display: block;
}
</style>
<div class="flex justify-center items-center text-3xl font-bold mt-10 px-20 ">
    <span class="border-b-4 border-yellow-500 text-indigo-500" style="display: inline-block; font-family: 'Inter', sans-serif;">OFFRES DU MOIS</span>
</div>

<div class="flex items-center justify-center w-auto h-full py-2  mx-5 ">
    <div class="w-11/12 relative flex items-center justify-center" id="sliderContainer1">
        <div class="w-full overflow-x-hidden" id="sliderWrapper1">
            <div id="slider1" class="h-full flex lg:gap-5 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700  mx-5">
                @foreach ($products as $product)
                <div class="hover-trigger card flex-shrink-0 shadow-md relative my-5 transition-all duration-300  border hover:border-indigo-500 transform hover:scale-105 border" style="width: 250px; height: 406px" draggable="true">
                    <!-- ... Rest of the code for the card ... -->
                    <img class="w-full h-full  product-image   " src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                   
                   <div class="p-2 bg-white  absolute bottom-0 w-full  " >
                       <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-2">{{ $product->title }}</h5>
                       <span class="text-1xl font-bold text-gray-900 dark:text-white">{{ $product->price }} DH</span>
                       <span class="text-1xl font-bold text-red-500 dark:text-white"><strike>{{ $product->old_price }} DH</strike></span>

                       <div class="mt-2 flex items-center justify-center">
                           <div class="inline-flex items-center justify-center w-8 h-8 p-2 rounded-full bg-white shadow-sm">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 h-auto fill-current text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                   <!-- SVG icon code here -->
                               </svg>
                           </div>
                       </div>

                       <div class="flex w-full items-center gap-4 mt-6">
                        <a href="{{ route("products.show", $product->slug) }}" class=" mt-4 block p-2  text-gray-600 border-gray-600 border hover:bg-yellow-500 hover:text-white hover:border-transparent  w-full text-center">
                           Order
                        </a>
                        <a href="{{ route("add.cart.home",$product->slug) }}" class="mt-4 block p-2  text-gray-600 border-gray-600 border  hover:bg-yellow-500 hover:text-white hover:border-transparent text-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                       </div>
                   </div>
                </div>
                @endforeach
            </div>
        </div>
        <button aria-label="slide backward" class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md  bg-gray-100 hover:bg-gray-200 opacity-50" id="prev1">
            <svg class="w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button aria-label="slide forward" class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md  bg-gray-100 hover:bg-gray-200 opacity-50" id="next1">
            <svg class="w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<div class="flex justify-center items-center text-4xl font-bold mt-10 px-20 ">
    <span class="border-b-4 border-yellow-500 text-indigo-500">OFFRES DU MOIS</span>
</div>

<div class="flex items-center justify-center w-auto h-full py-2  mx-5 ">
    <div class="w-11/12 relative flex items-center justify-center" id="sliderContainer1">
        <div class="w-full overflow-x-hidden" id="sliderWrapper1">
            <div id="slider1" class="h-full flex lg:gap-5 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700  mx-5">
                @foreach ($products as $product)
                <div class="card flex-shrink-0 shadow-md relative my-5 transition-all duration-300 transform hover:scale-105 border" style="width: 250px; height: 406px" draggable="true">
                    <!-- ... Rest of the code for the card ... -->
                    <img class="w-full h-full  product-image  shadow-md " src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                   
                   <div class="p-2 bg-white  absolute bottom-0 w-full  " >
                       <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-2">{{ $product->title }}</h5>
                       <span class="text-1xl font-bold text-gray-900 dark:text-white">{{ $product->price }} DH</span>
                       <span class="text-1xl font-bold text-red-500 dark:text-white"><strike>{{ $product->old_price }} DH</strike></span>

                       <div class="mt-2 flex items-center justify-center">
                           <div class="inline-flex items-center justify-center w-8 h-8 p-2 rounded-full bg-white shadow-sm">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 h-auto fill-current text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                   <!-- SVG icon code here -->
                               </svg>
                           </div>
                       </div>

                       <a href="{{ route("products.show", $product->slug) }}" class="mt-4 block px-4 py-2 bg-indigo-500 hover:bg-yellow-500 text-white text-sm font-medium rounded-md w-full text-center">
                           Order
                       </a>
                   </div>
                </div>
                @endforeach
            </div>
        </div>
        <button aria-label="slide backward" class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md  bg-gray-100 hover:bg-gray-200 opacity-50" id="prev1">
            <svg class="w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button aria-label="slide forward" class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md  bg-gray-100 hover:bg-gray-200 opacity-50" id="next1">
            <svg class="w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<div class="flex justify-center items-center text-4xl font-bold mt-10 px-20 ">
    <span class="border-b-4 border-yellow-500 text-indigo-500">MARQUES</span>
</div>

<div class="flex w-auto justify-center items-center gap-5 mt-10">
  <div class="w-28 h-28 border-2 border-indigo-500 rounded-full flex justify-center items-center hover:border-yellow-500 transition-all duration-300 transform hover:scale-105">
  <a class="text-3xl font-bold leading-none" href="#">
    <img src="{{ asset('/images/dove.png') }}" class="h-10">
  </a>
  </div>
  <div class="w-28 h-28 border-2 border-indigo-500 rounded-full flex justify-center items-center hover:border-yellow-500 transition-all duration-300 transform hover:scale-105">
  <a class="text-3xl font-bold leading-none" href="#">
    <img src="{{ asset('/images/nivia.png') }}" class="h-25">
  </a>
  </div>
  <div class="w-28 h-28 border-2 border-indigo-500 rounded-full flex justify-center items-center hover:border-yellow-500 transition-all duration-300 transform hover:scale-105">
  <a class="text-3xl font-bold leading-none" href="#">
    <img src="{{ asset('/images/CeraVe.png') }}" class="h-16">
  </a>
  </div>
</div>


    
<script>
  let defaultTransform1 = 0;
  let defaultTransform2 = 0;

  function goNext(sliderId) {
    const slider = document.getElementById(sliderId);
    let defaultTransform;
    if (sliderId === "slider1") {
      defaultTransform = defaultTransform1;
    } else if (sliderId === "slider2") {
      defaultTransform = defaultTransform2;
    }

    defaultTransform -= 545;

    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) {
      defaultTransform = 0;
    }

    if (sliderId === "slider1") {
      defaultTransform1 = defaultTransform;
    } else if (sliderId === "slider2") {
      defaultTransform2 = defaultTransform;
    }

    slider.style.transform = "translateX(" + defaultTransform + "px)";
  }

  function goPrev(sliderId) {
    const slider = document.getElementById(sliderId);
    let defaultTransform;
    if (sliderId === "slider1") {
      defaultTransform = defaultTransform1;
    } else if (sliderId === "slider2") {
      defaultTransform = defaultTransform2;
    }

    if (Math.abs(defaultTransform) === 0) {
      defaultTransform = 0;
    } else {
      defaultTransform += 545;
    }

    if (sliderId === "slider1") {
      defaultTransform1 = defaultTransform;
    } else if (sliderId === "slider2") {
      defaultTransform2 = defaultTransform;
    }

    slider.style.transform = "translateX(" + defaultTransform + "px)";
  }

  document.getElementById("next1").addEventListener("click", function () {
    goNext("slider1");
  });

  document.getElementById("prev1").addEventListener("click", function () {
    goPrev("slider1");
  });

  document.getElementById("next2").addEventListener("click", function () {
    goNext("slider2");
  });

  document.getElementById("prev2").addEventListener("click", function () {
    goPrev("slider2");
  });
  
 
</script>







  
</script>





@endsection

@extends('layouts.theshop')
  
@section('main')

<div class="py-6">
    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center space-x-2 text-gray-400 text-sm">
        <a href="{{route('accueil')}}" class="hover:underline hover:text-gray-600">Accueil</a>
        <span>
          <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </span>
        <a href="{{route('category', $product->category_id)}}" class="hover:underline hover:text-gray-600">{{$product->category->name}}</a>
        <span>
          <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </span>
        <span>{{$product->name}}</span>
      </div>
    </div>
    <!-- ./ Breadcrumbs -->
  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
      <div class="flex flex-col md:flex-row -mx-4">
        <div class="md:flex-1 px-4">
          <div x-data="{ image: 1 }" x-cloak>
            <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                
                @forelse ( $product->carouselImage as $key => $carouselImage)
                    <div x-show="image === {{$key + 1}}" class=" bg-gray-100 mb-4 flex items-center justify-center">
                        <img src="{{Storage::url($carouselImage)}}" alt="photo">
                    </div>
                @empty
                    
                @endforelse
              
  
            </div>
  
            <div class="flex -mx-2 mb-4">
                @forelse ( $product->carouselImage as $key => $carouselImage)
                    <div class="flex-1 px-2">
                        <button x-on:click="image = {{$key + 1}}" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === {{$key + 1}} }" class="focus:outline-none w-full rounded-lg h-24 md:h-30 bg-gray-100">
                            <img class="h-30 rounded-lg" src="{{Storage::url($carouselImage)}}" alt="photo">
                        </button>
                    </div>
                @empty
                    
                @endforelse
              
            </div>
          </div>
        </div>
        <div class="md:flex-1 px-4">
          <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{$product->name}}</h2>
          <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">{{$product->user->name}}</a></p>
  
          <div class="flex items-center space-x-4 my-4">
            <div>
              <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                <span class="text-indigo-400 mr-1 mt-1">€</span>
                <span class="font-bold text-indigo-600 text-3xl">{{$product->prix}}</span>
              </div>
            </div>
            <div class="flex-1">
              <p class="text-green-500 text-xl font-semibold">Save 12%</p>
              <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
            </div>
          </div>
  
          <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae exercitationem porro saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita cupiditate a est.</p>
  
          
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
              <span class="mr-3">Color</span>
              <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
            </div>
            <div class="flex ml-6 items-center">
              <span class="mr-3">Size</span>
              <div class="relative">
                <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                  <option>SM</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                </select>
                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div>
          </div>

          <!-- cart -->
          <livewire:add-cart :product="$product"/>
        </div>
      </div>
    </div>
  </div>

<!-- partial -->
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

@endsection
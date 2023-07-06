@extends('layouts.page-layout')
@push('styles')
  <style>
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
@endpush
@section('content')
  <div class="relative mx-auto container w-full h-96">
    <div class="absolute bg-black/30 top-0 left-0 right-0 bottom-0"></div>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="https://www.geo.tv/assets/uploads/updates/2023-01-03/462603_4381654_updates.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img
            src="https://rukminim2.flixcart.com/image/850/1000/poster/e/z/d/anime-posters-for-room-japanese-anime-poster-anime-aa-14-small-original-imaepd7fttqd8ugp.jpeg?q=20"
            alt="">
        </div>
        <div class="swiper-slide">
          <img src="https://i.pinimg.com/736x/b2/93/29/b293299aca362d9ccb50281a6ebb14d8--poster-download.jpg"
            alt="">
        </div>
        <div class="swiper-slide">
          <img
            src="https://c4.wallpaperflare.com/wallpaper/245/816/876/one-piece-monkey-d-luffy-trafalgar-law-ussop-wallpaper-preview.jpg"
            alt="">
        </div>
      </div>
    </div>
  </div>

  <div class="h-full container mx-auto mt-3 py-10">

    <h3 class="text-xl">Your List</h3>
    <div class="grid gap-4 grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
      @forelse ($userList as $list)
        <div class="mt-8 relative">
          <a href="{{ $list['type'] === 'movie' ? route('show_movie', $list['mId']) : route('show_tv', $list['mId']) }}">
            <img src="{{ $list['poster'] }}" alt="poster"
              class="hover:opacity-75 group-hover:opacity-75  transition ease-in-out duration-150 w-40">
          </a>

          <div class="mt-2">
            <a href="{{ $list['type'] === 'movie' ? route('show_movie', $list['mId']) : route('show_tv', $list['mId']) }}"
              class="text-lg mt-2 hover:text-gray-300">{{ $list['title'] }}</a>

          </div>
        </div>
      @empty
        <p class="text-yellow-300">Your list is empty!</p>
      @endforelse
    </div>
    {{ $userList->links() }}
  </div>
@endsection
@push('scripts')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      }
    });
  </script>
@endpush

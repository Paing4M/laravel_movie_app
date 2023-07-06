@extends('layouts.page-layout')
@section('content')
  <div class="container px-4 pt-16 mx-auto pb-5">

    @if (session('error'))
      <div id='success-alert' class="bg-red-500 text-white p-3 rounded mb-2">
        {{ session('error') }}
      </div>
    @endif

    @if (session('success'))
      <div id='success-alert' class="bg-green-500 text-white p-3 rounded mb-2">
        {{ session('success') }}
      </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      // Wait for the document to load
      $(document).ready(function() {
        // Hide the error alert after 5 seconds
        setTimeout(function() {
          $("#error-alert").fadeOut("slow");
        }, 2000);
      });

      $(document).ready(function() {
        // Hide the error alert after 5 seconds
        setTimeout(function() {
          $("#success-alert").fadeOut("slow");
        }, 2000);
      });
    </script>


    <div class="popular_movies">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">popular movies</h2>
      <div class="grid gap-8 grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
        @foreach ($popularMovies as $movie)
          <x-movie-card :movie="$movie" :genres="$genres" />
        @endforeach
      </div>
    </div>


    <div class="nowPlaying_movies mt-5">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">now playing movies</h2>
      <div class="grid gap-8 grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
        @foreach ($nowPlayingMovies as $movie)
          <x-movie-card :movie="$movie" :genres="$genres" />
        @endforeach
      </div>
    </div>
  </div>
@endsection

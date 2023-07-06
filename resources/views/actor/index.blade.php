@extends('layouts.page-layout')
@section('content')
  <div class="container px-4 pt-16 mx-auto pb-5">
    <div class="popular_actors ">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">popular actors</h2>
      <div class="grid  gap-8 grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
        @foreach ($actors as $actor)
          <div class="actor mt-8">
            <a href="{{ route('show_actor', $actor['id']) }}">
              <img src="{{ $actor['profile_path'] }}" alt="profile_img"
                class="hover:opacity-75 transition ease-in-out duration-150 ">
            </a>
            <a href="{{ route('show_actor', $actor['id']) }}"
              class="text-lg hover:text-gray-300 mt-2">{{ $actor['name'] }}</a>
            <div class="text-sm text-gray-400 truncate">{{ $actor['known_for'] }}</div>
          </div>
        @endforeach

      </div>
    </div>

    <div class="page-load-status my-8">
      <div class="flex justify-center mb-8">
        <div class="w-40  text-4xl spinner infinite-scroll-request">&nbsp;
        </div>
      </div>
      <p class="infinite-scroll-last">End of content</p>
      <p class="infinite-scroll-error">Error</p>
    </div>

    {{-- <div class="flex justify-between items-center mt-10">
      @if ($previous)
        <a href="/actors/page/{{ $previous }}" class="hover:text-gray-400">Previous</a>
      @else
        <div></div>
      @endif
      @if ($next)
        <a href="/actors/page/{{ $next }}" class="hover:text-gray-400">Next</a>
      @else
        <div></div>
      @endif
    </div> --}}

  </div>
@endsection

@push('scripts')
  <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
  <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script>
  <script>
    let elem = document.querySelector('.grid');
    let infScroll = new InfiniteScroll(elem, {
      // options
      path: function() {
        return '/actors/page/' + (this.loadCount + 1) * 5;
      },
      append: '.actor',
      history: false,
      status: '.page-load-status'
    });
  </script>
@endpush

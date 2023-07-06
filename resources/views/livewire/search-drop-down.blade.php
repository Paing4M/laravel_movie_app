<div x-data="{ isOpen: true }" @click.away="isOpen=false">
  <div class="relative">
    <input @focus=" isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false"
      @keydown="isOpen=true" wire:model.debounce.500ms="search" type="text"
      class="bg-gray-800 rounded-full px-4 py-1 focus:outline-1 text-sm outline-blue-300 w-64 pl-8" placeholder="Search">
    <i class="fa-solid text-gray-500 text-sm fa-magnifying-glass absolute left-2 top-2"></i>

    <div wire:loading class="spinner"></div>

    @if (strlen($search) >= 2)
      <div x-show.transition.opacity="isOpen" class="w-64 z-50 absolute bg-gray-800 text-sm rounded mt-4 ">
        <ul>
          @forelse ($movies as $movie)
            @if ($loop->index < 8)
              <li class="border-b border-gray-700 ">
                <a @if ($loop->last) @keydown.tab.exact="isOpen = false" @endif
                  href="{{ route('show_movie', $movie['id']) }}" class=" flex hover:bg-gray-700 p-3">
                  @if ($movie['poster_path'])
                    <img src="https://image.tmdb.org/t/p/w92/{{ $movie['poster_path'] }}" alt="poster" class="w-8">
                  @else
                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                  @endif
                  <span class="ml-4">{{ $movie['title'] }}</span>
                </a>
              </li>
            @endif
          @empty
            <li class="p-3">No results for "<span class="text-orange-400">{{ $search }}</span>"</li>
          @endforelse
        </ul>
      </div>
    @endif
  </div>
</div>

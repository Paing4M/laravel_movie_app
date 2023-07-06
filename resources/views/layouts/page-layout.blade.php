<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  @stack('styles')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white">
  <nav class="border-b border-gray-800">
    <div class="container md:flex-row flex flex-col mx-auto  items-center justify-between px-4 py-6">
      <ul class="flex md:flex-row flex-col items-center">
        <li><a href="{{ route('movies') }}"><i class="fa-solid fa-house"></i> MovieApp</a></li>
        <li class="md:ml-16 hover:text-gray-300"><a href="{{ route('movies') }}">Movies</a></li>
        <li class="md:ml-6 hover:text-gray-300"><a href="{{ route('tv') }}">TV Shows</a></li>
        <li class="md:ml-6 hover:text-gray-300"><a href="{{ route('actors') }}">Actors</a></li>
      </ul>

      <div class="flex md:flex-row flex-col items-center mt-2 md:mt-0">
        @livewire('search-drop-down')
        @auth
          <div class="ml-4 mt-3 md:mt-0 relative">
            <div class="flex justify-center">
              <div x-data="{ open: false }">
                <div x-on:click="open = true" class="flex items-center cursor-pointer">
                  <img src="https://ui-avatars.com/api/?size=235&name={{ auth()->user()->name }}"
                    class="rounded-full  w-8 h-8" alt="">
                  <span class="ml-2">{{ auth()->user()->name }}</span>
                </div>
                <div x-show="open" x-transition.origin.top.left x-on:click.outside="open = false" style="display: none;"
                  class="z-50 absolute w-28 right-0 mt-2  rounded-md bg-gray-800 text-sm  shadow-md">
                  <a href="{{ route('your_list') }}"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left  text-sm hover:bg-gray-700 disabled:text-gray-500">
                    Your List
                  </a>

                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type='submit' value="logout"
                      class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-capitalize text-sm hover:bg-gray-700 disabled:text-gray-500">

                    </input>
                  </form>

                </div>
              </div>
            </div>

          </div>
        @else
          <a class="mt-2 md:mt-0 ml-0 md:ml-3 hover:text-gray-300" href="{{ route('login') }}">Login</a>

          <a class="mt-2 md:mt-0 ml-0 md:ml-3 hover:text-gray-300" href="{{ route('register') }}">Register</a>


        @endauth

      </div>
    </div>
  </nav>
  <div class="px-3"> @yield('content')</div>
  <footer class="border  border-t border-gray-800">
    <div class="container mx-auto text-sm px-4 py-6">
      Powered by <a href="https://www.themoviedb.org/documentation/api" class="underline hover:text-gray-300">TMDb
        API</a>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  @livewireScripts
  @stack('scripts')
</body>

</html>

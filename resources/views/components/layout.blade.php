<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      @isset($doctitle)
        {{ $doctitle }} | RealTruth Social Blog
      @else
        RealTruth Social Blog
      @endisset
    </title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" /> --}}
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/css/main.css', 'resources/js/app.js'])
  </head>
  <body>
    <header class="header-bar flex justify-center">
      <div class="flex w-full max-w-7xl justify-between flex-md-row items-center p-3">
        <h3 class="my-0 mr-md-auto text-3xl font-weight-normal"><a href="/" class="text-white">RealTruth Social Blog</a></h3>
        @auth
        <div class="flex-row my-3 my-md-0 flex gap-2">
          <livewire:search />
          {{-- <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span> --}}
          <a href="/profile/{{auth()->user()->username}}" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="{{auth()->user()->avatar}}" /></a>
          @if (auth()->user()->isAdmin)
          <a class="rounded-md bg-green-900 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-700 cursor-pointer" href="/admin-dashboard">Admin Panel</a>
          @endif
          {{-- <a class="btn btn-sm btn-success mr-2" href="/create-post">Create Post</a> --}}
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button class="rounded-md border-white border-2 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 hover:border-gray-800 cursor-pointer">Sign Out</button>
          </form>
        </div>
        @else

        <form action="/login" method="POST" class="mb-0 py-4 pt-md-0">
          @csrf
          <div class="flex gap-4 items-center">
            <div class="">
              <input name="loginusername" class="block w-full rounded bg-white px-3 py-1.5 text-4xl text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm" type="text" placeholder="Username" autocomplete="off" />
            </div>
            <div class="">
              <input name="loginpassword" class="block w-full rounded bg-white px-3 py-1.5 text-4xl text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm" type="password" placeholder="Password" />
            </div>
            <div class="col-md-auto">
              <button class="rounded-md bg-black/100 px-8 py-1.5 text-lg font-semibold text-white shadow-sm hover:bg-black/80 cursor-pointer">Sign In</button>
            </div>
          </div>
        </form>
        @endauth

      </div>
    </header>
    <!-- header ends here -->
    @if (session()->has('success'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed py-4 px-12 bottom-10 right-10 max-w-80 bg-green-200">
      <div class="w-full text-center text-2xl">
        {{ session('success') }}
      </div>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="fixed py-4 px-12 bottom-10 right-10 max-w-80 bg-red-300">
      <div class="w-full text-center text-2xl">
        {{ session('error') }}
      </div>
    </div>
    @endif
    @auth
    <div class="w-full max-w-7xl flex m-auto">
      @if (Request::segment(1) == "post")
      <div class="w-1/5 sticky border-r-2 border-gray-300">
      @else
      <div class="w-1/5 sticky flex flex-col items-center gap-2 pt-6 mt-6 rounded-lg bg-white border border-solid border-gray-400 profile-side-menu">

        <img style="width: 125px; height: 125px; border-radius: 100px;" class="mb-2" src="{{auth()->user()->avatar}}" />
        <p class="text-white text-3xl text-center mb-4">
          <strong>Welcome</strong><br>{{auth()->user()->username}}
        </p>
        <a href="/"><button type="button" class="min-w-40 rounded-md border border-white px-10 py-2.5 text-sm font-semibold text-white shadow-sm cursor-pointer">Your Feed</button></a>
        <a href="/profile/{{auth()->user()->username}}"><button type="button" class="min-w-40 rounded-md border border-white px-10 py-2.5 text-sm font-semibold text-white shadow-sm  cursor-pointer">Your Profile</button></a>
        <a href="/create-post"><button type="button" class="min-w-40 rounded-md border border-white px-10 py-2.5 text-sm font-semibold text-white shadow-sm cursor-pointer">Create Post</button></a>
      @endif
      </div>
      <div class="w-3/5">
        {{ $slot }}
      </div>
      <div class="w-1/5 border-l-2 border-gray-300">

      </div>
    </div>
    @else
    {{ $slot }}
    @endauth

    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
      <p class="m-0">Copyright &copy; {{ date('Y') }} <a href="/" class="text-muted">RealTruth</a>. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      @isset($doctitle)
        {{ $doctitle }} | Real Truth Social Blog
      @else
        Real Truth Social Blog
      @endisset
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/css/main.css', 'resources/js/app.js'])
  </head>
  <body>
    <header class="header-bar mb-3">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">Real Truth Social Blog</a></h4>
        @auth
        <div class="flex-row my-3 my-md-0 flex gap-2">
          <livewire:search />
          {{-- <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span> --}}
          <a href="/profile/{{auth()->user()->username}}" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="{{auth()->user()->avatar}}" /></a>
          @if (auth()->user()->isAdmin)
          <a class="btn btn-sm btn-info mr-2" href="/admin-dashboard">Admin Panel</a>
          @endif
          {{-- <a class="btn btn-sm btn-success mr-2" href="/create-post">Create Post</a> --}}
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-sm btn-secondary">Sign Out</button>
          </form>
        </div>
        @else
        <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
          @csrf
          <div class="row align-items-center">
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
            </div>
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
            </div>
            <div class="col-md-auto">
              <button class="btn btn-primary btn-sm">Sign In</button>
            </div>
          </div>
        </form>
        @endauth
        
      </div>
    </header>
    <!-- header ends here -->
    @if (session()->has('success'))
    <div class="px-10 py-4 fixed bottom-4 right-4" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
      <div class="alert alert-success text-center">
        {{ session('success') }}
      </div>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="px-10 py-4 fixed bottom-4 right-4" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
      <div class="alert alert-danger text-center">
        {{ session('error') }}
      </div>
    </div>
    @endif
    @auth
    <div class="container flex">
      <div class="w-1/5 sticky flex flex-col items-center gap-2 pt-6 rounded" style="background-color: #263c58;">
        <img style="width: 125px; height: 125px; border-radius: 100px;" class="mb-2" src="{{auth()->user()->avatar}}" />
        <h4 class="text-white text-center mb-4"><strong>Welcome </strong><br> {{auth()->user()->username}}</h4>
        <a class="btn btn-lg w-6/8 bg-white" style="color: #263c58;" href="/profile/{{auth()->user()->username}}">Your Profile</a>
        <a class="btn btn-lg w-6/8 border-t-2 bg-white" style="color: #263c58;" href="/create-post">Create Post</a>
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
      <p class="m-0">Copyright &copy; {{ date('Y') }} <a href="/" class="text-muted">Social Connect</a>. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('[data-toggle="tooltip"]').tooltip()
    </script>
  </body>
</html>

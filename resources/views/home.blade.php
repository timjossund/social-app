<x-layout>
  <div class="container py-md-5 full-h">
    <div class="row align-items-center">
      <div class="col-lg-7 py-3 py-md-5">
        <h1 class="display-3">Social Blogging</h1>
        <p class="lead text-muted">Let us handle the hosting, updates, and the servers. You can just enjoy writing of your favorite topics. This is a place to blog about cultural things and doctrinal things from a Christian point of view. Maybe you just want to follow a creator, that's great! Just create an account and you can use the search to read about the topics or follow our creators.</p>
      </div>
      <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
        <form action="/register" method="POST" id="registration-form">
          @csrf
          <h2>Get Your Account Now!</h2>
          <div class="form-group">
            <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
            <input name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" value="{{ old('username') }}" />
            @error('username')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <div class="form-group">
            <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
            <input name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" value="{{ old('email') }}"/>
            @error('email')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <div class="form-group">
            <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
            <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
            @error('password')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <div class="form-group">
            <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
            <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
            @error('password_confirmation')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>
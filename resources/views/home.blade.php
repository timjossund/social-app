<x-layout>
  <div class="w-full max-w-7xl flex m-auto full-h">
    <div class="flex items-center justify-center h-full">
      <div class="w-3/5 p-10">
        <h1 class="">Social Blogging</h1>
        <p class="text-2xl text-muted">Let us handle the hosting, updates, and the servers. You can just enjoy writing of your favorite topics. This is a place to plog about cultural things and doctrinal things from a Christian point of view. Maybe you just want to follow a creator, that's great! Just creaate an account and you can use the search to read about the topics or follow our creators.</p>
      </div>
      <div class="rounded-lg w-2/5 p-8 bg-white mt-14">
        <form action="/register" method="POST" id="registration-form">
          @csrf
          <h2>Get Your Account Now!</h2>
          <div class="form-group my-4">
            <label for="username-register" class="text-muted mb-2 text-2xl"><small>Username</small></label>
            <input name="username" id="username-register" class="block w-full rounded-md bg-white px-3 py-1.5 text-4xl text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm" style="font-size: 20px;" type="text" placeholder="Pick a username" autocomplete="off" value="{{ old('username') }}" />
            @error('username')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <div class="form-group my-4">
            <label for="email-register" class="text-muted mb-2 text-2xl"><small>Email</small></label>
            <input style="font-size: 20px;" name="email" id="email-register" class="block w-full rounded-md bg-white px-3 py-1.5 text-4xl text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm" type="text" placeholder="you@example.com" autocomplete="off" value="{{ old('email') }}"/>
            @error('email')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <div class="form-group my-4">
            <label for="password-register" class="text-muted mb-2 text-2xl"><small>Password</small></label>
            <input style="font-size: 20px;" name="password" id="password-register" class="block w-full rounded-md bg-white px-3 py-1.5 text-4xl text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm" type="password" placeholder="Create a password" />
            @error('password')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <div class="form-group my-4">
            <label for="password-register-confirm" class="text-muted mb-2 text-2xl"><small>Confirm Password</small></label>
            <input style="font-size: 20px;" name="password_confirmation" id="password-register-confirm" class="block w-full rounded-md bg-white px-3 py-1.5 text-4xl text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm" type="password" placeholder="Confirm password" />
            @error('password_confirmation')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
            @enderror
          </div>

          <button type="submit" class="rounded-md bg-green-700 px-10 py-4.5 text-xl font-semibold text-white shadow-sm hover:bg-green-800 cursor-pointer my-6 w-full">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>
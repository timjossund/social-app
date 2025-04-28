<x-layout :doctitle="$doctitle">
  <div class="container container--narrow full-h">
    <div class="p-6 flex items-center">
      <div class="flex items-center">
        <div class="flex items-center">
          <img class="avatar-small mt-2" src="{{$sharedData['avatar']}}" /> <h2>{{$sharedData['username']}}</h2>
        </div>
      @auth
      @if (!$sharedData['currentlyFollowing'] AND auth()->user()->username != $sharedData['username'])
      <form class="ml-2 d-inline" action="/create-follow/{{$sharedData['username']}}" method="POST">
        @csrf
        <button class="rounded-md bg-green-700 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-600 cursor-pointer">Follow <i class="fas fa-user-plus"></i></button>
      </form>
      @endif
      @if ($sharedData['currentlyFollowing'] AND auth()->user()->id != $sharedData['username'])
      <form class="ml-2 d-inline" action="/remove-follow/{{$sharedData['username']}}" method="POST">
        @csrf
        <button class="rounded-md bg-red-700 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-600 cursor-pointer">Stop Following <i class="fas fa-user-times"></i></button>
      </form>
      @endif
      @if(auth()->user()->username == $sharedData['username'])
      <a href="/manage-avatar" class="pl-4">
      <button class="rounded-md border-2 border-black/100 px-10 py-2.5 text-sm font-semibold text-black shadow-sm hover:border-black/50 cursor-pointer">Manage Avatar</button>
      </a>
      @endif
      @endauth
      </div>
    </div>
    <div class="pt-6 px-6">
      <div class="grid grid-cols-1 hidden ">
        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
        <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
          <option>My Account</option>
          <option>Company</option>
          <option selected>Team Members</option>
          <option>Billing</option>
        </select>
        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="hidden sm:block">
        <nav class="flex space-x-4" aria-label="Tabs">
          <!-- Current: "bg-gray-100 text-gray-700", Default: "text-gray-500 hover:text-gray-700" -->
          <a href="/profile/{{$sharedData['username']}}" class="px-3 py-2 text-2xl font-medium hover:text-gray-700 {{Request::segment(3) == "" ? "bg-gray-400 text-gray-100" : "text-gray-500"}}">Posts: {{$sharedData['postCount']}}</a>
          <a href="/profile/{{$sharedData['username']}}/followers" class="px-3 py-2 text-2xl font-medium hover:text-gray-700  {{Request::segment(3) == "followers" ? "bg-gray-400 text-gray-100" : "text-gray-500"}}">Followers: {{$sharedData['followerCount']}}</a>
          <a href="/profile/{{$sharedData['username']}}/following" class="px-3 py-2 text-2xl font-medium hover:text-gray-700 {{Request::segment(3) == "following" ? "bg-gray-400 text-gray-100" : "text-gray-500"}}">Following: {{$sharedData['followingCount']}}</a>
        </nav>
      </div>
    </div>
    <div class="profile-slot-content bg-gray-400 p-6 mx-6">
      {{ $slot }}
    </div>
  </div>
</x-layout>

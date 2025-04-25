<x-app-layout :shareData="$sharedData" doctitle="{{$sharedData['username']}}'s profile">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <h2 class="mb-4">The Latest From Those You Follow:</h2>
    <div class="list-group mb-3">
    @foreach ($posts as $post)
      <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
        <h4>{{ $post->title }}</h4>
        <div class="flex gap-1">
          <img class="avatar-tiny" src="{{$post->user->avatar}}" />
        {{$post->user->username}} on {{$post->created_at->format('n/j/Y')}}
        </div>
      </a>
    @endforeach
    </div>
    {{ $posts->links() }}
</x-app-layout>

<x-layout :doctitle="$post->title">
  <div class="container p-6 container--narrow full-h">
    <div class="flex justify-between items-center">
      <h2>{{ $post->title }}</h2>
      @can('update', $post)
      <span class="py-2 flex">
        <a href="/post/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
        <form class="delete-post-form d-inline" action="/post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="delete-post-button text-red-700" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
        </form>
      </span>
      @endcan
    </div>
    <p class="small mb-4 text-muted flex">
      <a href="/profile/{{ $post->user->username }}"><img class="avatar-tiny" src="{{$post->user->avatar}}" /></a> Posted by <a href="/profile/{{ $post->user->username }}" class="mx-1">{{ $post->user->username }}</a> on {{$post->created_at->format('n/j/Y')}}
    </p>
    <div class="body-content">
      {!! $post->body !!}
    </div>
    <div class="flex gap-6">
      <a class="rounded-md bg-black/100 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-black/80 cursor-pointer" href="{{ URL::previous() }}">Go back</a>
      <a href="/"><button type="button" class="min-w-40 rounded-md bg-black/100 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-black/80 cursor-pointer">Your Feed</button></a>
      <a href="/profile/{{auth()->user()->username}}"><button type="button" class="min-w-40 rounded-md bg-black/100 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-black/80 cursor-pointer">Your Profile</button></a>
    </div>
    
  </div>
</x-layout>

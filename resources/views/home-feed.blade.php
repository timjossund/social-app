<x-layout>
  <div class="w-full full-h flex flex-col">
    @unless ($posts->isEmpty())
    <h2 class="m-4">The Latest From Those You Follow:</h2>
     <div class="flow-root">
    <div role="list" class="flex w-full flex-col pr-6">
      @foreach ($posts as $post)
      <a href="/post/{{$post->id}}" class="bg-gray-100 border border-solid border-gray-400 mx-2 my-1 p-4 w-full">
        <h4 class="text-3xl mb-1">{{ $post->title }}</h4>
        <div class="relative flex space-x-3 gap-2">
          
          <img class="avatar-tiny" src="{{$post->user->avatar}}" />
          {{$post->user->username}} on {{$post->created_at->format('n/j/Y')}}
        </div>
      </a>
      @endforeach
    </div>
  </div>
    {{-- <div class="list-group mb-3">
    @foreach ($posts as $post)
      <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
        <h4>{{ $post->title }}</h4>
        <div class="flex gap-1">
          <img class="avatar-tiny" src="{{$post->user->avatar}}" />
        {{$post->user->username}} on {{$post->created_at->format('n/j/Y')}}
        </div>
      </a>
    @endforeach
    </div> --}}
    <div class="text-white p-4">
      {{ $posts->links() }}
    </div>
    
    @else 
    <div class="text-center">
      <h2>Hello <strong>{{ auth()->user()->username }}</strong>, your feed is empty.</h2>
      <p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you don&rsquo;t have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top menu bar to find content written by people with similar interests and then follow them.</p>
    </div>
    @endunless
  </div>
</x-layout>
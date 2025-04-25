<x-layout>
  <div class="w-full py-md-5 full-h">
    @unless ($posts->isEmpty())
    <h2 class="mb-4">The Latest From Those You Follow:</h2>
    <div class="flow-root">
      <div role="list" class="flex flex-col">
        @foreach ($posts as $post)
        <a href="/post/{{$post->id}}" class="bg-white border border-solid border-gray-400 mx-2 my-1 p-4 rounded bg-white">
          <div class="relative flex space-x-3 gap-2">
            <img class="avatar-tiny" src="{{$post->user->avatar}}" />
            <div class="flex min-w-0 flex-1">
              <p class="text-black text-lg">
                <strong>{{ $post->title }}</strong> on {{$post->created_at->format('n/j/Y')}}
              </p>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    {{ $posts->links() }}
    @else 
    <div class="text-center">
      <h2>Hello <strong>{{ auth()->user()->username }}</strong>, your feed is empty.</h2>
      <p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you don&rsquo;t have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top menu bar to find content written by people with similar interests and then follow them.</p>
    </div>
    @endunless
  </div>
</x-layout>
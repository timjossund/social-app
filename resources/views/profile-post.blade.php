<x-profile :shareData="$sharedData" doctitle="{{$sharedData['username']}}'s profile">
  <div class="list-group">
    @foreach ($posts as $post)
    <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
      <div class="flex">
        <img class="avatar-tiny" src="{{$post->user->avatar}}" />
        <p>
          <strong>{{ $post->title }}</strong> on {{$post->created_at->format('n/j/Y')}}
        </p>
      </div>
    </a>
    @endforeach
  </div>
</x-profile>
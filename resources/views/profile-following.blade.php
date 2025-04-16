<x-profile :shareData="$sharedData">
  <div class="list-group">
    @foreach ($followings as $following)
    <a href="/profile/{{$following->userFollowed->username}}" class="list-group-item list-group-item-action">
      <img class="avatar-tiny" src="{{$following->userFollowed->avatar}}" />
      {{$following->userFollowed->username}}
    </a>
    @endforeach
  </div>
</x-profile>
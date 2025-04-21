<x-profile :shareData="$sharedData" doctitle="{{$sharedData['username']}}'s profile">
  <div class="list-group">
    @foreach ($followings as $following)
    <a href="/profile/{{$following->userFollowed->username}}" class="list-group-item list-group-item-action">
      <div class="flex">
        <img class="avatar-tiny" src="{{$following->userFollowed->avatar}}" />
        {{$following->userFollowed->username}}
      </div>
    </a>
    @endforeach
  </div>
</x-profile>
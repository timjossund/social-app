<x-profile :shareData="$sharedData" doctitle="{{$sharedData['username']}}'s profile">
  <div class="list-group">
    @foreach ($followers as $follower)
    <a href="/profile/{{$follower->userFollowing->username}}" class="list-group-item list-group-item-action">
      <div class="flex">
        <img class="avatar-tiny" src="{{$follower->userFollowing->avatar}}" />
        {{$follower->userFollowing->username}}
      </div>
    </a>
    @endforeach
  </div>
</x-profile>
<x-profile :shareData="$sharedData" doctitle="Who follows {{$sharedData['username']}}">
  <div class="flow-root">
    <div role="list" class="flex flex-col">
    @foreach ($followers as $follower)
    <a href="/profile/{{$follower->userFollowing->username}}" class="bg-gray-100 border border-solid border-gray-400 mx-2 my-1 p-4">
      <div class="relative flex space-x-3 gap-2">
        <img class="avatar-tiny" src="{{$follower->userFollowing->avatar}}" />
        {{$follower->userFollowing->username}}
      </div>
    </a>
    @endforeach
  </div>
  </div>
</x-profile>
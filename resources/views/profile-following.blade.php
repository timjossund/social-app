<x-profile :shareData="$sharedData" doctitle="Who {{$sharedData['username']}} follows">
  <div class="flow-root">
    <div role="list" class="flex flex-col">
    @foreach ($followings as $following)
      <a href="/profile/{{$following->userFollowed->username}}" class="bg-gray-100 border border-solid border-gray-400 mx-2 my-1 p-4">
        <div class="relative flex space-x-3 gap-2">
          <img class="avatar-tiny" src="{{$following->userFollowed->avatar}}" />
          {{$following->userFollowed->username}}
        </div>
      </a>
    {{-- <a href="/profile/{{$following->userFollowed->username}}" class="list-group-item list-group-item-action">
      <div class="flex">
        <img class="avatar-tiny" src="{{$following->userFollowed->avatar}}" />
        {{$following->userFollowed->username}}
      </div>
    </a> --}}
    @endforeach
  </div>
  </div>
</x-profile>
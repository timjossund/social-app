<x-profile :shareData="$sharedData" doctitle="{{$sharedData['username']}}'s profile">
  <div class="flow-root">
    <div role="list" class="flex flex-col">
      @foreach ($posts as $post)
      <a href="/post/{{$post->id}}" class="bg-gray-100 border border-solid border-gray-400 mx-2 my-1 p-4">
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
</x-profile>

{{-- <div class="flow-root">
  <ul role="list" class="-mb-8">
    
    <li>
      <div class="relative pb-8">
        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
        <div class="relative flex space-x-3">
          <div>
            <span class="flex size-8 items-center justify-center rounded-full bg-blue-500 ring-8 ring-white">
              <svg class="size-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path d="M1 8.25a1.25 1.25 0 1 1 2.5 0v7.5a1.25 1.25 0 1 1-2.5 0v-7.5ZM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0 1 14 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 0 1-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 0 1-1.341-.317l-2.734-1.366A3 3 0 0 0 6.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 0 1 2.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388Z" />
              </svg>
            </span>
          </div>
          <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
            <div>
              <p class="text-sm text-gray-500">Advanced to phone screening by <a href="#" class="font-medium text-gray-900">Bethany Blake</a></p>
            </div>
            <div class="whitespace-nowrap text-right text-sm text-gray-500">
              <time datetime="2020-09-22">Sep 22</time>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="relative pb-8">
        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
        <div class="relative flex space-x-3">
          <div>
            <span class="flex size-8 items-center justify-center rounded-full bg-green-500 ring-8 ring-white">
              <svg class="size-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
              </svg>
            </span>
          </div>
          <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
            <div>
              <p class="text-sm text-gray-500">Completed phone screening with <a href="#" class="font-medium text-gray-900">Martha Gardner</a></p>
            </div>
            <div class="whitespace-nowrap text-right text-sm text-gray-500">
              <time datetime="2020-09-28">Sep 28</time>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="relative pb-8">
        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
        <div class="relative flex space-x-3">
          <div>
            <span class="flex size-8 items-center justify-center rounded-full bg-blue-500 ring-8 ring-white">
              <svg class="size-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path d="M1 8.25a1.25 1.25 0 1 1 2.5 0v7.5a1.25 1.25 0 1 1-2.5 0v-7.5ZM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0 1 14 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 0 1-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 0 1-1.341-.317l-2.734-1.366A3 3 0 0 0 6.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 0 1 2.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388Z" />
              </svg>
            </span>
          </div>
          <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
            <div>
              <p class="text-sm text-gray-500">Advanced to interview by <a href="#" class="font-medium text-gray-900">Bethany Blake</a></p>
            </div>
            <div class="whitespace-nowrap text-right text-sm text-gray-500">
              <time datetime="2020-09-30">Sep 30</time>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="relative pb-8">
        <div class="relative flex space-x-3">
          <div>
            <span class="flex size-8 items-center justify-center rounded-full bg-green-500 ring-8 ring-white">
              <svg class="size-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
              </svg>
            </span>
          </div>
          <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
            <div>
              <p class="text-sm text-gray-500">Completed interview with <a href="#" class="font-medium text-gray-900">Katherine Snyder</a></p>
            </div>
            <div class="whitespace-nowrap text-right text-sm text-gray-500">
              <time datetime="2020-10-04">Oct 4</time>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div> --}}
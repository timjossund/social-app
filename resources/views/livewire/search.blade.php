<div x-data="{ isOpen: false }">
    <button x-on:click="isOpen = true; setTimeout(() => document.querySelector('#live-search-field').focus(), 50)" class="text-white mr-2 header-search-icon cursor-pointer" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></button>
    <div class="search-overlay" x-bind:class="isOpen ? 'search-overlay--visible' : '';">
    <div class="search-overlay-top shadow-sm flex justify-center">
      <div class="container container--narrow">
        <label for="live-search-field" class="search-overlay-icon"><i class="fas fa-search"></i></label>
        <input wire:model.live.debounce.750ms="searchTerm" autocomplete="off" type="text" id="live-search-field" class="live-search-field" placeholder="What are you interested in?" x-on:keydown="document.querySelector('.circle-loader').classList.add('circle-loader--visible'); if(document.querySelector('#no-results-found')){document.querySelector('#no-results-found').style.display = 'none';}">
        <span class="close-live-search" x-on:click="isOpen = false;"><i class="fas fa-times-circle"></i></span>
      </div>
    </div>
    <div class="search-overlay-bottom  overflow-scroll">
      <div class="w-full max-w-7xl mx-auto py-3 overflow-scroll">
        <div class="circle-loader"></div>
        <div class="live-search-results live-search-results--visible">
          @if (count($results) == 0 && $searchTerm !== '')    
          <div class="py-4 px-12 max-w-80 bg-red-200 m-auto" id="no-results-found"><strong>No Search Results</strong>
          </div>
          @endif

          <div class="list-group shadow-sm">
          @if (count($results) > 0)
            <div class="list-group-item m-auto py-4 active w-full max-w-5xl text-2xl text-center text-white"><strong>Search Results</strong>
            ({{count($results)}} {{count($results) > 1 ? "results" : "result"}})
            </div>
            <div class="flow-root">
              <div role="list" class="flex w-full max-w-4xl flex-col m-auto">
              @foreach ($results as $post)
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
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>`
</div>

<x-layout doctitle="Edit {{$post->title}}">
  <div class="container p-4 container--narrow full-h">
    <h2>Edit your post</h2>
    <p><strong><a href="/post/{{$post->id}}">&laquo; return to post</a></strong></p>
    <form action="/post/{{$post->id}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group my-4">
        <label for="post-title" class="text-muted text-xl">Title</label>
        <input name="title" id="post-title" class="block w-full rounded-md bg-white px-3 py-1.5 text-4xl text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm" type="text" placeholder="title" autocomplete="off" style="color: black; font-size:24px;" value="{{ old('title', $post->title) }}"/>
        @error('title')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
        @enderror
      </div>

      <div class="form-group">
        <label for="post-body" class="text-muted mb-2 text-xl"><small>Body Content | Markdown is simple and supported in this text area. <a href="https://www.markdownguide.org/cheat-sheet/" target="_blank">Learn Markdown</a></small></label>
        <textarea rows="10" name="body" id="post-body" class="block w-full rounded-md bg-white px-3 py-1.5 text-4xl text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm" type="text" style="color: black; font-size:24px;">{{ old('body', $post->body) }}</textarea>
        @error('body')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
        @enderror
      </div>

      <button class="rounded-md bg-black/100 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-black/80 cursor-pointer my-6">Update Post</button>
    </form>
  </div>
</x-layout>
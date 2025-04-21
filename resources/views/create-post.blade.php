<x-layout doctitle="Create New Post">
  <div class="container py-md-5 container--narrow full-h">
    <h1>Create a new post</h1>
    <form action="/create-post" method="POST">
      @csrf
      <div class="form-group">
        <label for="post-title" class="text-muted mb-1 text-xl"><small>Title</small></label>
        <input name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" style="color: black" value="{{ old('title') }}"/>
        @error('title')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
        @enderror
      </div>

      <div class="form-group">
        <label for="post-body" class="text-muted mb-2 text-xl"><small>Body Content | Markdown is simple and supported in this text area. <a href="https://www.markdownguide.org/cheat-sheet/" target="_blank">Learn Markdown</a></small></label>
        <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text" style="color: black">{{ old('body') }}</textarea>
        @error('body')
          <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p> 
        @enderror
      </div>
      <button class="btn btn-primary">Save New Post</button>
    </form>
  </div>
</x-layout>
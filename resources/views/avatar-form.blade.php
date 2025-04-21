<x-layout doctitle="Add New Avatar">
  <div class="container container--narrow py-md-5 full-h">
    <h2 class="mb-5">Upload a new avatar</h2>
    <form action="/manage-avatar" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="mb-3 bg-secondary p-6 text-white">
        <input type="file" name="avatar" id="avatar" class="border p-2" style="cursor: pointer;text-decoration:underline;">
        @error('avatar')
        <p class="alert small alert-danger shadow-sm">{{ $message }}</p>
        @enderror
      </div>
      <button class="btn btn-primary">Save Avatar</button>
    </form>
  </div>
</x-layout>
<x-layout doctitle="Add New Avatar">
  <div class="container container--narrow p-5 full-h">
    <h2 class="m-5">Upload a new avatar</h2>
    <form action="/manage-avatar" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="mb-3 bg-secondary p-6 text-white">
        <input type="file" name="avatar" id="avatar" class="border border-black p-2 text-black" style="cursor: pointer;text-decoration:underline;">
        @error('avatar')
        <p class="alert small alert-danger shadow-sm">{{ $message }}</p>
        @enderror
      </div>
      <button class="rounded-md bg-black/100 px-10 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-black/80 cursor-pointer mx-6">Save Avatar</button>
    </form>
  </div>
</x-layout>

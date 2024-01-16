<form class="p-4 md:p-5" action="/todos/{{$data->id_todo}}" method="post">
    @csrf
    @method('PATCH')
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">deskripsi todo</label>
            <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 " value="{{$data->deskripsi}}" required="">
        </div>
    </div>
    <button type="submit" class="text-white flex ms-auto items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        edit tugas
    </button>
</form>
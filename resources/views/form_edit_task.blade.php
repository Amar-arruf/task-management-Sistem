<form class="p-4 md:p-5" action="/task-edit/{{$data->id_tugas}}" method="post">
    <div class="grid gap-4 mb-4 grid-cols-2">
        @csrf
        @method('PATCH')
        <div class="col-span-2">
            <label for="id_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">user</label>
            <select id="id_user" name="id_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="{{$data->id_user}}">
                    @php
                    $selectedUser = collect($data_users)->firstWhere('id_user', $data->id_user);
                    echo $selectedUser ? $selectedUser->nama : 'Nama Tidak Ditemukan';
                    @endphp
                </option>
                @foreach($data_users as $user)
                <option value="{{$user->id_user}}">{{$user->nama}}</option>
                @endforeach
            </select>
            <label for="kategori_task" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kategori task</label>
            <select id="kategori_task" name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="{{$data->id_kategori}}">
                    @php
                    $selectedTask_Kategoris = collect($task_kategoris)->firstWhere('id_kategori', $data->id_kategori);
                    echo $selectedTask_Kategoris ? $selectedTask_Kategoris->nama_kategori : 'Nama Tidak Ditemukan';
                    @endphp
                </option>
                @foreach($task_kategoris as $kategori)
                <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-2">
            <label for="judul_tugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">judul tugas</label>
            <input type="text" name="judul_tugas" id="judul_tugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$data->judul_tugas}}" required="">
        </div>
        <div class="col-span-2">
            <label for="pemberi_tugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">pemberi tugas</label>
            <input type="text" name="pemberi_tugas" id="pemberi_tugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$data->pemberi_tugas}}" required="">
        </div>
        <div class="col-span-2">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi tentang tugas</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="berikan deskripsi tentang tugas" value="{{$data->deskripsi}}">{{$data->deskripsi}}</textarea>
        </div>
        <div class="col-span-2">
            <label for="todo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">todo</label>
            <select id="todo" name="id_todo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="{{$data->id_todo}}">
                    @php
                    $selectedtodo = collect($todos)->firstWhere('id_todo', $data->id_todo);
                    echo $selectedtodo ? $selectedtodo->deskripsi : 'Nama Tidak Ditemukan';
                    @endphp
                </option>
                @foreach($todos as $todo)
                <option value="{{$todo->id_todo}}">{{$todo->deskripsi}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-2">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
            <input type="text" name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{$data->status}}">
        </div>

    </div>
    <button type="submit" class="text-white flex ms-auto items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        edit task
    </button>
</form>
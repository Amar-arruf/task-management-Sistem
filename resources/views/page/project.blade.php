@extends('layout')

@section('title', 'project')

@section('content')
<div>
    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-orange-custom font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
        buat tugas
    </button>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        buat tugas baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="/task-create" method="post">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        @csrf
                        <div class="col-span-2">
                            <label for="id_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">user</label>
                            <select id="id_user" name="id_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>id user</option>
                                @foreach($data_users as $user)
                                <option value="{{$user->id_user}}">{{$user->nama}}</option>
                                @endforeach
                            </select>
                            <label for="kategori_task" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kategori task</label>
                            <select id="kategori_task" name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>kategori</option>
                                @foreach($task_kategoris as $kategori)
                                <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="judul_tugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">judul tugas</label>
                            <input type="text" name="judul_tugas" id="judul_tugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="pemberi_tugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">pemberi tugas</label>
                            <input type="text" name="pemberi_tugas" id="pemberi_tugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi tentang tugas</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="berikan deskripsi tentang tugas"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="todo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">todo</label>
                            <select id="todo" name="id_todo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>todo</option>
                                @foreach($todos as $todo)
                                <option value="{{$todo->id_todo}}">{{$todo->deskripsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
                            <input type="text" name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="not started">
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">date</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"></path>
                                    </svg>
                                </div>
                                <input id="datepicker" type="text" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="text-white flex ms-auto items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        tambah task
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-3 flex gap-5 justify-between">
        <div class="w-full">
            <h6 class="text-base text-center font-bold mb-2">Not Started</h6>
            <div id="not-started" class="min-h-[220px]">
                @foreach($tasks as $data)
                @if ($data->status == 'not started')
                <div data-id="{{$data->id_tugas}}" class="w-full my-2 p-3 bg-white rounded-lg">
                    <div class="flex items-center mb-2">
                        <span class="inline-block text-lg font-bold mb-1">{{$data->pemberi_tugas}}</span>
                        <div class="ms-auto">
                            <button class="edit-btn px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$data->id_tugas}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                </svg>
                            </button>
                            <button class="delete-btn px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$data->id_tugas}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-justify pb-2 text-sm text-slate-500">{{$data->deskripsi}}</p>
                    @if ($data->nama_kategori == 'testing')
                    <span class='inline-block bg-yellow-100 px-3 font-bold mb-3 text-[12px] text-yellow-400 rounded-lg'>testing</span>
                    @elseif ($data->nama_kategori == 'ios')
                    <span class='inline-block bg-blue-100 px-3 font-bold mb-3 text-[12px] text-blue-400 rounded-lg'>ios</span>
                    @elseif ($data->nama_kategori == 'web')
                    <span class='inline-block bg-green-100 px-3 font-bold mb-3 text-[12px] text-green-400 rounded-lg'>web</span>
                    @else
                    <span class='inline-block bg-purple-100 px-3 font-bold mb-3 text-[12px] text-purple-400 rounded-lg'>mobile</span>
                    @endif
                    <span class="block px-3 border-2 border-red-400 rounded-full text-sm w-fit bg-red-200 text-red-400">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->format('d-M-Y')}}</span>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="w-full">
            <h6 class="text-base text-center font-bold">On Progress</h6>
            <div id="progress" class="min-h-[220px]">
                @foreach($tasks as $data)
                @if ($data->status == 'progress')
                <div data-id="{{$data->id_tugas}}" class="w-full my-2 p-3 bg-white rounded-lg">
                    <div class="flex items-center mb-2">
                        <span class="inline-block text-lg font-bold mb-1">{{$data->pemberi_tugas}}</span>
                        <div class="ms-auto">
                            <button class="edit-btn px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$data->id_tugas}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                </svg>
                            </button>
                            <button class="delete-btn px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$data->id_tugas}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-justify pb-2 text-sm text-slate-500">{{$data->deskripsi}}</p>
                    @if ($data->nama_kategori == 'testing')
                    <span class='inline-block bg-yellow-100 px-3 font-bold mb-3 text-[12px] text-yellow-400 rounded-lg'>testing</span>
                    @elseif ($data->nama_kategori == 'ios')
                    <span class='inline-block bg-blue-100 px-3 font-bold mb-3 text-[12px] text-blue-400 rounded-lg'>ios</span>
                    @elseif ($data->nama_kategori == 'web')
                    <span class='inline-block bg-green-100 px-3 font-bold mb-3 text-[12px] text-green-400 rounded-lg'>web</span>
                    @else
                    <span class='inline-block bg-purple-100 px-3 font-bold mb-3 text-[12px] text-purple-400 rounded-lg'>mobile</span>
                    @endif
                    <span class="block px-3 border-2 border-red-400 rounded-full text-sm w-fit bg-red-200 text-red-400">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->format('d-M-Y')}}</span>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="w-full">
            <h6 class="text-base text-center font-bold">Completed</h6>
            <div id="completed" class="min-h-[220px]">
                @foreach($tasks as $data)
                @if ($data->status == 'completed')
                <div data-id="{{$data->id_tugas}}" class="w-full my-2 p-3 bg-white rounded-lg">
                    <div class="flex items-center mb-2">
                        <span class="inline-block text-lg font-bold mb-1">{{$data->pemberi_tugas}}</span>
                        <div class="ms-auto">
                            <button class="edit-btn px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$data->id_tugas}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                </svg>
                            </button>
                            <button class="delete-btn px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$data->id_tugas}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-justify pb-2 text-sm text-slate-500">{{$data->deskripsi}}</p>
                    @if ($data->nama_kategori == 'testing')
                    <span class='inline-block bg-yellow-100 px-3 font-bold mb-3 text-[12px] text-yellow-400 rounded-lg'>testing</span>
                    @elseif ($data->nama_kategori == 'ios')
                    <span class='inline-block bg-blue-100 px-3 font-bold mb-3 text-[12px] text-blue-400 rounded-lg'>ios</span>
                    @elseif ($data->nama_kategori == 'web')
                    <span class='inline-block bg-green-100 px-3 font-bold mb-3 text-[12px] text-green-400 rounded-lg'>web</span>
                    @else
                    <span class='inline-block bg-purple-100 px-3 font-bold mb-3 text-[12px] text-purple-400 rounded-lg'>mobile</span>
                    @endif
                    <span class="block px-3 border-2 border-red-400 rounded-full text-sm w-fit bg-red-200 text-red-400">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->format('d-M-Y')}}</span>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    edit data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" id="button-hidden">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div id="form-id"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker", {
            // Additional options if needed
            dateFormat: "Y-m-d", // Adjust the date format as needed
            // More options can be found in the flatpickr documentation
        });
        const buttonEdit = document.querySelectorAll('.edit-btn');
        const editModal = document.getElementById('edit-modal');
        const formEditModal = document.getElementById('form-id')
        const closeModalEdit = document.getElementById('button-hidden');

        // options with default values
        const options = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,
            onHide: () => {
                console.log('modal is hidden');
            },
            onShow: () => {
                console.log('modal is shown');
            },
            onToggle: () => {
                console.log('modal has been toggled');
            },
        };

        // instance options object
        const instanceOptions = {
            id: '#edit-modal',
            override: true
        };

        const modal = new Modal(editModal, options, instanceOptions);

        buttonEdit.forEach(button => {
            button.addEventListener('click', () => {
                const dataId = button.dataset.getid;
                fetch('/form-task-edit/' + dataId)
                    .then(response => response.text())
                    .then(data => {
                        formEditModal.innerHTML = data;
                        modal.show();
                    })
                    .catch(error => console.error('Error:', error))
            })
        });

        closeModalEdit.addEventListener('click', function(event) {
            if (event.target === closeModalEdit) {
                formEditModal.innerHTML = '';
                modal.hide();
            }
        });
    });

    function updateState(evt) {
        // ambil data ke kategori 
        let keKategori = evt.to.id;
        keKategori = keKategori.replace('-', ' ').toLowerCase();

        // hubungkan ke server
        fetch('/task-update-status', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    status: keKategori,
                    idTugas: evt.item.dataset.id
                })
            }).then(response => response.json())
            .then(data => console.log(data))
            .catch(error => 'terjadi error:' + error);
    }

    new Sortable(document.getElementById('not-started'), {
        group: 'kanban',
        animation: 150,
        onChange: function(evt) {
            updateState(evt);
        }
    })

    new Sortable(document.getElementById('progress'), {
        group: 'kanban',
        animation: 150,
        onChange: function(evt) {
            updateState(evt)
        }
    })
    new Sortable(document.getElementById('completed'), {
        group: 'kanban',
        animation: 150,
        onChange: function(evt) {
            updateState(evt)
        }
    })

    const btnDelete = document.querySelectorAll('.delete-btn');

    btnDelete.forEach((elDel => {
        elDel.addEventListener('click', () => {
            let id = elDel.getAttribute('data-getid')
            let res = confirm('apakah kamu yakin ingin menghapus dengan id: ' + id);
            if (res) {
                fetch('/task-delete/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.text())
                    .then(res => location.reload())
                    .catch(error => alert('terjadi error' + console.error(error)));
            }
        })
    }))
</script>

@endsection
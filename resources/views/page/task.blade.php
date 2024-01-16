@extends('layout')

@section('title','task')
@section('content')
<div>
    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-orange-custom font-medium rounded-lg text-sm px-5 py-2 mb-3 text-center" type="button">
        buat todo list
    </button>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        buat todo list
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="/todos" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">deskripsi todo</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 " required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white flex ms-auto items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        tambah tugas
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div>
        <ul class="flex items-center bg-white rounded-md px-3 py-2 mb-3">
            <li class="text-slate-400  grow font-semibold">Nama Tugas</li>
            <li class="text-slate-400 w-[200px] font-semibold">Kategori Tugas</li>
            <li class="text-slate-400 w-[200px] font-semibold">Pemberi Tugas</li>
            <li class="text-slate-400 w-[100px] font-semibold">Dedline</li>
        </ul>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tbody>
                @foreach($todos as $todo)
                <tr class="bg-white border border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="checkbock w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td scope="row" class="w-[531px] deskripsi flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white nama-tugas">
                        {{$todo->deskripsi}}
                        <div class="edit-btn ms-auto px-3">
                            <button class="todo-edit hidden px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$todo->id_todo}}">
                                <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                </svg>
                            </button>
                        </div>
                        <button class="todo-delete hidden px-1 py-1 w-fit border-2 border-gray-400 rounded-lg" data-getid="{{$todo->id_todo}}">
                            <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                            </svg>
                        </button>
                    </td>
                    <td class="w-[200px] px-6 py-4">
                        {{$todo->nama_kategori}}
                    </td>
                    <td class="w-[151px] px-6 py-4">
                        {{$todo->pemberi_tugas}}
                    </td>
                    <td class="px-6 py-4">
                        {{$todo->date}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    edit data todo list
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
    document.addEventListener('DOMContentLoaded', () => {
        const Checkboxs = document.querySelectorAll('.checkbock');
        const nama_tugas = document.getElementsByClassName('nama-tugas');

        Checkboxs.forEach((checkbox, index) => {
            checkbox.addEventListener('click', () => {
                nama_tugas[index].classList.toggle('line-through')
                nama_tugas[index].classList.toggle('!text-slate-400')
            });
        })

        const edit = document.querySelectorAll('.edit-btn');
        const editModal = document.getElementById('edit-modal');
        const formEditModal = document.getElementById('form-id')
        const closeModalEdit = document.getElementById('button-hidden');

        // options with default values
        const options = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,

        };

        // instance options object
        const instanceOptions = {
            id: '#edit-modal',
            override: true
        };

        const modal = new Modal(editModal, options, instanceOptions);

        edit.forEach((el, key) => {

            const deskripsi = document.getElementsByClassName('deskripsi')[key];
            const iconEdit = document.getElementsByClassName('todo-edit')[key];
            const deleteBtn = document.getElementsByClassName('todo-delete')[key];

            deskripsi.addEventListener('mouseover', () => {
                iconEdit.classList.remove('hidden');
                deleteBtn.classList.remove('hidden');
            });
            deskripsi.addEventListener('mouseout', () => {
                iconEdit.classList.add('hidden');
                deleteBtn.classList.add('hidden');
            });

            deleteBtn.addEventListener('click', () => {
                const id = deleteBtn.getAttribute('data-getid');
                let bool = confirm('apakah yakin anda ingin menghapus dengan id: ' + id);
                if (bool) {
                    fetch('/todos/' + id, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data == 'data berhasil dihapus dengan ID: ' + id) location.reload();
                        }).catch(error => alert('terjadi erorr', error));
                }
            })

            iconEdit.addEventListener('click', (event) => {
                const getID = iconEdit.getAttribute('data-getid');
                fetch('/todos/' + getID + '/edit')
                    .then(response => response.text())
                    .then(data => {
                        formEditModal.innerHTML = data;
                        modal.show()
                    }).catch(error => console.error('error', error))
            })
            closeModalEdit.addEventListener('click', () => {
                formEditModal.innerHTML = "";
                modal.hide();
            });
        })
    })
</script>

@endsection
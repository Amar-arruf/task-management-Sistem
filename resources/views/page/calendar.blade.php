@extends('layout')

@section('title','calendar')
@section('content')
<div>
    <div class="flex justify-between mb-4">
        <h2 class="text-4xl font-semibold text-black-400">Calendar</h2>

        <div>
            <!-- Modal toggle -->
            <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex bg-orange-custom font-medium rounded-lg text-sm  px-5 py-2 ms-2">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Add Events
            </button>
        </div>
    </div>

    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        buat schedule
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="/schedules" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">title</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 " required="">
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">start</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"></path>
                                    </svg>
                                </div>
                                <input id="datepicker1" type="text" name="start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">end</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"></path>
                                    </svg>
                                </div>
                                <input id="datepicker2" type="text" name="end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="text-white flex ms-auto items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        tambah schedule
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-white p-2 rounded-lg" id='calendar'></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        var data_event = <?php echo json_encode($data_schedule); ?>;

        flatpickr("#datepicker1", {
            enableTime: true, // Aktifkan pilihan waktu
            time_24hr: true, // Gunakan format 24 jam

            // Tentukan zona waktu, contoh "Asia/Jakarta"
            timezone: "Asia/Jakarta",
            // Additional options if needed
            dateFormat: "Y-m-d H:i:i", // Adjust the date format as needed
            // More options can be found in the flatpickr documentation
        });

        flatpickr("#datepicker2", {
            enableTime: true, // Aktifkan pilihan waktu
            time_24hr: true, // Gunakan format 24 jam

            // Tentukan zona waktu, contoh "Asia/Jakarta"
            timezone: "Asia/Jakarta",
            // Additional options if needed
            dateFormat: "Y-m-d H:i:s", // Adjust the date format as needed
            // More options can be found in the flatpickr documentation
        });


        var calendarEl = document.getElementById('calendar');
        let popover; // inisiialisai popover
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                timeZone: 'local',
                start: 'title', // will normally be on the left. if RTL, will be on the right
                center: '',
                end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
            },
            initialView: 'dayGridMonth',

            businessHours: true, // display business hours
            editable: false,
            selectable: true,
            events: data_event,
            eventClick: function(info) {

                // check apakah ada node element popover sebelumnya
                const hasPopover = document.body.contains(popover);
                if (hasPopover) {
                    document.body.removeChild(popover);
                }

                let content = `
                    Event : ${info.event.title} <br /> 
                    Start: ${info.event.start} <br />
                    End: ${info.event.end} <br />
                `;
                // mendapatkan element posisi dari elemen tersebut
                let element = info.el.getBoundingClientRect();
                //  membuat element popover
                popover = document.createElement('div');
                popover.className = 'absolute p-2 bg-slate-400 rounded-md shadow-inner shadow-2xl text-sm text-white z-10';
                popover.innerHTML = content;

                // set posisi dari popover
                updatePopoverPosition();

                // tambahkan ke DOM 
                document.body.appendChild(popover);
                popover.style.display = 'block';

                // close popover 
                popover.addEventListener('click', function(event) {
                    if (popover.contains(event.target) && event.target === popover) {
                        document.body.removeChild(popover);
                    }
                });

                function updatePopoverPosition() {
                    var scrollY = window.scrollY || window.pageYOffset;
                    popover.style.left = element.left + 'px';
                    popover.style.top = element.bottom + scrollY + 'px';
                }
            }
        });
        calendar.render();
    })
</script>
@endsection
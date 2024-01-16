@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="flex gap-5 justify-between">
  <!-- project  -->
  <div class="md:flex md:flex-col w-full">
    @foreach ($tasks as $task)
    <div class="w-full h-[250px] p-3 bg-white rounded-lg mb-3">
      <a href="#">
        <div class="flex gap-5 items-center">
          <div>
            <h6 class="m-0 p-0 text-base font-bold tracking-tight text-black dark:text-white">{{$task->pemberi_tugas}}</h6>
            <span class="inline-block text-slate-400 text-xs">{{$task->pemberi_tugas}}</span>
          </div>
          <div class="ms-auto">
            <svg class="w-6 h-6 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
              <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
            </svg>
          </div>
        </div>
      </a>
      <div class="flex items-center justify-between mt-2 mb-2">
        <span class="py-1 px-2 bg-gray-200 text-[10px] font-bold uppercase rounded-lg text-slate-500">{{$task->status}}</span>
        <span class="py-1 px-2 bg-[#fecdd3] text-[#e11d48] uppercase font-bold rounded-lg border-2 border-[#fda4af] text-[10px]">high priority</span>
      </div>
      <span class=" block mb-0 font-bold text-[13px] text-slate-500 px-2 py-3">
        Task Done: {{
          collect($todos)->filter(function ($item) use ($task) {
                return ($item['id_todo'] == $task->id_todo) && ($item['completed'] == 'true');
            })->count()
        }} / {{
          collect($todos)->where('id_todo', $task->id_todo)->count()
        }}
      </span>
      <div class="w-full bg-gray-200 rounded-full h-1.5 mb-2 dark:bg-gray-700 ">
        @php
        $completedCount = collect($todos)->filter(function ($item) use ($task) {
        return ($item['id_todo'] == $task->id_todo) && ($item['completed'] == 'true');
        })->count();

        $totalCount = collect($todos)->where('id_todo', $task->id_todo)->count();

        $completionPercentage = ($totalCount > 0) ? ($completedCount / $totalCount) * 100 : 0;
        @endphp
        <div class="bg-blue-600 h-1.5 rounded-full dark:bg-blue-500" style="width: <?= $completedCount; ?>%"></div>
      </div>
      <div class="flex gap-3 items-center  my-3 ">
        <span class="py-1 px-2 bg-[#a7f3d0] text-[12px] font-bold  rounded-lg text-[#059669]">
          @php
          $selectedCategory = collect($kategori)->firstWhere('id_kategori', $task->id_kategori);
          echo $selectedCategory ? $selectedCategory->nama_kategori : 'null';
          @endphp
        </span>
      </div>
      <span class="py-1 px-2 bg-[#fecdd3] text-[#e11d48] uppercase font-bold rounded-lg border-2 border-[#fda4af] text-[10px]">due Date: {{\Carbon\Carbon::parse($task->date)->format('d M Y')}}</span>
    </div>
    @endforeach
  </div>
  <!-- Task -->
  <div class=" md:flex md:flex-col w-full">
    <!-- google -->
    <div class="w-full p-3 bg-white rounded-lg mb-3">
      <a href="#">
        <span class="inline-blocks ps-2 text-base font-bold">My Task</span>
      </a>
      <div class="mt-2">
        @foreach($todos as $todo)
        <div class="flex gap-8 items-center justify-between p-2 border-b-2 border-gray-200">
          <span class="inline-block font-bold text-xs text-slate-400">0 {{$loop->iteration}}</span>
          <span class="inline-block font-bold text-xs text-slate-400">{{$todo->deskripsi}}</span>
          <div class="ms-auto">
            <svg class="w-6 h-6 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <!-- task management -->
    <div class="w-full bg-white rounded-lg mb-3">
      <div class="mt-1">
        <h6 class="text-[13px] ps-2 py-2 font-bold mb-2">task management</h6>
        <div class="flex gap-8 items-center p-2 pe-2 bg-red-100 border-l-2 border-orange-custom">
          <svg class="w-3 h-3 text-orange-custom dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
          </svg>
          <span class="inline-block font-bold grow text-xs text-slate-500">create wirerame</span>
          <span class="inline-block ms-auto font-bold text-sm text-black-900">25m 02s</span>
          <div class="ms-auto">
            <svg class="w-4 h-4 text-orange-custom dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 12 16">
              <path d="M3 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm7 0H9a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
            </svg>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <h6 class="text-[13px] ps-2 py-2 font-bold mb-2">Slack</h6>
        <div class="flex gap-8 items-center justify-between p-2 mb-2 border-b-2 border-gray-200">
          <svg class="w-3 h-3 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <span class="inline-block font-bold grow text-xs text-slate-500">coding</span>
          <span class="inline-block font-bold ms-auto text-sm text-black-900">01h 30m 00s</span>
          <div class="ms-auto">
            <svg class="w-6 h-6 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v6m4-6v6m7-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
        </div>
        <div class="flex gap-8 items-center justify-between p-2 mb-2 border-b-2 border-gray-200">
          <svg class="w-3 h-3 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <span class="inline-block font-bold grow text-xs text-slate-500">fixing bug</span>
          <span class="inline-block font-bold ms-auto text-sm text-black-900">01h 30m 00s</span>
          <div class="ms-auto">
            <svg class="w-6 h-6 text-slate-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v6m4-6v6m7-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- calendar  -->
  <div class="md:flex md:flex-col w-full">
    <div class="w-full" id="color-calendar"></div>
    <div class="w-full rounded-lg p-3 bg-white mt-3">
      <h6 class="text-sm font-bold border-b-2 p-2 border-slate-400 mb-2">About</h6>
      <p class="text-justify text-[15px] text-slate-700">
        Task management sistem is a sistem organized your task with feature such as kanban board
      </p>
    </div>
  </div>
</div>

<script>
  // initelize calendar 
  new Calendar({
    id: '#color-calendar',
    // small or large
    calendarSize: 'small',
    theme: 'glass',
    headerColor: '#ED9D06',
    headerBackgroundColor: '#FFF',
    dropShadow: 'none',
    layoutModifiers: ['month-left-align']
  })
</script>

@endsection
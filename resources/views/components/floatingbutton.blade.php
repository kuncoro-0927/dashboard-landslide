<div id="floatingContainer" class="fixed bottom-5 left-5 right-5 flex flex-col items-start z-50 md:items-end">
    <div id="floatingMenu" class="hidden absolute text-center py-3 bottom-full mb-3 bg-black text-white rounded-2xl shadow-lg w-full md:max-w-xs md:ml-0 md:mr-0 md:right-0 flex flex-col overflow-hidden">
        <a href="#" class="px-4 py-2 hover:bg-gray-100">Dashboard</a>
        <a href="#" class="px-4 py-2 hover:bg-gray-100">Lorem Ipsum</a>
        <a href="#" class="px-4 py-2 hover:bg-gray-100">Lorem Ipsum</a>
        <a href="#" class="px-4 py-2 hover:bg-gray-100">Lorem Ipsum</a>
        <a href="#" class="px-4 py-2 hover:bg-gray-100">Logout</a>
    </div>

    <button
        id="floatingButton"
        {{ $attributes->merge([
            'class' => 'w-full md:max-w-xs md:ml-auto bg-black hover:bg-gray-800 text-white p-4 rounded-full shadow-lg flex items-center justify-center transition-colors'
        ]) }}
        title="{{ $title ?? 'Tombol Aksi' }}"
    >
        @if($icon ?? true)
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
           </svg>
        @endif
        <p>Menu</p>
        {{ $slot }}
    </button>
</div>

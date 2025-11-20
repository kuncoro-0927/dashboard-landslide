<!-- Sidebar -->
<aside class="w-64 h-screen fixed left-0 top-0 p-5  flex-col hidden lg:flex">
    <!-- Logo -->
    <div class="flex items-center justify-center gap-3 mb-6">
        <img
            src="/images/land.png"
            alt="Logo"
            class="w-16 h-auto object-contain"
        />
        <h1 class="text-md font-bold text-blue-950">Smart Landslide Alert</h1>
    </div>

    <!-- Menu -->
    <nav class="flex-1 flex flex-col space-y-3 text-gray-500 text-sm">
        <a href="/dashboard"
            class="flex items-center gap-2 px-4 py-2 rounded-lg font-normal {{ request()->is('dashboard') ? 'bg-black text-white' : 'hover:text-blue-600' }}">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
            <span>Dashboard</span>
        </a>

        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-black hover:text-white hover:[&>svg]:text-white font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12h3l2 7 4-14 2 7h5" />
            </svg>
            <span>Sensor Data</span>
        </a>

        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-black hover:text-white hover:[&>svg]:text-white font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 20l-6-3V4l6 3 6-3 6 3v13l-6-3-6 3z" />
                <circle cx="15" cy="10" r="2" />
            </svg>
            <span>Peta Monitoring</span>
        </a>

        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-black hover:text-white hover:[&>svg]:text-white font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6l4 2M12 3a9 9 0 110 18 9 9 0 010-18z" />
            </svg>
            <span>Riwayat</span>
        </a>

        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-black hover:text-white hover:[&>svg]:text-white font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="1" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM6 21v-1a5 5 0 0110 0v1" />
            </svg>
            <span>User</span>
        </a>

        <a href="/login" class="flex items-center mt-auto gap-2 px-4 py-2 rounded-lg hover:bg-black hover:text-white hover:[&>svg]:text-white font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
            </svg>
            <span>Logout</span>
        </a>
    </nav>
</aside>

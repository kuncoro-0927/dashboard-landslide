@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')

    <section class="lg:mx-10 p-5 md:p-14 2xl:mx-32 lg:my-10 rounded-2xl lg:p-0">
        <div
            class="flex justify-center mt-16 2xl:mt-0 2xl:min-h-screen 2xl:items-center md:mt-16 lg:justify-center md:justify-center md:gap-20 lg:gap-28 xl:gap-28 items-center">
            <div class="bg-white/90 backdrop-blur-sm shadow-lg rounded-2xl p-8 w-[90%] max-w-md mx-auto">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <img src="/images/land.png" alt="Logo" class="w-16 h-auto object-contain" />
                    <h1 class="text-md font-bold text-blue-950">Smart Landslide Alert</h1>
                </div>
                <h1 class="text-hitam text-center text-xl lg:text-2xl font-semibold">LOGIN</h1>
                <p class="text-center mt-3 text-xs md:text-sm text-gray-500">Masuk dengan akun anda</p>

                <div class="mt-10 space-y-5">
                    <form class="flex flex-col space-y-5">

                        <!-- Email -->
                        <div class="flex flex-col space-y-1">
                            <label class="text-sm font-medium">Email</label>
                            <input type="email" placeholder="Masukkan email anda"
                                class="py-2 px-4 text-sm border rounded-md" />
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col space-y-1 mt-2">
                            <label class="text-sm font-medium">Password</label>
                            <input type="password" placeholder="Masukkan kata sandi anda"
                                class="py-2 px-4 text-sm border rounded-md" />
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="#" class="hover:text-blue-500 text-sm">Lupa kata sandi?</a>
                        </div>

                        <a href="/dashboard"
                            class="p-2 bg-black mt-2 text-center hover:bg-hover text-white text-sm rounded-md">
                            Masuk
                        </a>
                    </form>
                    {{-- <div class="mt-5 flex items-center justify-between">
                        <div class="grow border-b border-gray-300"></div>
                        <div class="mx-4 text-xs">Atau</div>
                        <div class="grow border-b border-gray-300"></div>
                    </div>

                    <button class="bg-gray-200/40 bg-opacity-30 rounded-md p-2 mt-5 flex items-center justify-center gap-2">
                        <img class="w-[22px]" src="/images/google.svg" alt="Google" />
                        <p class="text-sm">Masuk dengan Google</p>
                    </button>

                    <div class="mt-5 text-xs md:text-sm flex justify-center gap-1">
                        Belum punya akun?
                        <a href="/register" class="font-semibold">Daftar</a>
                    </div> --}}
                </div>
            </div>

            <div class="relative hidden max-w-xl lg:block shadow-lg overflow-hidden rounded-[30px]">
                <div class="relative">
                    <img src="/images/bglogin.png" alt="Agrowisata" class="lg:h-[600px]  object-cover" />

                    <div
                        class="absolute inset-0 flex flex-col justify-end p-5 text-white bg-linear-to-t from-black/60 to-transparent">
                        <h2 class="text-2xl font-bold">Smart Landslide ALert</h2>
                        <p class="mt-2 text-sm">Smart Landslide Alert hadir sebagai solusi praktis untuk meningkatkan
                            kewaspadaan dan mengurangi risiko kerugian akibat bencana longsor melalui teknologi pemantauan
                            yang terintegrasi dan mudah diakses.</p>

                        <div class="mt-5 flex gap-3">
                            <span
                                class="flex items-center gap-2 bg-white text-black rounded-full px-4 py-2 text-xs font-semibold">Kelembapan</span>
                            <span
                                class="flex items-center gap-2 bg-white text-black rounded-full px-4 py-2 text-xs font-semibold">Getaran
                                Gempa</span>
                            <span
                                class="flex items-center gap-2 bg-white text-black rounded-full px-4 py-2 text-xs font-semibold">Curah
                                Hujan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

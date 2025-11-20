@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


    <section class="md:flex items-center justify-between gap-6 mb-6">

        <div>
            <h1 class="text-2xl font-semibold ">Selamat datang di "Smart Landslide Alert"</h1>
            <p class="text-sm text-gray-500">Sistem peringatan pemantau potensi tanah longsor secara real-time.</p>
        </div>

        <div id="sensor-status" class="flex justify-between mt-7 md:mt-0 items-center gap-3 md:gap-6 text-sm sensor-status">
            <div
                class="flex items-center  bg-white/40 backdrop-blur-lg px-3 md:px-4 py-2 rounded-sm shadow-sm gap-2 md:gap-5">
                <div class="flex flex-col">
                    <span class="text-[10px]">Sensor</span>
                    <span class="md:text-sm font-medium">Normal</span>
                </div>
                <div data-status="normal" class="w-6 h-6 bg-green-500 rounded-sm mt-auto"></div>
            </div>

            <div
                class="flex items-center bg-white/40 backdrop-blur-lg  px-3 md:px-4 py-2 rounded-sm shadow-sm gap-2 md:gap-5">
                <div class="flex flex-col">
                    <span class="text-[10px]">Sensor</span>
                    <span class="text-sm font-medium">Waspada</span>
                </div>
                <div data-status="waspada" class="w-6 h-6 bg-yellow-500 rounded-sm mt-auto"></div>
            </div>

            <div
                class="flex items-center bg-white/40 backdrop-blur-lg  px-3 md:px-4 py-2 rounded-sm shadow-sm gap-2 md:gap-5">
                <div class="flex flex-col">
                    <span class="text-[10px]">Sensor</span>
                    <span class="text-sm font-medium">Bahaya</span>
                </div>
                <div data-status="bahaya" class="w-6 h-6 bg-red-500 rounded-sm mt-auto"></div>
            </div>
        </div>

    </section>


    {{-- Grafik --}}
    <section class="lg:flex md:flex-col-reverse md:flex lg:flex-row items-start gap-4 ">
        <div class="bg-white/40 border border-white p-4 w-full lg:w-2/3 shadow rounded-xl mb-6">
            <div id="sensor-chart" class="w-full h-90 mb-4"></div>
        </div>

        <div
            class="lg:w-1/3 h-[410px] md:w-full md:h-[150px] lg:h-[410px]  flex flex-col md:flex-row lg:flex-col gap-3 justify-between text-sm">
            <div
                class="bg-white/40 backdrop-blur-lg border border-white p-4 w-full h-full shadow-sm rounded-xl flex flex-col justify-between">
                <div class="flex items-center gap-2  m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4.5 h-4.5 text-white bg-green-500 rounded-full p-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 2.69l-.72.72C8.1 6.7 6 10.03 6 13.5a6 6 0 0012 0c0-3.47-2.1-6.8-5.28-10.09L12 2.69z" />
                    </svg>

                    <h2 class="text-sm font-normal">Kelembapan</h2>

                </div>
                <p class="text-gray-500 text-xs  mb-2">Indikasi nilai kelembapan</p>


                <div class="flex items-end justify-between">
                    <div class="flex flex-col items-start ">


                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">60-65</h3>
                            <p class="w-2 h-2 m-0 bg-green-500 rounded-full inline-block mt-2"></p>
                        </div>


                        <p class="m-0 text-[10px]"> Normal</p>

                    </div>
                    <div class="flex flex-col items-start ">

                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">55-60</h3>
                            <p class="w-2 h-2 m-0 bg-yellow-500 rounded-full inline-block mt-2"></p>
                        </div>



                        <p class="m-0 text-[10px]"> Waspada</p>


                    </div>
                    <div class="flex flex-col items-start ">

                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">&lt;55</h3>

                            <p class="w-2 h-2 m-0 bg-red-500 rounded-full inline-block mt-2"></p>
                        </div>


                        <p class="m-0 text-[10px]"> Bahaya</p>



                    </div>
                </div>
            </div>

            <div
                class="bg-white/40 backdrop-blur-lg border border-white p-4 w-full h-full shadow-sm rounded-xl flex flex-col justify-between">
                <div class="flex items-center gap-2  m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4.5 h-4.5 text-white bg-yellow-500 rounded-full p-0.5">
                        <!-- Garis tanah / gelombang -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M2 20h20M2 16l2-4 2 4 2-8 2 8 2-4 2 4 2-6 2 6 2-2 2 2 2-4 2 4" />
                    </svg>

                    <h2 class="text-sm font-normal">Getaran</h2>

                </div>
                <p class="text-gray-500 text-xs  mb-2">Indikasi nilai getaran</p>


                <div class="flex items-end justify-between">
                    <div class="flex flex-col items-start ">


                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">0-10</h3>
                            <p class="w-2 h-2 m-0 bg-green-500 rounded-full inline-block mt-2"></p>
                        </div>


                        <p class="m-0 text-[10px]"> Normal</p>

                    </div>
                    <div class="flex flex-col items-start ">

                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">10-30</h3>
                            <p class="w-2 h-2 m-0 bg-yellow-500 rounded-full inline-block mt-2"></p>
                        </div>



                        <p class="m-0 text-[10px]"> Waspada</p>


                    </div>
                    <div class="flex flex-col items-start ">

                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">&gt;30</h3>
                            <p class="w-2 h-2 m-0 bg-red-500 rounded-full inline-block mt-2"></p>
                        </div>
                        <p class="m-0 text-[10px]"> Bahaya</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white/40 backdrop-blur-lg border border-white p-4 w-full h-full shadow-sm rounded-xl flex flex-col justify-between">
                <div class="flex items-center gap-2  m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4.5 h-4.5 text-white bg-red-500 rounded-full p-0.5">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 15a4 4 0 014-4h1a5 5 0 0110 0h1a3 3 0 010 6H7a4 4 0 01-4-4z" />

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 19v2M12 19v2M16 19v2" />
                    </svg>

                    <h2 class="text-sm font-normal">Curah Hujan</h2>

                </div>
                <p class="text-gray-500 text-xs  mb-2">Indikasi nilai curah hujan</p>


                <div class="flex items-end justify-between">
                    <div class="flex flex-col items-start ">


                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">0-5</h3>
                            <p class="w-2 h-2 m-0 bg-green-500 rounded-full inline-block mt-2"></p>
                        </div>


                        <p class="m-0 text-[10px]"> Normal</p>

                    </div>
                    <div class="flex flex-col items-start ">

                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">5-10</h3>
                            <p class="w-2 h-2 m-0 bg-yellow-500 rounded-full inline-block mt-2"></p>
                        </div>



                        <p class="m-0 text-[10px]"> Waspada</p>


                    </div>
                    <div class="flex flex-col items-start ">

                        <div class="flex items-start">
                            <h3 class="text-2xl font-semibold mr-0.5">&gt;10</h3>
                            <p class="w-2 h-2 m-0 bg-red-500 rounded-full inline-block mt-2"></p>
                        </div>
                        <p class="m-0 text-[10px]"> Bahaya</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- Map --}}
    <section class="flex flex-col-reverse md:flex-row md:flex md:items-start gap-4 md:mt-0">
        <div
            class="p-6 md:w-2/3 h-[340px] bg-white/40 backdrop-blur-lg border border-white shadow-sm rounded-xl flex flex-col">
            <h2 class="text-base font-medium m-0">Peta Pemantauan</h2>
            <p class="text-xs text-gray-500 mb-2">Pantau titik lokasi rawan longsor</p>

            <div id="map" class="w-full h-[255px] rounded-lg shadow-md mt-2"></div>
        </div>

        <!-- List Notifikasi -->
        <div
            class="bg-white/40 backdrop-blur-lg border border-white p-4 mt-7 md:mt-0 md:w-1/3 shadow rounded-xl mb-6 h-[340px] flex flex-col justify-between">
            <h2 class="text-base font-medium">Notifikasi Terbaru</h2>
            <p class="text-xs text-gray-500 mb-2">Peringatan! Terdeteksi peningkatan risiko longsor di wilayah pemantauan Anda.</p>

            <!-- Ul memanfaatkan sisa ruang -->
            <ul id="notifications-list" class="flex-1 overflow-y-auto space-y-2 text-sm  mt-2">


                <li class="py-2 rounded-lg hover:bg-gray-100  flex items-start gap-4 ">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mt-1 text-yellow-500 bg-yellow-100 p-1 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                    <div class="flex flex-col gap-1">
                        <span>Tegalombo dalam status Waspada</span>

                        <span class="text-xs text-gray-400">15 menit lalu</span>
                    </div>
                </li>


                <li class="py-2 rounded-lg hover:bg-gray-100  flex items-start gap-4 ">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mt-1 text-yellow-500 bg-yellow-100 p-1 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                    <div class="flex flex-col gap-1">
                        <span>Tegalombo dalam status Waspada</span>

                        <span class="text-xs text-gray-400">15 menit lalu</span>
                    </div>
                </li>


                <li class="py-2 rounded-lg hover:bg-gray-100  flex items-start gap-4 ">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mt-1 text-yellow-500 bg-yellow-100 p-1 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                    <div class="flex flex-col gap-1">
                        <span>Bandar dalam status Waspada</span>

                        <span class="text-xs text-gray-400">20 menit lalu</span>
                    </div>
                </li>
                <li class="py-2 rounded-lg hover:bg-gray-100  flex items-start gap-4 ">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5.5 mt-1 text-red-500 bg-red-100 p-1 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>

                    <div class="flex flex-col gap-1">
                        <span>Bandar dalam status Bahaya</span>

                        <span class="text-xs text-gray-400">20 menit lalu</span>
                    </div>
                </li>

            </ul>
        </div>
    </section>

@endsection

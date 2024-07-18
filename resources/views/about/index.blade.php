@extends('layouts.master')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('arsip.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="/about" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">About</a>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b border-gray-200 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold dark:text-white ms-4">About</h3>
                    </div>
                </div>
                <div id="defaultTabContent">
                    <div class="flex flex-col rounded-lg md:flex-row md:max-w-xl my-4 mx-auto">                        
                        <img class="object-cover w-full rounded-lg h-96 md:h-auto md:w-48" src="{{ asset('image/2231730144.jpg') }}" alt="">
                        <div class="flex-row mx-6 my-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <div class="w-96 mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                    Moh. Irfan Dwianto
                                </div>
                            </div>
                            <div>
                                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                                <div class="w-96 mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                    D3 Manajemen Informatika
                                </div>
                            </div>
                            <div>
                                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                                <div class="w-96 mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                    2231730144
                                </div>
                            </div>
                            <div>
                                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <div class="w-96 mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                    09 Juli 2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
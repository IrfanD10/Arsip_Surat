<!-- View untuk menampilkan detail arsip -->
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
                            <a href="{{ route('arsip.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Arsip Surat</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{ route('arsip.show', ['arsip'=>$arsip->id_arsip]) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $arsip->nomor_surat }}</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="w- bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b border-gray-200 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold dark:text-white ms-4">Detail Arsip</h3>
                        <div class="me-4 inline-flex">
                            <a href="{{ route('arsip.index') }}" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-3 py-2.5 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="w-[24px] h-[24px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                </svg>
                                <span class="flex-1 ms-1 whitespace-nowrap">Kembali</span>
                            </a>
                            <a href="{{ route('arsip.edit', ['arsip'=>$arsip->id_arsip]) }}" class="flex items-center focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 text-md  dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900 font-medium rounded-lg px-3 me-2 py-2.5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                                <span class="flex-1 ms-1">Edit</span>
                            </a>
                            <a href="{{ route('arsip.download', ['id'=>$arsip->id_arsip]) }}" class="flex items-center focus:outline-none text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg px-3 me-2 py-2.5 dark:focus:ring-gray-900">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                </svg>                                                        
                                <span class="flex-1 ms-1">Unduh</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="defaultTabContent">
                    <div class="flex-row">
                        <div class="mx-4 mt-4">
                            <p><strong>Nomor Surat  :</strong> {{ $arsip->nomor_surat }}</p>
                            <p><strong>Judul        :</strong> {{ $arsip->judul }}</p>
                            <p><strong>Kategori     :</strong> 
                                @if ($arsip->id_kategori != null)                            
                                    {{$arsip->kategori->nama_kategori}}
                                @endif
                            </p>
                            <p><strong>Waktu Dibuat        :</strong> {{ $arsip->created_at }}</p>
                        </div>
                        <div class="mx-4 my-7">
                            <iframe src="{{ asset('storage/'.$arsip->file_pdf) }}" type="application/pdf"  width="100%" height="800"></iframe>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection

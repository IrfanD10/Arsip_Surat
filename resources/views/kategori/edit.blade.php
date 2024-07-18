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
                        <a href="{{ route('kategori.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Kategori</a>
                        </div>
                    </li>                    
                    <li>
                        <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $kategori->nama_kategori }}</a>
                        </div>
                    </li>                    
                </ol>
            </nav>

            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b border-gray-200 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold dark:text-white ms-4">Tambah Kategori</h3>
                        <a href="{{ route('kategori.index') }}" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-[24px] h-[24px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                            </svg>                                                           
                            <span class="flex-1 ms-1 whitespace-nowrap">Kembali</span>
                        </a>
                    </div>
                </div>
                <div id="defaultTabContent">
                    <form action="{{ route('kategori.update', ['kategori'=>$kategori->id_kategori]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mx-10 my-5">
                            <div class="mb-4">
                                <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori<span class="text-red-600">*</span></label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Kategori" value="{{ old('nama_kategori',$kategori->nama_kategori) }}"  />
                                @error('nama_kategori')                                                                
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>                            
                            <div class="mb-4">
                                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan<span class="text-red-600">*</span></label>
                                <input type="text" name="keterangan" id="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Keteragan" value="{{ old('keterangan',$kategori->keterangan) }}" />
                                @error('keterangan')                                                                
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>                            
                        </div>
                        <div class="border-t border-gray-200 py-3 flex justify-end">
                            <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-4 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
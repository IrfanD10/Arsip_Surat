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
                        <a href="{{ route('arsip.edit', ['arsip', $arsip->id_arsip]) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $arsip->nomor_surat }}</a>
                        </div>
                    </li>                    
                </ol>
            </nav>

            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b border-gray-200 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold dark:text-white ms-4">Edit Arsip Surat</h3>
                        <a href="{{ route('arsip.index') }}" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-[24px] h-[24px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                            </svg>                                                           
                            <span class="flex-1 ms-1 whitespace-nowrap">Kembali</span>
                        </a>
                    </div>
                </div>
                <div id="defaultTabContent">
                    <form action="{{ route('arsip.update', ['arsip'=>$arsip->id_arsip]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mx-10 my-5">
                            <div class="mb-4">
                                <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Surat</label>
                                <input type="text" name="no_surat" id="no_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('no_surat', $arsip->nomor_surat)}}" placeholder="Masukkan Nomor Surat"/>
                                @error('no_surat')                                                                
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id_kategori }}" @if ($arsip->id_kategori != null)
                                            {{ old('kategori', $arsip->id_kategori) == $arsip->id_kategori ? 'selected' : null }}
                                            @else
                                            {{ old('kategori') == $arsip->id_kategori ? 'selected' : null }}
                                        @endif>{{ $data->nama_kategori }}</option>
                                    @endforeach                                    
                                </select>
                                @error('kategori')                                                                
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('judul', $arsip->judul)}}" placeholder="Masukkan Judul"/>
                                @error('judul')                                                                
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_surat">Upload file pdf</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_surat_help" name="file_surat" id="file_surat" type="file">
                                @error('file_surat')                                                                
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
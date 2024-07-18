<div class="relative overflow-x-auto shadow-sm sm:rounded-md">
    <table class="w-full text-sm text-left border rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-base text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    Nomor Surat
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Waktu Pengarsipan
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class="text-base">
            @foreach ($arsip as $data)                                                                            
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$data->nomor_surat}}
                    </th>
                    <td class="px-6 py-4">
                        {{$data->judul}}
                    </td>
                    <td class="px-6 py-4">
                        @if ($data->id_kategori != null)                            
                            {{$data->kategori->nama_kategori}}
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{$data->created_at}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="inline-flex">
                            <a href="{{ route('arsip.show', ['arsip'=>$data->id_arsip]) }}" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 me-2 my-1 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="1.7" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="1.7" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <span class="flex-1 ms-1">Lihat</span>
                            </a>
                            <a href="{{ route('arsip.edit', ['arsip'=>$data->id_arsip]) }}" class="flex items-center focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg px-3 me-2 my-1 py-1.5 dark:focus:ring-yellow-900">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                                <span class="flex-1 ms-1">Edit</span>
                            </a>
                            <a href="{{ route('arsip.download', ['id'=>$data->id_arsip]) }}" class="flex items-center focus:outline-none text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg px-3 me-2 my-1 py-1.5 dark:focus:ring-gray-900">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                </svg>                                                        
                                <span class="flex-1 ms-1">Unduh</span>
                            </a>                            
                            <button data-modal-target="delete_arsip_{{ $data->id_arsip }}" data-modal-toggle="delete_arsip_{{ $data->id_arsip }}" class="flex items-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-3 me-2 my-1 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                                <span class="flex-1 ms-1">Hapus</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @include('arsip_surat.delete')
            @endforeach                                    
        </tbody>
    </table>
</div>
<div class="py-4">
    {{ $arsip->links() }}
</div>

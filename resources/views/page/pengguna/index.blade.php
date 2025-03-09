<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PENGGUNA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA PENGGUNA</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            {{-- TABLE PENGGUNA --}}
                            <div class="w-full">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    NO
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    NAMA
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    EMAIL
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    PASSWORD
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    NOMER HANDPHONE
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    ACTION
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($pengguna as $key => $p)
                                                <tr
                                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $pengguna->perPage() * ($pengguna->currentPage() - 1) + $key + 1 }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $p->nama_pengguna }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $p->email_pengguna }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $p->pasword_pengguna }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $p->nomer_handphone }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <button
                                                            onclick="return penggunaDelete('{{ $p->id }}','{{ $p->pengguna }}')"
                                                            class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $pengguna->links() }}
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Paket Tour -->

    <script>
        const functionAdd = () => {
            document.getElementById('formPaketModal').setAttribute('action', "{{ route('pengguna.store') }}");
            document.getElementById('title_source').innerText = "Tambah Paket Tour";
            document.getElementById('nama_paket').value = "";
            document.getElementById('lokasi_tour').value = "";
            document.getElementById('harga_tour').value = "";
            document.getElementById('durasi_tour').value = "";
            document.getElementById('deskripsi_tour').value = "";
            document.getElementById('sourceModal').classList.remove('hidden');
        };

        const editPaketModal = (el) => {
            let id = el.getAttribute('data-id');
            let namaPaket = el.getAttribute('data-nama_paket');
            let lokasi = el.getAttribute('data-lokasi');
            let harga = el.getAttribute('data-harga');
            let durasi = el.getAttribute('data-durasi');
            let deskripsi = el.getAttribute('data-deskripsi');

            document.getElementById('formPaketModal').setAttribute('action', "{{ route('pengguna.update', '') }}/" +
                id);
            document.getElementById('title_source').innerText = "Edit Paket Tour";
            document.getElementById('nama_paket').value = namaPaket;
            document.getElementById('lokasi_tour').value = lokasi;
            document.getElementById('harga_tour').value = harga;
            document.getElementById('durasi_tour').value = durasi;
            document.getElementById('deskripsi_tour').value = deskripsi;
            document.getElementById('sourceModalEdit').classList.remove('hidden');
        };

        const paketDelete = (id, nama) => {
            if (confirm(`Yakin ingin menghapus paket tour ${nama}?`)) {
                document.getElementById('formDelete-' + id).submit();
            }
            return false;
        };

        const sourceModalClose = () => {
            document.getElementById('sourceModal').classList.add('hidden');
            document.getElementById('sourceModalEdit').classList.add('hidden');
        };
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PAKET TOUR') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA PAKET TOUR</div>
                    <div>
                        <a href="#" onclick="return functionAdd()"
                            class="bg-sky-600 p-2 hover:bg-sky-400 text-white rounded-xl">Add</a>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA PAKET
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        LOKASI
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        HARGA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DURASI
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
                                @foreach ($paket_tour as $p)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $p->nama_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->lokasi_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->harga_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->durasi_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-id="{{ $p->id_paket }}"
                                                data-modal-target="sourceModalEdit"
                                                data-nama_paket="{{ $p->nama_paket }}"
                                                data-lokasi="{{ $p->lokasi_tour }}"
                                                data-harga="{{ $p->harga_tour }}"
                                                data-durasi="{{ $p->durasi_tour }}"
                                                data-deskripsi="{{ $p->deskripsi_tour }}"
                                                onclick="editPaketModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button onclick="return paketDelete('{{ $p->id_paket }}', '{{ $p->nama_paket }}')"
                                                class="bg-red-500 hover:bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Paket Tour -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Add Paket Tour
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formPaketModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Paket</label>
                            <input type="text" id="nama_paket" name="nama_paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="lokasi_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Tour</label>
                            <input type="text" id="lokasi_tour" name="lokasi_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="harga_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Tour</label>
                            <input type="number" id="harga_tour" name="harga_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="durasi_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Tour</label>
                            <input type="text" id="durasi_tour" name="durasi_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Tour</label>
                            <textarea id="deskripsi_tour" name="deskripsi_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Paket Tour -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalEdit">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">Edit Paket Tour</h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formPaketModal">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Paket</label>
                            <input type="text" id="nama_paket" name="nama_paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="lokasi_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Tour</label>
                            <input type="text" id="lokasi_tour" name="lokasi_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="harga_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Tour</label>
                            <input type="number" id="harga_tour" name="harga_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="durasi_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Tour</label>
                            <input type="text" id="durasi_tour" name="durasi_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi_tour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Tour</label>
                            <textarea id="deskripsi_tour" name="deskripsi_tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const functionAdd = () => {
            document.getElementById('formPaketModal').setAttribute('action', "{{ route('paket_tour.store') }}");
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

            document.getElementById('formPaketModal').setAttribute('action', "{{ route('paket_tour.update', '') }}/" + id);
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
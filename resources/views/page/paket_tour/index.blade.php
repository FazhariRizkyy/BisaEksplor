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
                                        DESKRIPSI TOUR
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        LOKASI TOUR
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        HARGA TOUR
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DURASI TOUR
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($paket_tour as $k)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $k->nama_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $k->deskripsi_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $k->lokasi_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $k->harga_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $k->durasi_tour }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-id="{{ $k->id }}"
                                                data-modal-target="sourceModalEdit"
                                                data-nama_paket="{{ $k->nama_paket }}"
                                                data-deskripsi_tour="{{ $k->deskripsi_tour }}"
                                                data-lokasi_tour="{{ $k->lokasi_tour }}"
                                                data-harga_tour="{{ $k->harga_tour }}"
                                                data-durasi_tour="{{ $k->durasi_tour }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button
                                                onclick="return paket_tourDelete('{{ $k->id }}','{{ $k->nama_paket }}', '{{ $k->deskripsi_tour }}', '{{ $k->lokasi_tour }}', '{{ $k->harga_tour }}', '{{ $k->durasi_tour }}'  )"
                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA PAKET</label>
                            <input type="text" id="nama_paket" name="nama_paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI
                                TOUR</label>
                            <input type="text" id="deskripsi_tour" name="deskripsi_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="lokasi_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LOKASI TOUR</label>
                            <input type="text" id="lokasi_tour" name="lokasi_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="harga_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">HARGA
                                TOUR</label>
                            <input type="text" id="harga_tour" name="harga_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="durasi_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DURASI TOUR</label>
                            <input type="text" id="durasi_tour" name="durasi_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalEdit">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Paket Tour
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA PAKET</label>
                            <input type="text" id="nama_paket_edit" name="nama_paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI
                                TOUR</label>
                            <input type="text" id="deskripsi_tour_edit" name="deskripsi_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="lokasi_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LOKASI
                                TOUR</label>
                            <input type="text" id="lokasi_tour_edit" name="lokasi_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="harga_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">HARGA
                                TOUR</label>
                            <input type="text" id="harga_tour_edit" name="harga_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="durasi_tour"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DURASI
                                TOUR</label>
                            <input type="text" id="durasi_tour_edit" name="durasi_tour"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButtonEdit"
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
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            let url = "{{ route('paket_tour.store') }}";
            document.getElementById('title_source').innerText = "Tambah Paket Tour";
            formModal.setAttribute('action', url);

            // Display the modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Ensure CSRF token is added once
            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }
        }

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModalEdit');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const nama_paket = button.dataset.nama_paket;
            const deksripsi_tour = button.dataset.deskripsi_tour;
            const lokasi_tour = button.dataset.lokasi_tour;
            const harga_tour = button.dataset.harga_tour;
            const durasi_tour = button.dataset.durasi_tour;

            let url = "{{ route('paket_tour.update', ':id') }}".replace(':id', id);

            console.log(url);
            document.getElementById('title_source').innerText = `Update Paket TOUR ${nama_paket}`;

            document.getElementById('nama_paket_edit').value = nama_paket;
            document.getElementById('deskripsi_tour_edit').value = deskripsi_tour;
            document.getElementById('lokasi_tour_edit').value = lokasi_tour;
            document.getElementById('harga_tour_edit').value = harga_tour;
            document.getElementById('durasi_tour_edit').value = durasi_tour;

            let event = new Event('change');
            document.getElementById('nama_paket_edit').dispatchEvent(event);

            formModal.setAttribute('action', url);

            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }

            if (!formModal.querySelector('input[name="_method"]')) {
                let methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'PATCH');
                formModal.appendChild(methodInput);
            }

            document.getElementById(modalTarget).classList.remove('hidden');
        }

        const sourceModalClose = () => {
            document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
        }

        const paket_tourDelete = async (id, nama_paket) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Paket ${nama_paket} ?`);
            if (tanya) {
                await axios.post(`/nama_paket/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>
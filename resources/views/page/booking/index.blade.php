<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('BOOKING') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 items-center text-white dark:text-gray-100">
                    <div>DATA BOOKING</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD --}}
                    <div class="w-full bg-gray-500 p-4 rounded-xl">
                        <div class="mb-5">
                            INPUT DATA BOOKING
                        </div>
                        <form action="{{ route('booking.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="id_outlet"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Pengguna</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="id_outlet" data-placeholder="Pilih ID Outlet">
                                    <option value="">Pilih...</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="id_outlet"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Paket</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="id_outlet" data-placeholder="Pilih ID Outlet">
                                    <option value="">Pilih...</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Booking</label>
                                <input name="nama_paket" type="date" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama Paket disini..." required>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Orang</label>
                                <input name="harga" type="number" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Jumlah Orang disini..." required>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
                                <input name="harga" type="number" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Total Harga disini..." required>
                            </div>
                            <div class="mb-5">
                                <label for="status_pembayaran"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pembayaran</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="status_pembayaran" data-placeholder="Pilih Status Pembayaran">
                                    <option value="">Pilih...</option>
                                    <option value="dibayar">Dibayar</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">SIMPAN</button>
                        </form>
                    </div>
                    {{-- TABLE KONSINYASI PRODUK --}}
                    <div class="w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID BOOKING
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID PENGGUNA
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID PAKET
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL BOOKING
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JUMLAH ORANG
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TOTAL HARGA
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STATUS PEMBAYARAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            METODE PEMBAYARAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($booking as $key => $b)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $booking->perPage() * ($booking->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $b->id_pengguna }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $b->id_paket }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $b->tanggal_booking }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $b->jumlah_orang }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $b->total_harga }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $b->status_pemabayaran }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $b->metode_pembayaran }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $b->id }}"
                                                    data-modal-target="sourceModal"
                                                    data-id_pengguna="{{ $b->id_pengguna }}"
                                                    data-id_paket="{{ $b->id_paket}}"
                                                    data-tanggal_booking="{{ $b->tanggal_booking}}"
                                                    data-jumlah_orang="{{ $b->jumlah_orang }}" 
                                                    data-total_harga="{{ $b->total_harga}}" 
                                                    data-status_pemabayaran="{{ $b->status_pemabayaran }}" 
                                                    data-metode_pembayaran="{{ $b->metode_pembayaran }}" 
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return paketDelete('{{ $p->id }}','{{ $p->outlet->nama }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $booking }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 hidden items-center justify-center z-50 " id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="">
                            
                        </div>
                        <div class="">
                            <label for="jenis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="jenis_edit" id="jenis" data-placeholder="Pilih Jenis">
                                <option value="">Pilih...</option>
                                <option value="Baju">Baju</option>
                                <option value="Hoddie">Hoddie</option>
                                <option value="Sprei">Sprei</option>
                                <option value="Karpet">Karpet</option>
                                <option value="Selimut">Selimut</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="nama_paket" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Paket</label>
                            <input type="text" id="nama_paket" name="nama_paket" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Paket disini...">
                        </div>
                        <div class="">
                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                            <input type="text" id="harga" name="harga" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Paket disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const id_outlet = button.dataset.id_outlet;
        const jenis = button.dataset.jenis;
        const nama_paket = button.dataset.nama_paket;
        const harga = button.dataset.harga;

        let url = "{{ route('booking.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE BOOKING ${booking}`;

        // document.getElementById('id_outlet').value = id_outlet;
        let event = new Event('change');

        document.querySelector('[name="id_outlet_edit"]').value = id_outlet;
        document.querySelector('[name="id_outlet_edit"]').dispatchEvent(event);

        document.getElementById('nama_paket').value = nama_paket;

        document.querySelector('[name="jenis_edit"]').value = jenis;
        document.querySelector('[name="jenis_edit"]').dispatchEvent(event);

        document.getElementById('harga').value = harga;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const paketDelete = async (id, outlet) => {
        swal({
            title: "Konfirmasi",
            text: `Apakah anda yakin untuk menghapus PAKET ${outlet} ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(async (willDelete) => {
            if (willDelete) {
                try {
                    await axios.post(`/paket/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    });
                    swal("Message", "Paket berhasil dihapus!", "success", {
                        button: "oke",
                    }).then(() => {
                        location.reload();
                    });
                } catch (error) {
                    swal("Message", "Paket gagal dihapus!", "error", {
                        button: "oke",
                    });
                }
            }
        });
    }
</script>

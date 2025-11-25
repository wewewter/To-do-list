> Ray:
<div>
    <div>
        <div>
            {{-- Graduate Details --}}
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800">Graduate Details</h2>
                            <a href="{{ route('graduates.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back
                            </a>
                        </div>

                        <div class=" grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Graduate Info --}}
                            <div class="md:col-span-2 grid grid-cols-1 gap-6">
                                {{-- Personal Info --}}
                                <div class="bg-gray-50 p-6 rounded-lg shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Personal Information</h3>
                                    <dl class="grid grid-cols-1 gap-4">
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">Full Name</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->nama }}</dd>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">NIM</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->nim }}</dd>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">NIK</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->nik }}</dd>
                                        </div>
                                    </dl>
                                </div>

                                {{-- Academic Info --}}
                                <div class="bg-gray-50 p-6 rounded-lg shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Academic Information</h3>
                                    <dl class="grid grid-cols-1 gap-4">
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">Program</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->jenjang }}</dd>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">Study Program</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->prodi }}</dd>

                                            > Ray:
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">Graduation Date</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">
                                                {{ $graduate->tanggal_lulus ? $graduate->tanggal_lulus->format('d F Y') : '-' }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                                <!-- Informasi Akreditasi -->
                                <div class="bg-gray-50 p-6 rounded-lg shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Akreditas</h3>
                                    <dl class="grid grid-cols-1 gap-4">
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">Akreditasi Universitas</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->accreditation?->akreditasi_universitas }}</dd>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <dt class="text-sm font-medium text-gray-600">SK Universitas</dt>
                                            <dd class="text-sm text-gray-900 col-span-2">{{ $graduate->accreditation?->sk_universitas }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 p-4 border rounded">
                            @if (session()->has('message'))
                            <div class="bg-green-100 text-green-800 p-2 rounded mb-2">
                                {{ session('message') }}
                            </div>
                            @endif

                            <form wire:submit.prevent="uploadDokumen" class="space-y-4" enctype="multipart/form-data">
                                <select wire:model="selectedDocumentTypeId" class="form-select">
                                    <option value="">-- Pilih Jenis Dokumen --</option>
                                    @foreach($documentTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->nama }}</option>
                                    @endforeach
                                </select>

                                <input type="file" wire:model="uploadedFile" class="form-input">

                                <button type="submit" class="btn btn-primary">Upload</button>

                                @if (session()->has('message'))
                                <div class="text-green-600">{{ session('message') }}</div>
                                @endif
                                @if (session()->has('error'))
                                <div class="text-red-600">{{ session('error') }}</div>
                                @endif
                            </form>


                        </div>


                        {{-- Certificate Info --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Documents List --}}
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">Daftar Dokumen</h2>
                    <div class="space-y-6">

                        <form wire:submit.prevent="uploadIjazah">
                            <input type="file" wire:model="ijazahFile">

                            > Ray:
                            @error('ijazahFile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            <button type="submit" class="btn btn-primary mt-2">Upload Ijazah</button>
                        </form>
                        <button wire:click="checkFiles" class="btn btn-info">Cek Isi Folder Ijazah</button>

                        @if (session()->has('message'))
                        <div class="mt-2 alert alert-success">{{ session('message') }}</div>
                        @endif


                        @foreach($documents->sortBy(fn($doc) =>
                        match($doc->documentType->slug) {
                        'ijazah' => 1,
                        'transkrip' => 2,
                        'skpi' => 3,
                        default => 4,
                        }
                        ) as $document)
                        <div class="bg-white rounded-lg shadow border border-gray-200">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <!-- Kiri: Informasi Dokumen -->
                                <div class="p-6 border-b md:border-b-0 md:border-r border-gray-200">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            {{ ucfirst($document->documentType->name) }}
                                        </h3>
                                        <span class="px-3 py-1 text-xs font-medium rounded-full
                                                    {{ $document->signed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $document->signed ? 'Ditandatangani' : 'Belum Ditandatangani' }}
                                        </span>
                                    </div>

                                    <!-- Detail Dokumen -->
                                    <div class="space-y-4 text-sm text-gray-700">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            @switch($document->documentType->slug)
                                            @case('ijazah')
                                            <h3 class="text-lg font-semibold text-gray-900 mb-3 border-b pb-3">
                                                Ijazah</h3>
                                            <div class="space-y-2">
                                                <span>
                                                    <p class="font-bold text-gray-900">Status Ijazah</p>
                                                </span>
                                                <div class="ml-4">
                                                    <p class="mt-1">
                                                        <span class="font-semibold">Nomor Ijazah:</span>
                                                        <span
                                                            class="text-gray-800">{{ $graduate->nomor_ijazah ?? '-' }}</span>
                                                    </p>
                                                    <p class="mt-1">
                                                        <span class="font-semibold">Tanggal Terbit:</span>
                                                        <span class="text-gray-800">{{ $graduate->tanggal_terbit ? $graduate->tanggal_terbit->format('d F Y') : '-' }}

                                                            > Ray:
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            @break
                                            @case('transkrip')
                                            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                                Traskrip</h3>
                                            <div class="space-y-2">
                                                <p class="font-bold text-gray-900">Informasi Transkrip</p>
                                                <div class="ml-4">
                                                    <p class="mt-1">
                                                        <span class="font-semibold">No. Transkrip: </span>
                                                        <span
                                                            class="text-gray-800">{{ $document->no_transkrip ?? '-' }}</span>
                                                    </p>
                                                    <p class="mt-1">
                                                        <span class="font-semibold">IPK:</span>
                                                        <span
                                                            class="text-gray-800">{{ number_format($document->ipk ?? 0, 2) }}</span>
                                                    </p>
                                                    @if($document->judul)
                                                    <p class="mt-1">
                                                        <span
                                                            class="font-semibold">Judul Tugas Akhir:</span>
                                                        <span
                                                            class="text-gray-800">{{ $document->judul }}</span>
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                            @break

                                            @case('skpi')
                                            <h3 class="text-lg font-semibold text-gray-900 mb-4">SKPI</h3>
                                            <div class="space-y-2">
                                                <p class="font-bold text-gray-900">Informasi SKPI</p>
                                                <div class="ml-4">
                                                    <p class="mt-1">
                                                        <span class="font-semibold">Level KKNI:</span>
                                                        <span
                                                            class="text-gray-800">{{ $document->level_kkni ?? '-' }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            @break

                                            > Ray:
                                            @default
                                            <p class="text-gray-500 italic">Tidak ada informasi tambahan</p>
                                            @endswitch

                                        </div>

                                        <!-- Penandatangan -->
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="space-y-3">
                                                @forelse($document->graduate->signers()->where('document_type_id', $document->document_type_id)->get() as $signer)
                                                <div class="flex items-start justify-between p-3 bg-white rounded-lg border border-gray-200 hover:shadow-sm transition-shadow">
                                                    <!-- Info Penandatangan -->
                                                    <div class="flex items-start space-x-3">
                                                        <div class="text-indigo-500 mt-0.5">
                                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                        </div>
                                                        <div class="flex-1">
                                                            <p class="text-sm font-medium text-gray-900">{{ $signer->nama }}</p>
                                                            <p class="text-xs text-gray-500">{{ $signer->jabatan }}</p>
                                                            @if($signer->nuptk)
                                                            <p class="text-xs text-gray-400">NUPTK: {{ $signer->nuptk }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- Tombol Delete -->
                                                    <div class="flex items-center space-x-2">
                                                        <button
                                                            wire:click="deleteSigner('{{ $signer->id }}')"
                                                            onclick="return confirm('Yakin ingin menghapus penandatangan {{ $signer->nama }}?')"
                                                            class="inline-flex items-center p-1.5 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-md transition-colors duration-150"
                                                            title="Hapus Penandatangan">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                                                > Ray:
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="text-center py-8">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <p class="mt-2 text-sm text-gray-500">Belum ada penandatangan</p>
                                                    <p class="text-xs text-gray-400">Klik tombol "Tambah" untuk menambahkan penandatangan</p>
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                        <!-- Tambah Penandatangan Button -->
                                        <button
                                            wire:click="$dispatch('openModal', {
                                                        graduateId: '{{ $graduate->id }}',
                                                        documentTypeId: {{ $document->documentType->id }}
                                                    })"
                                            class="bg-blue-600 text-white px-4 py-2 rounded ">
                                            Tambah Penandatangan
                                        </button>

                                        <!-- Komponen modal -->
                                        <livewire:signer-modal />

                                        <!-- Notifikasi -->
                                        @if (session()->has('message'))
                                        <div
                                            x-data="{ show: true }"
                                            x-init="setTimeout(() => show = false, 3000)"
                                            x-show="show"
                                            x-transition
                                            class="fixed bottom-0 right-0 m-6">
                                            <div class="bg-green-500 text-white px-4 py-2 rounded shadow-lg shadow-green-700/50">
                                                {{ session('message') }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Kanan: Preview Dokumen -->
                                <div class="p-6">
                                    @if($document->file_path)

                                    > Ray:
                                    <embed
                                        src="{{ route('dokumen.preview', ['document' => $document->id]) }}"
                                        type="application/pdf"
                                        class="w-full h-[500px] rounded border border-gray-300" />
                                    @else
                                    <div
                                        class="flex items-center justify-center h-[500px] bg-gray-50 rounded border border-gray-200">
                                        <span class="text-gray-400 text-sm">Dokumen tidak tersedia</span>
                                    </div>
                                    @endif

                                    {{-- @if($document->file_path)--}}
                                    {{-- <div class="mt-4 text-right">--}}
                                    {{-- <a--}}
                                    {{-- href="{{ Storage::url($document->file_path) }}"--}}
                                    {{-- target="_blank"--}}
                                    {{-- class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"--}}
                                    {{-- >--}}
                                    {{-- <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"--}}
                                    {{-- viewBox="0 0 24 24">--}}
                                    {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
                                    {{-- stroke-width="2"--}}
                                    {{-- d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
                                    {{-- <path stroke-linecap="round" stroke-linejoin="round"--}}
                                    {{-- stroke-width="2"--}}
                                    {{-- d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>--}}
                                    {{-- </svg>--}}
                                    {{-- Lihat Dokumen Lengkap--}}
                                    {{-- </a>--}}
                                    {{-- </div>--}}
                                    {{-- @endif--}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
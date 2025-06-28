@extends('siswa.layouts.app')
@section('content-siswa')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <div class="flex justify-between">
                <h2 class="text-2xl mb-8 font-bold text-gray-500 dark:text-white">
                    Dashboard
                </h2>
                @include('siswa.layouts.alert')
            </div>
            <div class="flex flex-col md:flex-row bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm mb-4">
                {{-- Foto Siswa --}}
                <div class="flex-shrink-0">
                    @if (!$siswa->image)
                        <img src="/dist/img/avatar-kid.jpg" alt="Avatar"
                            class="object-cover h-48 w-full md:w-48 md:h-full" />
                    @else
                        <img src="{{ asset('storage/' . $siswa->image) }}" alt="Foto Siswa"
                            class="object-cover h-48 w-full md:w-48 md:h-full" />
                    @endif
                </div>
                <div class="p-4 flex flex-col justify-center items-center">
                    <h5 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Selamat datang, {{ $siswa->user->name }}!
                    </h5>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div class="text-gray-700 dark:text-gray-400 font-medium">NIS</div>
                        <div class="text-gray-700 dark:text-gray-400">: {{ $siswa->user->nis }}</div>

                        <div class="text-gray-700 dark:text-gray-400 font-medium">Kelas</div>
                        <div class="text-gray-700 dark:text-gray-400">: {{ $siswa->kelas }}</div>

                        <div class="text-gray-700 dark:text-gray-400 font-medium">Gender</div>
                        <div class="text-gray-700 dark:text-gray-400">: {{ $siswa->gender }}</div>

                        <div class="text-gray-700 dark:text-gray-400 font-medium">Tempat, Tanggal Lahir</div>
                        <div class="text-gray-700 dark:text-gray-400">:
                            {{ $siswa->tempat_lahir . ', ' . $siswa->tanggal_lahir }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

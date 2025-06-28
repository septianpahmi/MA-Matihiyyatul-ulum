@extends('siswa.layouts.app')
@section('content-siswa')
    <div class="p-4 sm:ml-64">
        <div class="p-4  border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <div class="flex justify-between">
                <h2 class="text-2xl mb-8 font-bold text-gray-500 dark:text-white">
                    Rekomendasi
                </h2>
                @include('siswa.layouts.alert')
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                @foreach ($rekomendasi as $item)
                    <div
                        class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $item->perkembangan->aspek }}</h5>
                        </a>
                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-700 dark:text-white">
                            {{ $item->perkembangan->nilai }}</h5>
                        <p class="mb-3 font-normal text-gray-500">{{ $item->catatan }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

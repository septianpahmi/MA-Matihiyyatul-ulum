@extends('siswa.layouts.app')
@section('content-siswa')
    <div class="p-4 sm:ml-64">
        <div class="p-4  border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <div class="flex justify-between">
                <h2 class="text-2xl mb-8 font-bold text-gray-500 dark:text-white">
                    Raport Siswa
                </h2>
                @include('siswa.layouts.alert')
            </div>
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div
                    class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi
                                {{ $rekomendasi->perkembangan->aspek }}</h5>
                        </a>
                        <p class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ Carbon\Carbon::parse($rekomendasi->perkembangan->created_at)->Format('F Y') }}</p>
                    </div>
                    <p class="font-semibold text-gray-500 dark:text-gray-400">
                        @if ($per->nilai == 'MB')
                            MB ( Mulai Berkembang )
                        @elseif ($per->nilai == 'BB')
                            BB ( Belum Berkembang )
                        @elseif ($per->nilai == 'BSH')
                            BSH ( Berkembang Sesuai Harapan )
                        @elseif ($per->nilai == 'BSB')
                            BSH ( Berkembang Sangat Baik )
                        @endif
                    </p>
                    <p class="mb-6 font-normal text-gray-500">
                        {{ $rekomendasi->catatan }}</p>

                    <form action="{{ route('siswa.perkembanganFeedback', $rekomendasi->id) }}" method="post"
                        class="flex  items-center">
                        @csrf
                        <input
                            class="flex-grow px-4 py-2 mr-2 w-full text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            rows="3" name="catatan" placeholder="Kirim Komentar ..." required>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

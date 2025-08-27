@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Laporan Penilaian</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laporan Penilaian</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            @foreach ($rekomendasi as $userId => $items)
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="text-center mt-4">
                                            DAFTAR PROGRAM KEGIATAN BELAJAR RA MATHIYYATUL ULUM
                                        </h4>
                                    </div>
                                </div>

                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            Nama Siswa<br>
                                            NOMOR INDUK<br>
                                            Kelas<br>
                                            Tahun Pelajaran<br>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <strong>{{ $items->first()->user->name }}</strong><br>
                                            <strong>{{ $items->first()->user->nis }}</strong><br>
                                            <strong>{{ $items->first()->perkembangan->siswa->kelas ?? '-' }}</strong><br>
                                            <strong>
                                                {{ optional($items->first()->perkembangan)->created_at
                                                    ? Carbon\Carbon::parse($items->first()->perkembangan->created_at)->format('Y')
                                                    : '-' }}
                                                -
                                                {{ optional($items->first()->perkembangan)->created_at
                                                    ? Carbon\Carbon::parse($items->first()->perkembangan->created_at)->addYear()->format('Y')
                                                    : '-' }}
                                            </strong>
                                        </address>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center items-center">
                                                    <th rowspan="2">No.</th>
                                                    <th rowspan="2">Program Pengembangan</th>
                                                    <th colspan="4">Penilaian Kegiatan Belajar</th>
                                                    <th rowspan="2">Catatan</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>BB</th>
                                                    <th>MB</th>
                                                    <th>BSH</th>
                                                    <th>BSB</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $data)
                                                    <tr class="text-center">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->perkembangan->aspek }}</td>
                                                        <td>
                                                            @if ($data->perkembangan->nilai == 'BB')
                                                                <i class="fas fa-check"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data->perkembangan->nilai == 'MB')
                                                                <i class="fas fa-check"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data->perkembangan->nilai == 'BSH')
                                                                <i class="fas fa-check"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data->perkembangan->nilai == 'BSB')
                                                                <i class="fas fa-check"></i>
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->catatan }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row no-print">
                                <div class="col-12">
                                    <a onclick="window.print()" rel="noopener" class="btn btn-default">
                                        <i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

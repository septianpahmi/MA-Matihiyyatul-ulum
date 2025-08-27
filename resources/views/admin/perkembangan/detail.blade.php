@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perkembangan Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Perkembangan Detail</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @foreach ($perkembangan as $bulan => $items)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Detail Perkembangan </h3>
                                    <h3 class="card-title float-right">Bulan: {{ $bulan }}</h3>
                                </div>
                                {{-- @include('admin.perkembangan.create') --}}
                                {{-- @include('admin.perkembangan.update') --}}
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Aspek</th>
                                                <th>Nilai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perkembangan as $periode => $items)
                                                @php $grouped = $items->groupBy('siswa.user.nis'); @endphp

                                                @foreach ($grouped as $nis => $rows)
                                                    <tr>
                                                        <td rowspan="{{ count($rows) }}">{{ $loop->iteration }}</td>
                                                        <td rowspan="{{ count($rows) }}">{{ $rows[0]->siswa->user->name }}
                                                        </td>
                                                        <td rowspan="{{ count($rows) }}">{{ $rows[0]->siswa->user->nis }}
                                                        </td>

                                                        {{-- aspek pertama --}}
                                                        <td>{{ $rows[0]->aspek }}</td>
                                                        <td>{{ $rows[0]->nilai }}</td>
                                                        <td>
                                                            <div class="btn-group-sm btn-group btn-block">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#rekomenPerkembangan{{ $rows[0]->id }}">Rekomendasi</button>
                                                                <button type="button" class="btn btn-warning"
                                                                    data-toggle="modal"
                                                                    data-target="#editPerkembangan{{ $rows[0]->id }}">Edit</button>
                                                            </div>
                                                            {{-- modal untuk aspek pertama --}}
                                                            @include('admin.perkembangan.rekomendasi', [
                                                                'item' => $rows[0],
                                                            ])
                                                            @include('admin.perkembangan.update', [
                                                                'item' => $rows[0],
                                                            ])
                                                        </td>
                                                    </tr>

                                                    {{-- aspek berikutnya --}}
                                                    @foreach ($rows->skip(1) as $row)
                                                        <tr>
                                                            <td>{{ $row->aspek }}</td>
                                                            <td>{{ $row->nilai }}</td>
                                                            <td>
                                                                <div class="btn-group-sm btn-group btn-block">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#rekomenPerkembangan{{ $row->id }}">Rekomendasi</button>
                                                                    <button type="button" class="btn btn-warning"
                                                                        data-toggle="modal"
                                                                        data-target="#editPerkembangan{{ $row->id }}">Edit</button>
                                                                </div>
                                                                {{-- modal untuk aspek berikutnya --}}
                                                                @include('admin.perkembangan.rekomendasi', [
                                                                    'item' => $row,
                                                                ])
                                                                @include('admin.perkembangan.update', [
                                                                    'item' => $row,
                                                                ])
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

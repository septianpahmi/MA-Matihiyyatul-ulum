@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rekomendasi Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Rekomendasi Detail</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Detail Rekomendasi</h3>
                            </div>
                            {{-- @include('admin.rekomendasi.update') --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama Siswa</th>
                                            <th>NIS</th>
                                            <th>Aspek</th>
                                            <th>Catatan</th>
                                            <th>Aspek Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekomendasi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->user->nis }}</td>
                                                <td>{{ $item->perkembangan->aspek }}</td>
                                                <td>{{ $item->catatan }}</td>
                                                <td>{{ Carbon\Carbon::parse($item->perkembangan->aspek_tanggal)->translatedFormat('F Y') }}
                                                </td>
                                                <td>
                                                    <div class="btn-group-sm btn-group btn-block">
                                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                                            data-target="#editRekomendasi{{ $item->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger delete"
                                                            url="{{ route('rekomendasi.delete', $item->id) }}"
                                                            data-id="{{ $item->id }}">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('admin.rekomendasi.update')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

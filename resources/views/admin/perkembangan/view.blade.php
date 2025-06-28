@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perkembangan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Perkembangan</li>
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
                                <h3 class="card-title">Tabel Perkembangan</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#addPerkembangan">Tambah</button>
                            </div>
                            @include('admin.perkembangan.create')
                            {{-- @include('admin.perkembangan.update') --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama Siswa</th>
                                            <th>NIS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perkembangan as $aspeks)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $aspeks->siswa->user->name }}</td>
                                                <td>{{ $aspeks->siswa->user->nis }}</td>
                                                <td>
                                                    <div class="btn-group-sm btn-group btn-block">
                                                        <a href="{{ route('perkembangan.detail', $aspeks->siswa_id) }}"
                                                            type="button" class="btn btn-primary">Detail</a>
                                                        <button type="button" class="btn btn-danger delete"
                                                            url="{{ route('perkembangan.delete', $aspeks->siswa_id) }}"
                                                            data-id="{{ $aspeks->siswa_id }}">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
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

@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kelola Siswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kelola Siswa</li>
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
                                <h3 class="card-title">Tabel data siswa</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#addSiswa">Tambah</button>
                            </div>
                            @include('admin.components.siswa-modal')
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama</th>
                                            <th>NIS</th>
                                            <th>Kelas</th>
                                            <th>TTL</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->user->nis }}</td>
                                                <td>{{ $item->kelas }}</td>
                                                <td>{{ $item->tempat_lahir }},
                                                    {{ Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat('DD MMMM YYYY') }}
                                                </td>
                                                <td>{{ $item->user->password_plain }}</td>
                                                <td>
                                                    <div class="btn-group-sm btn-group btn-block">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#editSiswa{{ $item->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger delete"
                                                            url="{{ route('siswa.delete', $item->id) }}"
                                                            data-id="{{ $item->id }}">Delete</button>
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

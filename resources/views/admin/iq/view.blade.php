@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Test IQ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Test IQ</li>
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
                                <h3 class="card-title">Data Tabel Test IQ</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#addIQ">Tambah</button>
                            </div>
                            @include('admin.iq.create')
                            @include('admin.iq.update')
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama Siswa</th>
                                            <th>NIS</th>
                                            <th>Kategori</th>
                                            <th>Catatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($iq as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->siswa->user->name }}</td>
                                                <td>{{ $item->siswa->user->nis }}</td>
                                                <td>{{ $item->aspek }}</td>
                                                <td>{{ $item->catatan }}</td>
                                                <td>
                                                    <div class="btn-group-sm btn-group btn-block">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#editIQ{{ $item->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger delete"
                                                            url="{{ route('testiq.delete', $item->id) }}"
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

@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Laporan Test IQ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laporan Test IQ</li>
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

                            <div class="row">
                                <div class="col-12 mt-4">
                                    <h4 class="text-center">DAFTAR PROGRAM TEST IQ RA MATHIYYATUL ULUM</h4>
                                </div>
                            </div>

                            <div class="row invoice-info">
                                <div class="col-sm-2 invoice-col">
                                    <address>
                                        Tahun Pelajaran<br>
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>
                                            : {{ $periode }}
                                        </strong>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Kelas</th>
                                                <th>Kategori</th>
                                                <th>Catatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($iq as $siswaId => $tests)
                                                @foreach ($tests as $item)
                                                    <tr class="text-center">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->siswa->user->name }}</td>
                                                        <td>{{ $item->siswa->user->nis }}</td>
                                                        <td>{{ $item->siswa->kelas }}</td>
                                                        <td>{{ $item->aspek }}</td>
                                                        <td>{{ $item->catatan }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a onclick="window.print()" rel="noopener" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

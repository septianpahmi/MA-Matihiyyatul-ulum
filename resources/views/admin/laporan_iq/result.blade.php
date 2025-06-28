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
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-center">DAFTAR PROGRAM TEST IQ RA MATHIYYATUL ULUM
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        Nama Siswa<br>
                                        NOMOR INDUK<br>
                                        Kelas<br>
                                        Tahun Pelajaran<br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>{{ optional($iq[0]->siswa->user)->name }}</strong><br>
                                        <strong>{{ optional($iq[0]->siswa->user)->nis }}</strong><br>
                                        <strong>{{ optional($iq[0]->siswa)->kelas }}</strong><br>
                                        <strong>
                                            {{ optional($iq[0])->created_at ? Carbon\Carbon::parse($iq[0]->created_at)->format('Y') : '-' }}
                                            -
                                            {{ optional($iq[0])->created_at ? Carbon\Carbon::parse($iq[0]->created_at)->addYear()->format('Y') : '-' }}
                                        </strong>
                                    </address>
                                </div>

                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center items-center">
                                                <th>No.</th>
                                                <th>Program Pengembangan</th>
                                                <th>Catatan</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($iq as $item)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->aspek }}</td>
                                                    <td>{{ $item->catatan }}</td>
                                                    <td>{{ $item->nilai }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th colspan="3">Rata - Rata</th>
                                                <th>{{ $nilaiRata }}</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th colspan="3">Total</th>
                                                <th>{{ $total }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

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

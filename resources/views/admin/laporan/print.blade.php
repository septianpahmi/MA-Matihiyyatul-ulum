<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center">DAFTAR PROGRAM KEGIATAN BELAJAR RA MATHIYYATUL ULUM
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
                                    <strong>{{ optional($rekomendasi[0]->user)->name }}</strong><br>
                                    <strong>{{ optional($rekomendasi[0]->user)->nis }}</strong><br>
                                    <strong>{{ optional($rekomendasi[0]->perkembangan->siswa)->kelas }}</strong><br>
                                    <strong>
                                        {{ optional($rekomendasi[0]->perkembangan)->created_at ? Carbon\Carbon::parse($rekomendasi[0]->perkembangan->created_at)->format('Y') : '-' }}
                                        -
                                        {{ optional($rekomendasi[0]->perkembangan)->created_at? Carbon\Carbon::parse($rekomendasi[0]->perkembangan->created_at)->addYear()->format('Y'): '-' }}
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
                                        @foreach ($rekomendasi as $item)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->perkembangan->aspek }}</td>
                                                <td>
                                                    @if ($item->perkembangan->nilai == 'BB')
                                                        <i class="fas fa-check"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->perkembangan->nilai == 'MB')
                                                        <i class="fas fa-check"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->perkembangan->nilai == 'BSH')
                                                        <i class="fas fa-check"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->perkembangan->nilai == 'BSB')
                                                        <i class="fas fa-check"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->catatan }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>

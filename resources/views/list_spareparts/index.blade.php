@extends('layouts.app')

@section('title', 'List Tools')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/> --}}
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master List Sparepart</h1>
            </div>
            <div class="section-body">
                <h5 class="pl-5"><span id="tanggalwaktu"></span></h5>
                <h6 class="pl-5"><span id="clock12"></span></h6>
                <h2 class="section-title">List Sparepart</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="col ">
                    <div class="card">
                        <div class="card-body p-0">
                            <a href="/listsparepart-import" class="btn btn-dark px-3 mt-3 mb-3"><i class="fa-solid fa-upload"></i> Import</a>
                            {{-- <a href="{{ route('historytools.export') }}" class="btn btn-success px-3 mt-3 mb-3">
                                <i class="fa-solid fa-download"></i>
                                Export
                            </a> --}}
                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="myTable2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Kode Sparepart</th>
                                            <th>Nama Sparepart</th>
                                            <th>Brand</th>
                                            <th>Specification</th>
                                            <th>Equipment Number</th>
                                            <th>Letak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listsparepart as $item )
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->sparepart_code}}</td>
                                            <td>{{$item->sparepart_name}}</td>
                                            <td>{{$item->brand}}</td>
                                            <td>{{$item->specification}}</td>
                                            <td>{{$item->equipment_number}}</td>
                                            <td>{{$item->location}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection

@push('scripts')
<script>
    var tw = new Date();
    if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
    else (a=tw.getTime());
    tw.setTime(a);
    var tahun= tw.getFullYear ();
    var hari= tw.getDay ();
    var bulan= tw.getMonth ();
    var tanggal= tw.getDate ();
    var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
    var bulanarray=new Array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Oct","Nov","Des");
    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
</script>   

<script type="text/javascript" charset="utf-8">
    const clock12 = document.getElementById('clock12')
    const clock24 = document.getElementById('clock24')

    // Concatenate a zero to the left of every single digit time frame
    function concatZero(timeFrame) {
    return timeFrame < 10 ? '0'.concat(timeFrame) : timeFrame
    }

    function realTime() {
    let date = new Date()
    let sec = date.getSeconds()
    let mon = date.getMinutes()
    let hr = date.getHours()
    let day = date.getDay()
    // 12 hour time
    // If the hour equals 0 or 12, the remainder equals 0, so output 12 instead. (0 || 12 = 12)
    clock12.textContent = `${concatZero((hr % 12) || 12)} : ${concatZero(mon)} : ${concatZero(sec)} ${hr >= 12 ? 'PM' : 'AM'}`
    // 24 hour time
    clock24.textContent = `${concatZero(day)}, ${concatZero(hr)} : ${concatZero(mon)} : ${concatZero(sec)}`
    }

    setInterval(realTime, 1000)
</script>

<script>
    $(document).ready( function () {
        $('#myTable2').DataTable();
    } );
    </script>
    {{-- table --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush

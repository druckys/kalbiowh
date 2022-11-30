@extends('layouts.app')

@section('title', 'History')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/> --}}

@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>History Peminjaman</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">History Peminjaman</h2>
                <p class="section-lead">This page non-editable</p>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-0">
                            <a href="/historytools-import" class="btn btn-dark px-3 mt-3 mb-3"><i class="fa-solid fa-upload"></i> Import</a>
                            <a href="{{ route('historytools.export') }}" class="btn btn-success px-3 mt-3 mb-3">
                                <i class="fa-solid fa-download"></i>
                                Export
                            </a>

                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            {{-- <th>Kode Tools</th> --}}
                                            <th class="col-3">Nama Peralatan</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Initial</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LogBooks as $item )
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            {{-- <td>{{$item->tool_code}}</td> --}}
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->borrow_date}}</td>
                                            <td>{{$item->return_date}}</td>
                                            <td>{{$item->initial_name}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>{{$item->status}}</td>
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
        $(document).ready( function () {
            $('#example').DataTable({
                "lengthMenu": [ [-1, 10, 25, 50], ["All", 10, 25, 50] ] 
        });
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

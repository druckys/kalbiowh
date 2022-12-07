@extends('layouts.app')

@section('title', 'Pengembalian')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/> --}}
    
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengembalian Alat</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Tabel Pengembalian</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-0">
                            {{-- <a href="/pengembalian/create" class="btn btn-primary btn-lg mt-3 mb-3" tabindex="4">
                                Add List
                            </a> --}}

                            <div class="table-responsive mt-3">
                                <table class="table-striped table"
                                    id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center ">No</th>
                                            {{-- <th class="col-1">Kode Tools</th> --}}
                                            <th class="col-3">Nama Peralatan</th>
                                            <th class="col-2">Tanggal Pengembalian</th>
                                            <th class="col-1">Initial</th>
                                            <th class="col-2">Deskripsi</th>
                                            <th class="col-1">Status</th>
                                            <th class="col-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LogBooks as $item )
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            {{-- <td>{{$item->tool_code}}</td> --}}
                                            <td>{{$item->nama}}</td>
                                            {{-- <td>{{$item->return_date}}</td> --}}
                                            <td>
                                                @if ($item->return_date == null)
                                                    <span class="badge badge-danger">warning</span>
                                                @else
                                                    {{$item->return_date}}
                                                @endif    
                                            </td>
                                            <td>{{$item->initial_name}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            {{-- <td>{{$item->status}}</td> --}}
                                            <td>
                                                @if ($item->status == 'Returned')
                                                    <span class="badge badge-primary">Returned</span>
                                                @else
                                                    <span class="badge badge-dark">Borrowed</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ url('pengembalian/' . $item->id)}}" class="need-validation" novalidate="">
                                                @csrf
                                                @method('put')

                                                @if ($item->return_date == null)
                                                    <a href="{{url('pengembalian/' . $item->id . '/edit' )}}" title="Edit"><button type="button" class="btn btn-icon icon-left btn-warning">
                                                        <i class="far fa-edit"></i>Edit</button></a>
    
                                                @else
                                                    @if (auth()->user()->username == "AAA" && $item->status == 'Borrowed')
                                                    <button class="btn btn-icon icon-left btn-primary" type="submit" name="status" value="Returned" >
                                                        <i class="fas fa-check"></i>Approve</button>
                                                    @endif
                                                    
                                                @endif
                                                </form>
                                            </td>
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
            $('#myTable').DataTable({
                "lengthMenu": [ [25, -1, 10, 50], [25, "All", 10, 50] ] ,
                "order" : [ 0, 'desc' ]
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

@extends('layouts.app')

@section('title', 'Material Keluar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/> --}}
    
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengambilan Material</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Pengambilan Material</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-0">
                            <a href="/materialout/create" class="btn btn-primary btn-lg mt-3 mb-3" tabindex="4">
                                <i class="fa-solid fa-user-plus"></i>
                               Add List
                            </a>

                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center ">No</th>
                                            <th class="col-2">Nama Material</th>
                                            <th class="col-1">Ukuran</th>
                                            <th class="col-1">Jumlah</th>
                                            <th class="col-1">Satuan</th>
                                            <th class="col-2">Tanggal</th>
                                            <th class="">Initial</th>
                                            <th class="">Status</th>
                                            <th class="col-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LogMaterials as $item )
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->nama_material}}</td>
                                            <td>{{$item->ukuran}}</td>
                                            <td>{{$item->jumlah}}</td>
                                            {{-- <td>{{$item->satuan}}</td> --}}
                                            <td>
                                                <span class="badge badge-dark">{{$item->satuan}}</span>
                                            </td>
                                            <td>{{$item->tanggal}}</td>
                                            <td>{{$item->initial}}</td>
                                            {{-- <td>{{$item->status}}</td> --}}
                                            <td>
                                                @if ($item->status == 'Approved')
                                                    <span class="badge badge-primary">Approved</span>
                                                @else
                                                    <span class="badge badge-light">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{url('materialout/' . $item->id . '/edit' )}}" title="Edit"><button type="button" class="btn btn-icon icon-left btn-warning">
                                                    <i class="far fa-edit"></i>Edit</button></a>
                                                @if (auth()->user()->username == "AAA")
                                                    <a class="btn btn-icon icon-left btn-danger delete-material" href="#" data-id="{{$item->id}}" data-date="{{ $item->tanggal }}" data-initial="{{ $item->initial }}" 
                                                        data-nama="{{ $item->nama_material }}"><i class="fa fa-trash"></i> Delete</a>
                                                @endif --}}

                                                <form method="POST" action="{{ url('materialout/' . $item->id)}}" class="need-validation" novalidate="">
                                                    @csrf
                                                    @method('put')
    
                                                    @if ($item->status == 'Pending')
                                                        <a href="{{url('materialout/' . $item->id . '/edit' )}}" title="Edit"><button type="button" class="btn btn-icon icon-left btn-warning">
                                                            <i class="far fa-edit"></i>Edit</button></a>
                                                        <button class="btn btn-icon icon-left btn-primary" type="submit" name="status" value="Approved" >
                                                            <i class="fas fa-check"></i>Approve</button>
        
                                                    @else
                                                        @if (auth()->user()->username == "AAA")
                                                            <a class="btn btn-icon icon-left btn-danger delete-material" href="#" data-id="{{$item->id}}" data-date="{{ $item->tanggal }}" data-initial="{{ $item->initial }}" 
                                                                data-nama="{{ $item->nama_material }}"><i class="fa fa-trash"></i> Delete</a>
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
        $('.delete-material').on('click', function (){
            var id = $(this).attr('data-id');
            var date = $(this).attr('data-date');
            var nama = $(this).attr('data-nama');
            var initial = $(this).attr('data-initial');
            Swal.fire({
                title: 'Are you sure?',
                text: "You will delete data of "+nama+" with initial name "+initial+" on "+date+"!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#d33#3085d6',
                confirmButtonText: 'Delete'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "delete/material/"+id+""
                
                // Swal.fire(
                // 'Deleted!',
                // 'Your data has been deleted.',
                // 'success'
                // )
            }
            })
        })
    </script>
    
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
    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js" integrity="sha256-mBCu5+bVfYzOqpYyK4jm30ZxAZRomuErKEFJFIyrwvM=" crossorigin="anonymous"></script>
@endpush

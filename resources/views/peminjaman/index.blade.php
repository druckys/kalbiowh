@extends('layouts.app')

@section('title', 'Peminjaman')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
    
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Peminjaman Alat</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Tabel Peminjaman</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-0">
                            <a href="/peminjaman/create" class="btn btn-primary btn-lg mt-3 mb-3" tabindex="4">
                                Add List
                            </a>

                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Peralatan</th>
                                            <th>Brand</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Initial</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LogBooks as $item )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->brand}}</td>
                                            <td>{{$item->borrow_date}}</td>
                                            <td>{{$item->initial_name}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>
                                                <a href="{{url('peminjaman/' . $item->id . '/edit' )}}" title="Edit"><button type="button" class="btn btn-icon icon-left btn-warning">
                                                    <i class="far fa-edit"></i>Edit</button></a>
                                                {{-- <form method="POST" action="{{ url('peminjaman/' . $item->id)}}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE')}}
                                                    {{ csrf_field() }}
                                                
                                                    <button type="submit" class="btn btn-icon icon-left btn-danger" title="Delete" onclick="return confirm('Confirm Delete?')"><i class="fas fa-times"></i>Delete</button>
                                                    <button class="btn btn-icon icon-left btn-danger"
                                                    data-confirm="Realy?|Do you want to continue?" type="submit" title="Delete"><i class="fas fa-times"></i>Delete</button></a>
                                                    
                                                </form> --}}
                                                <a class="btn btn-icon icon-left btn-danger delete" href="#" data-id="{{ $item->id }}" data-initial="{{ $item->initial_name }}" 
                                                    data-nama="{{ $item->nama }}">Delete</a>
                                                
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
        $('.delete').on('click', function (){
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            var initial = $(this).attr('data-initial');
            Swal.fire({
                title: 'Are you sure?',
                text: "You will delete data of "+nama+" with initial "+initial+"",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#d33#3085d6',
                confirmButtonText: 'Delete'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "delete/"+id+""
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
            $('#myTable').DataTable();
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

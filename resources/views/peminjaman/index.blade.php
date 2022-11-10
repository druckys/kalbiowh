@extends('layouts.app')

@section('title', 'Peminjaman')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Peminjaman Alat</h1>
            </div>
            <div class="section-body">
                <div class="col ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Peminjaman</h4>      
                        </div>
                        <div class="card-body">
                            <a href="/peminjaman/create" class="btn btn-primary btn-lg mb-3" tabindex="4">
                                Add List
                            </a>
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peralatan</th>
                                        <th>Brand</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Initial</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($LogBooks as $item )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->brand}}</td>
                                            <td>{{$item->borrow_date}}</td>
                                            <td>{{$item->initial_name}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>
                                                <a href="{{url('peminjaman/' . $item->id . '/edit' )}}" title="Edit"><button type="button" class="btn btn-warning">Edit</button></a>
                                                <form method="POST" action="{{ url('peminjaman/' . $item->id)}}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE')}}
                                                {{ csrf_field() }}
                                            
                                                {{-- <button type="submit" class="btn btn-danger btn" title="Delete" onclick="return confirm('Confirm Delete?')">Delete</button> --}}
                                                <button class="btn btn-danger"
                                                data-confirm="Realy?|Do you want to continue?" type="submit" title="Delete">Delete</button></a>
                                            </form>
                                            </td>
                                        </tr>
                                            
                                    @endforeach
                                    
                                    
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush

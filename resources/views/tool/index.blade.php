@extends('layouts.app')

@section('title', 'List Tools')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List tools</h1>
            </div>
            <div class="section-body">
                <div class="col ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Contoh Tabel</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped table-md table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peralatan</th>
                                        <th>Brand</th>
                                        <th>Jumlah</th>
                                        <th>Lemari</th>
                                    </tr>

                                    @foreach ($tools as $item )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->brand}}</td>
                                            <td>{{$item->jumlah}}</td>
                                            <td>{{$item->lemari}}</td>
                                        </tr>
                                            
                                    @endforeach
                                    
                                    
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link"
                                            href="#"
                                            tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link"
                                            href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

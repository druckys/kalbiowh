@extends('layouts.app')

@section('title', 'Edit Pengembalian')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Peminjam</h1>
            </div>
            <div class="section-body">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                            <a href="/pengembalian" class="btn btn-danger mb-5 pl-4 pr-4">Cancel</a>
                            <div class="card card-primary">
                              <div class="card-header">
                                <h4>Edit Pengembalian</h4></div>
                    
                                <div class="card-body">
                                    <form method="POST" action="/pengembalian/{{$LogBooks->id}}" class="needs-validation" novalidate="">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Nama Peralatan</label>
                                        <input type="text" class="form-control" name="nama" value="{{$LogBooks->nama}}" tabindex="1" disabled required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select type="text" class="form-control selectric" name="brand" value="{{$LogBooks->brand}}" tabindex="2" disabled required autofocus> 
                                            <option value="Tekiro" @if($LogBooks->brand == "Tekiro") selected @endif>Tekiro</option>
                                            <option value="Jakemy" @if($LogBooks->brand == "Jakemy") selected @endif>Jakemy</option>
                                            <option value="Other.." @if($LogBooks->brand == "Other..") selected @endif>Other..</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Pengembalian</label>
                                        <input type="text" name="return_date" value="{{$LogBooks->return_date}}" class="form-control datepicker" tabindex="3" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label>Initial Name</label>
                                        <input type="text" name="initial_name" value="{{$LogBooks->initial_name}}" class="form-control" maxlength="3" 
                                        style="text-transform:uppercase" tabindex="4" required  disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" value="{{$LogBooks->deskripsi}}" class="form-control" maxlength="50" tabindex="5" disabled>
                                    </div>
                        
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="6">
                                        Save
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    
@endpush

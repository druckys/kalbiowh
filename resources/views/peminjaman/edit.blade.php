@extends('layouts.app')

@section('title', 'Edit Peminjaman')

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
                            <a href="/peminjaman" class="btn btn-danger mb-5 pl-4 pr-4">Cancel</a>
                            <div class="card card-dark">
                              <div class="card-header">
                                <h4>Edit Data Peminjam</h4></div>
                    
                                <div class="card-body">
                                    <form method="POST" action="/peminjaman/{{$LogBooks->id}}" class="needs-validation" novalidate="">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Nama Peralatan</label>
                                        <input type="text" class="form-control" name="nama" value="{{$LogBooks->nama}}" tabindex="1" required autofocus>
                                        <div class="invalid-feedback" >
                                        Please fill in your tools name
                                        </div>
                                        @error('nama')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- masih ada bug disini  --}}

                                    {{-- <div class="form-group">
                                        <label>Nama Peralatan</label>
                                        <select name="nama" class="form-control"> 
                                            @foreach ($list_tools as $t )
                                            <option value="{{$t->tools_name}}">{{$t->tools_name}}</option>
                                        @endforeach
                                        </select>
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Tanggal Peminjaman</label>
                                        <input type="date" name="borrow_date" value="{{$LogBooks->borrow_date}}" class="form-control datepicker" tabindex="3" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label>Initial Name</label>
                                        <input type="text" name="initial_name" value="{{$LogBooks->initial_name}}" class="form-control" maxlength="3" 
                                        style="text-transform:uppercase" tabindex="4" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your initial name
                                        </div>
                                        @error('initial_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" value="{{$LogBooks->deskripsi}}" class="form-control" maxlength="50" tabindex="5">
                                    </div>
                        
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg btn-block " tabindex="6">
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

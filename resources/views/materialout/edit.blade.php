@extends('layouts.app')

@section('title', 'Edit Pengambilan Material')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Log Material</h1>
            </div>
            <div class="section-body">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                            <a href="/peminjaman" class="btn btn-danger mb-5 pl-4 pr-4">Cancel</a>
                            <div class="card card-primary">
                              <div class="card-header">
                                <h4>Edit Data</h4></div>
                    
                                <div class="card-body">
                                    <form method="POST" action="/materialout/{{$LogMaterial->id}}" class="needs-validation" novalidate="">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Nama Material</label>
                                        <input type="text" class="form-control" name="nama_material" value="{{$LogMaterial->nama_material}}" tabindex="1" required autofocus>
                                        <div class="invalid-feedback" >
                                        Please fill in your material name
                                        </div>
                                        @error('nama')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ukuran</label>
                                        <input type="text" class="form-control" name="ukuran" value="{{$LogMaterial->ukuran}}" tabindex="1" required autofocus>
                                        <div class="invalid-feedback" >
                                        Please fill in your size material
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" value="{{$LogMaterial->jumlah}}" tabindex="1" required autofocus>
                                        <div class="invalid-feedback" >
                                        Please fill in your quantity
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select type="text" class="form-control selectric" name="satuan" value="{{$LogMaterial->satuan}}" tabindex="2" required autofocus> 
                                            <option value="Tekiro" @if($LogBooks->brand == "Tekiro") selected @endif>Tekiro</option>
                                            <option value="Jakemy" @if($LogBooks->brand == "Jakemy") selected @endif>Jakemy</option>
                                            <option value="Other.." @if($LogBooks->brand == "Other..") selected @endif>Other..</option>
                                            <div class="invalid-feedback">
                                                Please fill in your brand select
                                            </div>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" value="{{$LogMaterial->tanggal}}" class="form-control datepicker" tabindex="3" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label>Initial Name</label>
                                        <input type="text" name="initial" value="{{$LogMaterial->initial}}" class="form-control" maxlength="3" 
                                        style="text-transform:uppercase" tabindex="4" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your initial name
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block " tabindex="6">
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

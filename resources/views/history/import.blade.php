@extends('layouts.app')

@section('title', 'Import History')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Import History</h1>
            </div>

            <div class="section-body">
                 <h2 class="section-title">Import History</h2>
                 <p class="ml-3">How to import table from Excel : </p>
                    <ul>
                        <li> Format file (.xlsx)</li>
                        <li> Pastikan Header Column sesuai berikut :</li>
                        <ul>
                            <li>ID | Nama Peralatan | Brand | Tanggal Peminjaman | Tanggal Pengembalian | Initial | Deskripsi</li>
                        </ul>
                     </ul>
                     
                        <div class="card">
                            <div>
                                <div class="card-body"> 
                                    <form action="{{ route('history.upload') }}" method="POST" enctype="multipart/form-data" style="display:inline">
                                        @csrf
                                        <input type="file" name="file" class="form-control">
                                        <br>
                                        <button class="btn btn-success px-3 mt-3 mb-3"><i class="fa-solid fa-file-import"></i> Import Data</button>
                                    </form>

                                    <a href="/history" class="btn btn-secondary px-3 mt-3 mb-3">Cancel</a>
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

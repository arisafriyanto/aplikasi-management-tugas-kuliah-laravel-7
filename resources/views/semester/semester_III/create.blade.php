@extends('layouts.app')

@section('content')
    
<section class="section">
    <div class="section-header">
      <h1>Tambah Mata Kuliah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_III') }}">Semester III</a></div>
        <div class="breadcrumb-item">Tambah</div>
      </div>
    </div>

    <div class="section-body">                
        <div class="card">
            <form method="POST" action="{{ route('semester_III.store') }}" novalidate>
                @csrf
                
                <div class="card-header">
                    <h4 class="text-info"><i class="fas fa-plus"></i> Tambah Mata Kuliah</h4>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Mata Kuliah</label>

                            <input type="text" class="form-control @error('mata_kuliah') is-invalid @enderror" name="mata_kuliah" value="{{ old('mata_kuliah') }}" required="" autofocus>
                            
                            @error('mata_kuliah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Semester</label>

                            <input type="text" class="form-control" name="semester" value="Semester III" readonly>
                                
                        </div>

                        <div class="form-group mb-0  col-12 col-md-12 col-lg-12"">
                            <label>Keterangan</label>

                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" required=""></textarea>

                            @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <a href="/semester_III" class="btn btn-warning"><i class="fas fa-backward"></i> Back</a>
                    <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('content')
    
<section class="section">
    <div class="section-header">
      <h1>Answer Tugas {{ $mata_kuliah->mata_kuliah }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_VIII') }}">Semester VIII</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_VIII.tugas') }}">Tugas</a></div>
        <div class="breadcrumb-item">Answer</div>
      </div>
    </div>

@include('alert')

    <div class="section-body">                
        <div class="card">

            <div class="card-stats">
                <div class="card-stats-title">
                    <h4>{{ $tugas->tugas }}</h4>
                </div>
                    <div class="container">
                    <p class="ml-2">
                        <a href="{{ route('semester_VIII.tugas.mata_kuliah', $mata_kuliah->id) }}" class="text-dark">
                            {{ $mata_kuliah->mata_kuliah }}
                        </a> &middot;
                        {{ $tugas->created_at->format('d M Y') }}  
                    </p>
                        @if($tugas->file_answer)
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="{{ asset("/laraview/#../storage/$tugas->file_answer") }}" allowfullscreen></iframe>
                            </div>

                            <div class="d-flex justify-content-center mt-1">
                                <a href="/semester_VIII/tugas/{{$mata_kuliah->id}}/download_answer/{{$tugas->id}}" class="btn btn-success btn-sm">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        @else
                            <div class="ml-2">
                                Tidak Ada File Jawaban!
                            </div>
                        @endif

                </div>
            </div>
            

            <form method="POST" 
            action="/semester_VIII/tugas/{{$mata_kuliah->id}}/answer_tugas/{{$tugas->id}}" novalidate enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Upload Answer</label>

                            <input type="file" class="form-control @error('file_answer') is-invalid @enderror" name="file_answer" value="{{ old('file_answer') }}">

                            @error('file_answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <a href="/semester_VIII/tugas/{{ $mata_kuliah->id }}/show/{{ $tugas->id }}" class="btn btn-warning"><i class="fas fa-backward"></i> Back</a>
                    <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('content')

@section('title')
<title>Proyekt</title>
@endsection
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Proyekt-i redaktə et</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('project.update',[$project_edit->slug]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img width="985" height="350" class="mb-3" src="{{ url($project_edit->image) }}">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Başlıq</label>
                    <input type="text" name="title" value="{{ $project_edit->title }}" class="form-control" id="basic-default-fullname"
                        placeholder="Başlıq" required/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Açıqlama</label>
                    <textarea name="description" id="text" class="form-control" rows="10"
                        placeholder="Açıqlama" required>{{ $project_edit->description }}</textarea>
                </div>
                <div class="input-group">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Yüklə</label>
                    @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Yenilə</button>
                    <a href="{{ route('project.index') }}" class="btn btn-label-secondary">Ləğv et</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

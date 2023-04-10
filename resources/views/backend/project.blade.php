@extends('layouts.app')

@section('content')
@section('title')
    <title>Proyekt</title>
@endsection
<div class="table-responsive">    
    <h1>Proyekt cədvəli</h1>
    @role('publisher')
        <a href="{{ route('project.create') }}" class="btn btn-primary mb-3">Əlavə et</a>
    @endrole
    <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Şəkil</th>
                <th>Başlıq</th>
                <th>Açıqlama</th>
                <th>Tarix</th>
                @role('editor|destroyer')
                    <th>Əməliyyatlar</th>
                @endrole
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $i=>$project)
            <tr>
                <td>{{ $i+=1}}</td>
                <td><img style="width: 60px; height:60px;" src="{{ url($project->image) }}"></td>
                <td>{{ $project->title }}</td>
                <td>{{ mb_substr($project->description,0,55)."..." }}</td>
                <td>{{ $project->created_at }}</td>
                @role('editor')
                    <td>
                        <div class="btn-group">
                            <form action="{{ route('project.destroy',[$project->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('project.edit',[$project->id],'edit') }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                @role('destroyer')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                @endrole
                            </form>
                        </div>
                    </td>
                @endrole
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
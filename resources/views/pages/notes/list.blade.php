@extends('master')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h4>List of Notes</h4>
            <h5><a class="btn-sm btn-success" href="{{ route('note.add') }}">Add Note</a></h5>
            @if($notes->isEmpty())
            <div class="alert alert-info" role="alert">
                No notes found. Start by adding your first note!
            </div>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Last Modified</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $key => $note)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->content }}</td>
                        <td>{{ $note->created_at }}</td>
                        <td>{{ $note->updated_at }}</td>
                        <td>
                            <a class="btn-sm btn-warning" href="{{ route('note.edit', $note->id) }}">Edit</a>
                            <a class="btn-sm btn-danger" href="{{ route('note.delete', $note->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$notes->links()}}
            @endif
        </div>
    </div>
</div>

@endsection

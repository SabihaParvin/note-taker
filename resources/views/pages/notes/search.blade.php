@extends('master')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Search Results for '{{ request()->search }}'
                </div>

                <div class="card-body">
                    @if($notes->count() > 0)
                        <ul class="list-group">
                            @foreach ($notes as $key => $note)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $note->title }}</h5>
                                        <small>{{ $note->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <p class="mb-0">{{ $note->content }}</p>
                                    <div class="mt-2">
                                        <a href="{{ route('note.edit', $note->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('note.delete', $note->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No notes found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.template')

@section('content')
<h2 class="mb-4">Popular Movie</h2>

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($movies as $movie)
        <div class="col">
    <div class="card h-100 d-flex flex-row">
        <img src="{{ $movie->cover_image }}" class="img-fluid" alt="{{ $movie->title }}" style="max-width: 180px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $movie->title }}</h5>
            <p class="card-text">{{ Str::limit($movie->synopsis, 150) }}</p>
            <p class="mb-2">Year: {{ $movie->year }}</p>
            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-success btn-sm">Read More</a>
            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </div>
</div>

    @endforeach
</div>

<div class="d-flex justify-content-end mt-4">
    {{ $movies->links() }}
</div>
@endsection
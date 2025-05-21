@extends('layouts.template')

@section('content')
<h2 class="mb-4">Popular Movie</h2>

<div class="row">
    @foreach ($movies as $movie)
        <div class="col-lg-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset($movie->cover_image) }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->synopsis, 150) }}</p>
                            <p class="mb-2">Year: {{ $movie->year }}</p>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-success btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-end mt-4">
    {{ $movies->links() }}
</div>
@endsection

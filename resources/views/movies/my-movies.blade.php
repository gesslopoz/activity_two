@extends('base')
@section('content')

    <div class="float-end m-2">
        <a href="{{ url('/movie/create') }}" class="btn btn-primary">Create New Movie</a>
    </div>

    <h1>My Movie</h1>
    <hr>
    <div class="d-flex justify-content-between flex-wrap">

        @foreach ($myMovies as $movie)
            <div class="card align-self-stretch m-1" style="width: 31%">
                <div class="card-body">
                    <div class="card-title">
                        <h4>{{ $movie->title }}</h4>
                        <p>{{ $movie->description }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/movies/edit/' . $movie->id) }}" class="btn btn-info btn-sm">Edit</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection

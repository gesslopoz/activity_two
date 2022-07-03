@extends('base')
@section('content')

<h1>Recent Movie</h1>
<hr>
<div class="d-flex justify-content-between flex-wrap">

    @foreach ($recentMovie as $movie)
        <div class="card align-self-stretch m-1" style="width: 31%">
            <div class="card-body">
                <div class="card-title">
                    <h4>{{ $movie->title }}</h4>
                    <p>{{ $movie->description }}</p>
                </div>
            </div>
            <div class="card-footer">
                @if($movie->isEditable())
                    <a href="{{ url('/movies/edit/' . $movie->id) }}" class="btn btn-info btn-sm">Edit</a>
                @endif
            </div>
        </div>
    @endforeach

</div>
@endsection

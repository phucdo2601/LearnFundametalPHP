@extends('layouts.app')

@section('content')
    <h1>
        This is food update page
    </h1>

    <form action="/foods/{{$food->id}}" method="post">
        @csrf
        {{-- the key is generated at every session start --}}
        {{-- only apply to non-read routes --}}
        {{-- If some hacker access to this site from hist/her site --}}

        @method('PUT');
        <div class="mb-3">
            <label for="name" class="form-label">Food Name:</label>

            <input type="text" class="form-control" id="name" name="name" value="{{$food->name}}">

        </div>

        <div class="mb-3">
            <label for="count" class="form-label">Count:</label>
            <input type="number" class="form-control" id="count" name="count" value="{{$food->count}}">

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$food->description}}">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

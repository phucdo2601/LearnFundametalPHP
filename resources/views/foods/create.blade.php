@extends('layouts.app')

@section('content')
    <h1>
        This is food create page
    </h1>

    <form action="/foods" method="post" enctype="multipart/form-data">
        @csrf
        {{-- the key is generated at every session start --}}
        {{-- only apply to non-read routes --}}
        {{-- If some hacker access to this site from hist/her site --}}
        <input class="form-control" 
          type="file" name="image" 
        >
        <div class="mb-3">
            <label for="name" class="form-label">Food Name:</label>

            <input type="text" class="form-control" id="name" name="name">

        </div>

        <div class="mb-3">
            <label for="count" class="form-label">Count:</label>
            <input type="number" class="form-control" id="count" name="count">

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description">

        </div>

        <div mb-3>
            <label>Choose a categories:</label>
            <select name="category_id">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                  {{ $category->name }}
                </option>    
              @endforeach                                
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
          <p class="text-danger">
            {{ $error }}
          </p>
        @endforeach
      </div>
        
    @endif
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>
        This is page of PostController! with shared header, footer
    </h1>

    <table>
    
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listPost as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->body}}</td>
    
                  </tr>
                @endforeach
             
              
            </tbody>
          </table>
    
@endsection

@extends('layouts.app')

@section('content')
    <h1>
        This is Food page 

        <a href="/foods/create" class="btn btn-primary">Add New Food</a>
    </h1>


    <table>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Food Name</th>
                    <th scope="col">Count</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listFoods as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->description }}</td>
                        <td>

                            <a href="foods/{{$item->id}}/edit" class="btn btn-warning">
                                Edit
                            </a>

                            <a href="foods/{{$item->id}}" class="btn btn-primary">
                                View
                            </a>

                            <form action="foods/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            {{-- <a href="foods/{{$item->id}}" class="btn btn-danger">
                                Delete
                            </a> --}}
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    @endsection

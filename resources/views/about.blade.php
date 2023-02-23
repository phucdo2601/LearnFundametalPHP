@extends('layouts.app')

@section('content')
    <h1>This is about page of pageController, with shared Header, Footer!</h1>

    {{-- some basic commands in blade - supportting impl code PHP in page 
         unless == if not
        
        
        --}}
    {{-- {{ $x = 11 }}
    @if ($x < 2)
        <h1>x is less than 2</h1>
    @elseif($x > 2 && $x < 9)
        <h3>x is into range 2 -9</h3>
    @else
        <h3>x is larger than 9</h3>
    @endif --}}

    {{-- @unless(empty($name))
        <h3>Name is nor empty</h3>
        <h3>{{$name}}</h3>
    @endunless --}}

    {{-- @if (!empty($name))
        <h3>Name is nor empty</h3>
        <h3>{{ $name }}</h3>
    @endif --}}

    {{-- @empty(!$name)
    <h3>Name is not empty</h3>
        
    @endempty --}}

    {{-- @empty($age)
        <h3>Age is empty</h3>
    @endempty --}}

    {{-- @isset($name)
        <h3>Name isset!</h3>
    @endisset --}}

    {{-- @switch($name)
        @case('Phuc')
            <h3>This mr Phuc</h3>
        @break

        @case('Quang')
            <h3>This mr Quang</h3>
        @break

        @default
            <h3>No one selected</h3>
    @endswitch --}}

    {{-- @for ($i = 0; $i < 20; $i++)
        <h2>i = {{$i}} </h2>
    @endfor --}}

    {{-- @foreach ($listName as $item)
        <h3>{{$item}}</h3>
    @endforeach --}}

    {{-- @forelse ($listName as $item)
        <h3>Each name: {{$item}}</h3>
    @empty
        <h3>The array is empty</h3>
    @endforelse --}}

    {{-- {{
            $i =0
        }}

        @while ($i < 10)
            <h3>i = {{$i}} </h3>
            {{ $i++ }}
        @endwhile --}}
@endsection

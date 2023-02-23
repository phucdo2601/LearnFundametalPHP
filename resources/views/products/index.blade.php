<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Index function of ProductsController</h1>
    {{-- <h2>Title: {{ $title }}</h2>
    <h2>x: {{ $x }}</h2>
    <h2>y: {{ $y }}</h2> --}}
    {{-- <h2>Name: {{ $name }}</h2> --}}

    {{-- @foreach ($myPhone as $item)
        <h3>{{$item}}</h3>
    @endforeach --}}

    {{-- @foreach ($product as $item)
    <h3>{{$item}}</h3>
@endforeach --}}

{{-- <h3>{{$product}}</h3> --}}

<a href="{{ route('products') }}">Link To Products</a>
</body>
</html>
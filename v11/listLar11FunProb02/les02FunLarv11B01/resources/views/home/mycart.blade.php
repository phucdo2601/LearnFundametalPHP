<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px

        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }

        td {
            border: 1px solid black;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }
        </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
   
  </div>
  <!-- end hero area -->



<div class="div_deg">
    <table class="">
        <tr>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product Image</th>
        </tr>

        <?php
            $value = 0;
        ?>

        @foreach ($list_user_cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="150" height="100" src="{{ asset('products') }}/{{$cart->product->image}}" alt="">
            </td>
        </tr>

        <?php
            $value = $value + $cart->product->price;
        ?>
        @endforeach
        
    </table>
</div>

<div class="cart_value">
    <h3>Total value of Cart is: {{$value}}</h3>
</div>

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">
        .div_center {
            display: center;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .detail-box {
            padding: 15px;

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

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

        <div class="col-md-10">
          <div class="box">
            <a href="">
              <div class="div_center">
                <img width="400" src="/products/{{$product_details->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$product_details->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    ${{$product_details->price}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>
                  Category: {{$product_details->category}}
                </h6>
                <h6>
                  Avaiable Quantity:
                  <span>
                    ${{$product_details->quantity}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <p class="">
                    {{$product_details->description}}
                </p>
              
            </a>
          </div>
        </div>

        
      </div>
      
    </div>
  </section>

  <!-- end shop section -->






   

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  

</body>

</html>
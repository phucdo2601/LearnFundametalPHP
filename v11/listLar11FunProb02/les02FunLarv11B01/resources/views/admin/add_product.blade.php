<!DOCTYPE html>
<html>
  
  <head>
    @include('admin.css')
    <style type="text/css">
     .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
     }

     h1{
        color: white
     }

     label {
        display: inline-block;
        width: 200px;
        font-size: 15px;
        color: white !important;
    }

    input[type="text"] {
        width: 300px;
        height: 50px;
    }

    textarea {
        width: 450px;
        height: 80px;
    }

    .input_deg{
        padding: 15px;

    }
        </style>
  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Add Product</h1>

            <div class="div_deg">
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="input_deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title" required>
                    </div>

                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Price</label>
                        <input type="text" name="price" required>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Quantity</label>
                        <input type="text" name="quantity" required>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" required>
                            <option>Select a option</option>
                            @foreach ($list_all_cates as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Add Product">
                    </div>
                </form>

            </div>
          </div>
        </div>
        
        

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
<!DOCTYPE html>
<html>
  @include('admin.css')
  <body>

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

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Update Product</h2>

            <div class="div_deg">
                <form action="{{ url('edit_product', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input_deg">
                        <label for="">Title:</label>
                        <input type="text" name="title" value="{{$data->title}}" id="">
                    </div>

                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" required>{{$data->description}}</textarea>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Price</label>
                        <input type="text" name="price" value="{{$data->price}}" required>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Quantity</label>
                        <input type="text" name="quantity" value="{{$data->price}}" required>
                    </div>

                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" required>
                            <option>Select a option</option>
                            @foreach ($list_all_cates as $category)
                                
                                @if ($category->category_name == $data->category)
                                <option value="{{$category->category_name}}" selected>{{$category->category_name}}</option>
                                @else
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                    <div class="input_deg">
                        <label for="">Current Image</label>
                        <img src="/products/{{$data->image}}" width="120" height="120" alt="Product-Image">
                        
                    </div>

                    <div class="input_deg">
                        <label for="">New Image:</label>
                        <input type="file" name="image" onchange="previewImage(event)">
                    </div>

                    <div class="input_deg" id="preview_up_img_sec" style="display: none">
                        <label for="">Current Image</label>
                        <img id="imagePreview" src="#" alt="Image Preview" width="120" height="120">
                    </div>

                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Update Product">
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

    <script type="text/javascript">
    // Function for preview image before uploading to server
        function previewImage(event) {
            var reader = new FileReader();
            var preview_up_img_sec = document.getElementById('preview_up_img_sec');
            reader.onload = function (e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block'; // Shows the image after loading
            };
            preview_up_img_sec.style.display = 'flex';
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
  </body>
</html>
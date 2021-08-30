@extends('Admin.Partials.header')
@section('design')

@if (Session::has('success'))
<div class="alert alert-success" style="width:100%; ">{{Session::get('success')}}</div>
@endif

<div style="box-shadow: rgb(0 0 0 / 10%) 0px 10px 50px; height: 850px; margin-top:-700px ;margin-left:222px;">


    <form action="" method="POST" enctype="multipart/form-data" class="form-group" style="padding-top: 12px;">
        @csrf
        <h3 class="mt-4 ml-4">Edit Product</h3>
        <div>
            <div class="col-md-6">
                <input type="text" value="{{$product->id}}">
                <input type="text" placeholder="Enter Name" name="name" class="form-control ml-2 mt-4" value="{{$product->name}}">
                <div class="mt-4 ml-2">
                    <select name="maincategory_id[]" id="multi" class="form-control" multiple="multiple">
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->maincategory}}</option>
                      @endforeach 
                    </select>
                </div>
                <select name="brand_id" class="form-control ml-2 mt-4">
                    <option value="">Select Brand</option>
                   
                 @foreach ($brands as $brand)
                 @if($product->brand_id == $brand->id)
                 <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                 @else
                 <option value="{{$brand->id}}">{{$brand->name}}</option>
                 @endif
                
                 @endforeach
                    
                </select>

                <textarea placeholder="Enter Description..." name="description" cols="5" rows="6" class="form-control ml-2 mt-4">{{$product->description}}</textarea>
                <br>
                <input type="checkbox" value="Amazon" name="platforms[]" style="margin-left: 11px;"> <span>Amazon</span>
                <input type="checkbox" value="Ali Express" name="platforms[]" style="margin-left: 44px;"> <span>Ali Express</span>
                <input type="checkbox" value="Daraz" name="platforms[]" style="margin-left: 44px;"> <span>Daraz</span>
                <br>

                <input type="file" name="full[]" class="form-control ml-2 mt-4" multiple>
                @error('full') {{$message}} @enderror

                <div class="ml-2 mt-3">
                    <input type="checkbox" name="status" {{$product->status == 1 ? 'checked' : ''}}><span> Visible/Active</span>
                </div>
                <button class="btn btn-primary mt-4 ml-2" type="submit">Create</button>
            </div>
        </div>
    
    </form>

@foreach ($product->image as $images)
    <img src="{{asset('storage/products/'.$images->full)}}" height="150px" width="150px" alt="">
    <a href="{{route('product.delimg',$images->id)}}" class="fa fa-trash" style="color: red;margin-bottom: 4px;  margin-right: -3px;"></a>
@endforeach

</div>

<script type="text/javascript">
    $('#multi').select2({
        placeholder: "Select Category",
        allowClear: true
    });
</script>
@endsection
@extends('Admin.Partials.header')
@section('design')

@if (Session::has('success'))
<div class="alert alert-success" style="width:100%; ">{{Session::get('success')}}</div>
@endif

<div style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;height:auto; margin-top: 12px;">
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="form-group" style="padding-top: 12px;">
        @csrf
        <h3 class="mt-4 ml-4">Create Product</h3>
        <div>
            <div class="col-md-6">
                <input type="text" placeholder="Enter Name" name="name" class="form-control ml-2 mt-4">
                <div class="mt-4 ml-2">
                    <select name="maincategory_id[]" id="multi" class="form-control" multiple="multiple">
                        @foreach ($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->maincategory}}</option>
                        @endforeach
                    </select>
                </div>
                <select name="brand_id"  class="form-control ml-2 mt-4">
                    <option value="">Select Brand</option>
                        @foreach ($brand as $brands)
                        <option value="{{$brands->id}}">{{$brands->name}}</option>
                        @endforeach
                </select>

                <textarea placeholder="Enter Description..." name="description" cols="5" rows="6" class="form-control ml-2 mt-4"></textarea>
                <br>
                <input type="checkbox" value="Amazon" name="platforms[]" style="margin-left: 11px;"><span>Amazon</span>
                <input type="checkbox" value="Ali Express" name="platforms[]" style="margin-left: 44px;"><span>Ali Express</span>
                <input type="checkbox" value="Daraz" name="platforms[]" style="margin-left: 44px;"><span>Daraz</span>
                <br>

                <input type="file" name="full[]" class="form-control ml-2 mt-4" multiple>
                <button class="btn btn-primary mt-3 ml-2" type="submit">Create</button>
            </div>
        </div>

    </form>
</div>

<script type="text/javascript">
    $('#multi').select2({
        placeholder: "Select Category",
        allowClear: true
    });
</script>
@endsection
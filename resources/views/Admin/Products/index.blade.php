@extends('Admin.Partials.header')
@section('design')

@if (Session::has('success'))
<div class="alert alert-success" style="width:100%; ">{{Session::get('success')}}</div>
@endif

<h3 class="mt-4">Product list</h3>
<table class="table table-striped mt-4" id="datatbl">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Maincategory</th>
            <th>Brands</th>
            <th>Image</th>
            <th>Description</th>
            <th>Available on</th>
            <th><i class="fa fa-bolt"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->maincategory_id}}</td>
            <td>{{$product->brand->name}}</td>
           <td>
               @foreach(json_decode($product->image->full,true) as $images)
               <img src="{{asset('storage/products/'.$images)}}" alt="" class="p_img">
               @endforeach
         
           </td>
            <td>{{$product->description}}</td>
            <td>
                @foreach ($product->platforms as $platform)
                <span class="platform"> {{$platform}}</span>
                @endforeach
            </td>
            <td>
                <button class="button" id="btn1"><a href="{{$product->id}}" class="fa fa-edit icon"></a></button>
                <button class="button" id="btn2"><a href="" class="fa fa-trash icon"></a></button>
                <button class="button" id="btn3"><a href="" class="fa fa-clone icon "></a></button>
            </td>
        </tr>
        @endforeach
    </tbody>


</table>



>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatbl').DataTable();
    });
</script>
@endsection
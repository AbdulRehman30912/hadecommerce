@php
use App\Models\Categories;

function getcat($a){
$maincategory =Categories::where('id',$a)->get();
return $maincategory;
}
@endphp

@extends('Admin.Partials.header')
@section('design')

@if (Session::has('success'))
<div class="alert alert-success" style="width: 81%; margin-left: 262px; ">{{Session::get('success')}}</div>
@endif

<h3 class="mt-4">Product list</h3>
<table class="table table-striped mt-4" id="datatbl">
    <thead>
        <tr>
            <th>Name</th>
            <th>Maincategory</th>
            <th>Brands</th>
            <th>Image</th>
            <th>Status</th>
            <th>Available on</th>
            <th><i class="fa fa-bolt"></i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>
                @php
                $json= json_decode($product->maincategory_id, true);
                foreach($json as $data)
                {
                foreach(getcat($data) as $maincategory)
                {
                echo '<span class="style">'.ucfirst($maincategory['maincategory']).'</span>';
                }
                }
                @endphp
            </td>
            <td>{{ucfirst($product->brand->name)}}</td>
            <td>
                @php
                $jsonimg= json_decode($product->image['full']);
                $jsonprint = $jsonimg[0];
                @endphp
                <img class="p_img" src="{{asset('storage/products/'.$jsonprint)}}" alt="">
            </td>
            <td>
                @if ($product->status == 1)
                    <span class="alert_success">Active</span>
                    @else
                    <span class="alert_danger">Not Active</span>
                @endif
            </td>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatbl').DataTable();
    });
</script>
@endsection
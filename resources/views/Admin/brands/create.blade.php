@extends('Admin.Partials.header')
@section('design')


@if (Session::has('success'))
<div class="alert alert-success" style="width:100%; ">{{Session::get('success')}}</div>
@endif

<div style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px; height: 255px; margin-top: 12px;">
    <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data" class="form-group" style="padding-top: 12px;">
        @csrf
        <h3 class="mt-4 ml-4">Create Brand</h3>
        <div class="col-md-4">
            <input type="text" placeholder="Create brand" name="brand" class="form-control ml-2 mt-4">
            <input type="file" name="image" class="form-control ml-2 mt-4">
            @error('img'){{$message}}@enderror
            <button class="btn btn-primary mt-3 ml-2" type="submit">Create</button>
        </div>
    </form>
</div>






@endsection
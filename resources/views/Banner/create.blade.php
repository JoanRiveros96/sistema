@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/banner')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('banner.form',['modo'=>'Crear'])



</form>
</div>
@endsection
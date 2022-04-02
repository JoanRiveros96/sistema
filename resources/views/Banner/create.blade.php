@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/banner')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Banner.form',['modo'=>'Crear'])



</form>
</div>
@endsection
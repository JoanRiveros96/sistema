@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/footer')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Footer.form',['modo'=>'Crear'])



</form>
</div>
@endsection
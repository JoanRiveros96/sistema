@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/historia')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Historia.form',['modo'=>'Crear'])



</form>
</div>
@endsection
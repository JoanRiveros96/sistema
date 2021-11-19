@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/comunicado')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('comunicado.form',['modo'=>'Crear'])



</form>
</div>
@endsection
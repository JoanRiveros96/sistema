@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/admision')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('admision.form',['modo'=>'Crear'])



</form>
</div>
@endsection
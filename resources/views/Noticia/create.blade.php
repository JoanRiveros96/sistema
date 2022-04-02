@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/noticia')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Noticia.form',['modo'=>'Crear'])



</form>
</div>
@endsection
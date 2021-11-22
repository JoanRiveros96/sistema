@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/social')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('social.form',['modo'=>'Crear'])



</form>
</div>
@endsection
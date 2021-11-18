@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/banner/'.$banner->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('banner.form',['modo'=>'Editar'])

</form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/historia/'.$historia->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Historia.form',['modo'=>'Editar'])

</form>
</div>
@endsection
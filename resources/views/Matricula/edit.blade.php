@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/matricula/'.$matricula->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Matricula.form',['modo'=>'Editar'])

</form>
</div>
@endsection
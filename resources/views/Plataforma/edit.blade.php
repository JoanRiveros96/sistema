@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/plataforma/'.$plataforma->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Plataforma.update',['modo'=>'Editar'])

</form>
</div>
@endsection
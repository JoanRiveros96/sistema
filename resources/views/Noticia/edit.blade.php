@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/noticia/'.$noticia->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('noticia.form',['modo'=>'Editar'])

</form>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/programador/'.$programador->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Programador.form',['modo'=>'Editar'])

</form>
</div>
@endsection
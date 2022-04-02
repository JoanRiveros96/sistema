@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/comunicado/'.$comunicado->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Comunicado.form',['modo'=>'Editar'])

</form>
</div>
@endsection
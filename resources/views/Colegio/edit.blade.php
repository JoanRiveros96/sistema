@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/colegio/'.$colegio->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Colegio.update',['modo'=>'Editar'])

</form>
</div>
@endsection
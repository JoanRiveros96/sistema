@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/cuenta/'.$cuenta->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('cuenta.form',['modo'=>'Editar'])

</form>
</div>
@endsection
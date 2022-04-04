@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/admision/'.$admision->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Admision.form',['modo'=>'Editar'])

</form>
</div>
@endsection
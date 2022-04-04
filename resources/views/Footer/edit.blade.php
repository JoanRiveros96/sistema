@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/footer/'.$footer->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Footer.update',['modo'=>'Editar'])

</form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/social/'.$social->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('Social.update',['modo'=>'Editar'])

</form>
</div>
@endsection
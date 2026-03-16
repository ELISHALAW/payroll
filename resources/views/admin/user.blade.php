@extends('output.admin')

@section('content')
<h1 class="text-2xl font-bold">Hello {{{ auth()->user()->name }}}</h1>
@endsection
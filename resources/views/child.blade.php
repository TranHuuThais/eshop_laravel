
@extends('layout')




@section('page' , 'page child')

@section('sidebar')
@parent
this is layout child sidebar
@endsection

@section('content')
<h1>content of child</h1>
@endsection 


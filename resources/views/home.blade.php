@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a href="#" class="btn btn-primary" data-widget="control-sidebar">Novo</a>
    <a  href="departamentos">Active</a>
 @stop

@section('content')  
   
@stop

@section('footer')
<div class="float-right d-none d-sm-block">
   <b>Version</b> 3.0.0-alpha
</div>
<strong> &copy;</strong> Primex Pro
@stop

@section('css')
    
@stop

@section('js') 

@stop
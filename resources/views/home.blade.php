@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a href="#" data-widget="control-sidebar">Toggle Control Sidebar</a>


    <aside class="control-sidebar control-sidebar-dark"></aside>

    

@stop

@section('footer')
<div class="float-right d-none d-sm-block">
   <b>Version</b> 3.0.0-alpha
</div>
<strong> &copy;</strong> Primex Pro
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

      
    <script>
        $(document).Toasts('create', {
        heading: 'Information',    
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        position: 'topRight',
        autohide: true,
        delay: 10000,
        close:true,
        icon: 'info',
        showHideTransition: 'fade',             
        })


    </script>

    

@stop
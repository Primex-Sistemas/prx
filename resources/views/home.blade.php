@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a href="#" class="btn btn-primary" data-widget="control-sidebar">Novo</a>
    <a  href="departamentos">Active</a>
 @stop

@section('content')  
    

    <aside class="control-sidebar control-sidebar-dark" >
     <div class = "m-3">
        <h5><span class="fa fa-book fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span> Novo Cadastro</h5>           
     </div>
     <hr /> 
    <form class=" m-3">
        <div class="form-group">
            <label for="formGroupExampleInput">Sigla</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite a Sigla">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Nome</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite ao Nome">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Descrição</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a Descrição">
        </div>
        <button type="submit" data-widget="control-sidebar" class="btn btn-success">Salvar</button>
        <button type="submit" data-widget="control-sidebar" class="btn btn-warning">Cancelar</button>
        </form>
    </aside>

    <table id="departamento-table" class="col-md-12 table">
        <thead>
            <th>id</th>
            <th>Sigla</th>
            <th>Nome</th>
            <th>Descrição</th>

            @foreach ($departamento as $dp)
            <tr>
                <td>{{$dp->id}}</td>
                <td>{{$dp->sigla}}</td>
                <td>{{$dp->nome}}</td>
                <td>{{$dp->descricao}}</td>
            </tr>
            @endforeach
            
        </thead>
        
    </table>
    {{ $departamento->links() }}
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
<!--
<script type="text/javascript">
 $(document).ready( function () {
    carregaDepartamento();
  });
  function carregaDepartamento()
     {
        $("#departamento-table").dataTable().fnDestroy();
        $('#departamento-table').DataTable({
                    processing :true,
                    serverSide:true,
                    lengthMenu: [5, 10, 15, 25, 50, 100, 'Todas' ],
                    responsive: true,
                    sort: true,
                    searching:true,
                    "ajax": "{{route('home.list')}}",
                    "columns" : [
                             {"data":"id" },
                             {"data":"sigla" },
                             {"data":"nome" },
                             {"data":"descricao" }
                           ],
                    "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
                    order: [[1, 'asc']]
                   });
     }

</script>
    -->  

@stop
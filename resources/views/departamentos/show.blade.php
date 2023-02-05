@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- <a href="#" class="btn btn-primary" data-widget="control-sidebar">Novo</a>    -->
    <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-outline-info pull-right"> 
    <span class="fa fa-book fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span>
    Novo</button>
    
 @stop

@section('content')  
    
    <aside class="control-sidebar control-sidebar-dark">
     <div class = "m-3">
        <h5><span class="fa fa-edit fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span> Editar Cadastro</h5>           
     </div>
     <hr />      
    <form class=" m-3" action="{{ URL::to('departamentos/update') }}" id="editForm">
        <input type="hidden" id="memid" name="id">
        <div class="form-group">
            <label for="sigla">Sigla</label>
            <input type="text" class="form-control" name= "sigla" id="sigla" placeholder="Digite a Sigla">
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name= "nome" id="nome" placeholder="Digite ao Nome">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name= "descricao" id="descricao" placeholder="Digite a Descrição">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-warning" data-widget="control-sidebar">Cancelar</button>
        </form>
    </aside>


    <!-- Add Modal -->
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Novo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form action="{{ URL::to('departamentos/save') }}" id="addForm">
                <div class="form-group">
                <label for="sigla">Sigla</label>
                <input type="text" class="form-control" name= "sigla" id="sigla" placeholder="Digite a Sigla">
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name= "nome" id="nome" placeholder="Digite ao Nome">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name= "descricao" id="descricao" placeholder="Digite a Descrição">
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="newClose" >Sair</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
        </div>
    </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Excluir</h5>            
        </div>
        <div class="modal-body">
                <h4 class="text-center">Deseja Realmente Excluir?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" id="sairDelete" class="btn btn-secondary">Sair</button>
            <button type="button" id="delete" class="btn btn-danger">Excluir</button>
            </form>
        </div>
        </div>
    </div>
    </div>


    <table id="departamento-table" class="col-md-12 table">
        <thead>
            <th>id</th>
            <th>Sigla</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>

            <tbody id="#tableList">
                @foreach ($departamento as $dp)
                    <tr>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->sigla}}</td>
                        <td>{{$dp->nome}}</td>
                        <td>{{$dp->descricao}}</td>
                        <td>
                            <a href='#' class='btn btn-outline-success edit' data-toggle="modal" data-widget="control-sidebar"
                                        data-id='{{ $dp->id }}' 
                                        data-sigla='{{ $dp->sigla }}' 
                                        data-nome='{{ $dp->nome }}'
                                        data-descricao='{{ $dp->descricao }}'
                            ><span class="fa fa-edit fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span></a> 
                            <a href='#' class='btn btn-outline-danger delete' data-bs-toggle="deletemodal" data-id='{{ $dp->id }}'> 
                            <span class="fa fa-trash fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>                    
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
<style>
    .control-sidebar{
        width: 300px;
    }
</style>
@stop

@section('js')
<script type="text/javascript">
        $(document).ready(function(){
  
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });             
            showMember();
        });

        $("#add").click(function() {
                $('#addnew').modal('show');
             }); 
    
        $("#newClose").click(function(){
            $('#addnew').modal('hide');
        });

        $('#addForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#addnew').modal('hide');
                        $('#addForm')[0].reset();
                        location.reload(); 
                        //showMember();
                    }
                }).fail(function (jqXHR, textStatus, error) {
                        alert('Erro');
                        $('.control-sidebar').hide();
                });  
            });

        $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var sigla = $(this).data('sigla');
                var nome = $(this).data('nome');
                var descricao = $(this).data('descricao');
                $('#sigla').val(sigla);
                $('#nome').val(nome);
                $('#descricao').val(descricao);
                $('#memid').val(id);
            });
          
          $('#editForm').on('submit', function(e){                
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');                
                $.ajax({
                        type: "POST",
                        url: url,
                        data: form,
                        success: function() {   
                            location.reload();  
                            alert('Atualizado');
                            $('.control-sidebar').hide();
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        alert('Erro');
                        $('.control-sidebar').hide();
                    });                
            });

            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#delete').val(id);
            });

            $('#delete').click(function(){
                alert('oi');
                var id = $(this).val();

                $.ajax({
                        type: "POST",
                        url: "{{ URL::to('departamentos/delete') }}",
                        data: {id:id},
                        success: function() {   
                            location.reload(); 
                            $('#deletemodal').modal('hide');                            
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        alert('Erro');  
                        $('#deletemodal').modal('hide');                     
                    });                 
             });

             $("#sairDelete").click(function() {
                $('#deletemodal').modal('hide');
             }); 

        function showMember(){ 
            $.get("{{ URL::to('departamentos/show') }}", 
            function(data){ 
                 
            });
        }

</script>
@stop
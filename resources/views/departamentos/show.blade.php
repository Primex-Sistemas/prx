@extends('adminlte::page')

@section('title', 'Departamentos')

@section('content_header')
    <div class="shadow-sm p-0  rounded">
    <h4 class="shadow ml-3" >Departamentos</h4>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <button 
            type="button" 
            data-toggle="modal" 
            data-target="#sidebar-add"  
            class="btn btn-outline-info pull-right mt-2">
            <span class="fa fa-book fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span>
            Novo
    </button>
    <button 
            type="button" 
            class="btn btn-outline-success pull-right mt-2 float-right">
            <span class="fa fa-filter fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span> 
            Filtrar
    </button>
@stop

@section('content')  

@include('departamentos.edit')

@include('departamentos.delete')

@include('departamentos.add')

@include('departamentos.list')    
    
@stop

@section('footer')
<div class="float-right d-none d-sm-block">
   <b>Version</b> 3.0.0-alpha
</div>
<strong> &copy;</strong> Primex Pro
@stop

@section('css')
<style>
/* MODAL RIGHT BOTTOM */
.modal.fade:not(.in).left .modal-dialog {
	-webkit-transform: translate3d(-25%, 0, 0);
	transform: translate3d(-25%, 0, 0);
}

.modal.fade:not(.in).right .modal-dialog {
	-webkit-transform: translate3d(25%, 0, 0);
	transform: translate3d(25%, 0, 0);
}
.modal.fade:not(.in).bottom .modal-dialog {
	-webkit-transform: translate3d(0, 25%, 0);
	transform: translate3d(0, 25%, 0);
}

.modal.right .modal-dialog {
	position:absolute;
	top:0;
	right:0;
	margin:0;
	margin-right: 10%;   
}	
.modal.right .modal-content {
	min-height:100vh;
	border:0;
	width: 360px;
}
.modal-body{
		max-height: calc(100vh - 140px);
		overflow-y: auto;
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
                    }
                }).fail(function (jqXHR, textStatus, error) {
                        alert('Erro ao realizar a requisição');                       
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
                            alert('Registro atualizado com sucesso');                            
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        alert('Erro ao realizar a requisição');
                    });                
            });

            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#delete').val(id);
            });

            $('#delete').click(function(){                
                var id = $(this).val();

                $.ajax({
                        type: "POST",
                        url: "{{ URL::to('departamentos/delete') }}",
                        data: {id:id},
                        success: function() {   
                            location.reload(); 
                            $('#deletemodal').modal('hide');   
                            alert('Registro deletado com sucesso!');                         
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        alert('Erro ao realizar a requisição');  
                        $('#deletemodal').modal('hide');                                      
                    });                 
             });

             $("#sairDelete").click(function() {
                $('#deletemodal').modal('hide');
             }); 

        function showMember(){$.get("{{ URL::to('departamentos/show') }}",function(data){});}

</script>
@stop
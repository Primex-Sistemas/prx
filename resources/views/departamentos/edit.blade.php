<div class="modal fade right" id="sidebar-edit" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">				
                <h5><span class="fa fa-edit fa-fw {{ config('adminlte.classes_auth_icon', '') }}"></span> Editar Cadastro</h5>           
            </div>
            <form class=" m-3" action="{{ URL::to('departamentos/update') }}" id="editForm">
				<div class="modal-body">
                    
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
                    
				</div>
			   <div class="modal-footer">
                <button type="submit" class="btn btn-success col-md-6">Salvar</button>
                <button type="button" class="btn btn-warning col-md-5" data-dismiss="modal">Cancelar</button>
               </div>
            </form>
		</div>
	</div>
</div>
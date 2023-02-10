<table id="departamento-table" class="col-md-12 table table-striped ">
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
                            <a href='#' class='btn btn-outline-success edit' data-toggle="modal" data-target="#sidebar-edit"
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
        <div class="d-flex">
                {!! $departamento->links() !!}
        </div>

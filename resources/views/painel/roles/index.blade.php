@extends ('painel.templates.template')

@section('content')

<!-- Pesquisar -->

	<div class="actions">
		<div class="container">
			<a class="add" href="forms">
				<i class="fa fa-plus-circle"></i>
			</a>

			<form class="form-search form form-inline">
				<input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
				<input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
			</form>
		</div>
	</div><!--Actions-->

	<div class="clear"></div>
<!-- fim de pesquisar -->

<div class="container">
	<h1 class="title">
		Listagem das Regras ou Roles
	</h1>

	<table class="table table-hover">
	  <tr style="text-transform:uppercase; text-align:center;">
	  	<th>Nome</th>
	  	<th>Descrição</th>
	   <th width="150px">Opções</th>
	  </tr>
    <!-- exibindo dinamicamente os dados -->

    @forelse( $roles as $role )
	  <tr>
	  	<td>{{$role->name}} </td>
	  	<td>{{$role->label}}</td>
	  	<td>
			<a href="{{url("/painel/roles/$role->id/permissions")}}" class="permisssion">
	  			<i class="fa fa-lock"></i>
	  		</a>
	  		<a href="{{url("/painel/roles/$role->id/edit")}}" class="edit">
	  			<i class="fa fa-pencil-square-o"></i>
	  		</a>
	  		<a href="{{url("/painel/roles/$role->id/delete")}}" class="delete">
	  			<i class="fa fa-trash"></i>
	  		</a>
	  	</td>
	  </tr>
      <!-- se nao achar nenhum resultado -->
	  @empty
    <tr>
     <td colspan="90">
     <p>Nenhum resultado encontrado!</p></td>
    </tr>
      @endforelse
	</table>


	<!-- <nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav> -->
</div>

@endsection
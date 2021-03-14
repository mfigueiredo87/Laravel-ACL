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
		Listagem dos POSTS
	</h1>

	<table class="table table-hover">
	  <tr style="text-transform:uppercase; text-align:center;">
	  	<th>Título</th>
	  	<th>Descrição</th>
	  	<th>Autor</th>
	  	<th width="100px">Opções</th>
	  </tr>
    <!-- exibindo dinamicamente os dados -->

    @forelse( $posts as $post )
	  <tr>
	  	<td>{{$post->title}} </td>
	  	<td style="text-align:justify;">{{$post->decription}}</td>
	  	<td>{{$post->user->name}}</td>
	  	<td>
	  		<a href="{{url("/painel/post/$post->id/edit")}}" class="edit">
	  			<i class="fa fa-pencil-square-o"></i>
	  		</a>
	  		<a href="{{url("/painel/post/$post->id/delete")}}" class="delete">
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
	<!-- gerar a paginacao -->
	{{$posts->render()}}

</div>

@endsection
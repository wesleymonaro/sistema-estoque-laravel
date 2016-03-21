@extends('layout.principal')

@section('conteudo')

@if(empty($produtos))
<div class="alert alert-danger">
	Você não tem nenhum produto cadastrado.
</div>
@else
<h1>Listagem de produtos</h1>
<table class="table table-striped table-bordered table-hover">
	
	<tr>
		<th>Produto</th>
		<th>Descrição</th>
		<th>Valor</th>
		<th>Quantidade</th>
		<th>Ações</th>
	</tr>
	@foreach ($produtos as $p)
	<tr class="{{$p->quantidade<=1 ? 'danger' : '' }}">
		<td>{{ $p->nome }} </td>
		<td>{{ $p->descricao }} </td>
		<td>R${{ $p->valor }} </td>
		<td>{{$p->quantidade }} </td>
		<td><a href="/produtos/mostra/<?= $p->id ?>"><span class="glyphicon glyphicon-search"></span></a>
		<a href="{{action('ProdutoController@remove', $p->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
		<a href="{{action('ProdutoController@preparaAltera', $p->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
	</tr>
	@endforeach
</table>
@endif
<h4>
	<span class="label label-danger pull-right">
		Um ou menos itens no estoque
	</span>
</h4>



<div class="alert alert-success">
<strong>Sucesso!</strong>
O produto  foi adicionado.
</div>

@stop
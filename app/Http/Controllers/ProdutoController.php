<?php namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use Validator;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {
	public function lista(){
		$produtos = Produto::all();
		return view('produto.listagem')->with('produtos', $produtos);//funciona também com view('listagem')->withProdutos($produtos);
	}

	public function mostra($id){
		$produto = Produto::find($id);
		if(empty($produto)) {
			return "Esse produto não existe";
		}
		return view('produto.detalhes')->with('p', $produto);
	}

	public function novo(){
		return view('produto.formulario');
	}

	public function adiciona(ProdutosRequest $request){

		
		
		Produto::create($request->all());

		/*DB::insert('insert into produtos
			(nome, quantidade, valor, descricao) values (?,?,?,?)',
			array($nome, $quantidade, $valor, $descricao));

		/*	PODENDO SER DA SEGUINTE FORMA COM QUERY BUILDER:
			DB::table('produtos')->insert(
			['nome' => $nome,
			'valor' => $valor,
			'descricao' => $descricao,
			'quantidade' => $quantidade
			]
			);
		*/

return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
}

public function listaJson(){
	$produtos = Produto::all();
	return response()->json($produtos);
}

public function remove($id){
	$produto = Produto::find($id);
	$produto->delete();
	return redirect()
	->action('ProdutoController@lista');
}

public function preparaAltera($id){
	$produto = Produto::find($id);
	return view('produto.editar')->with('p', $produto);
}

public function altera(){

	$params = Request::all();
        $model = Produto::find($params['id']);
        $model->fill($params);
        $model->save();

	
	return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
}
}
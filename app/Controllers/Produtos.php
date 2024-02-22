<?php


namespace Controllers;

use Components\ToastsAlert;
use Core\Controller;
use Core\Request;
use Core\View;
use Models\Produto;

class Produtos extends Controller
{
    public function index()
    {
        $view = new View('produtos.lista');
        $produtosModel = new Produto();
        $view->produtos = $produtosModel->orderByAsc('nome')->all();
        $view->setTitle('Cadastro de Produtos')->show();

    }



    public function disponivel(Request $request)
    {
        $produto = new Produto($request->id);
        $produto->disponivel = !$produto->disponivel;
        $produto->save();
        ToastsAlert::addAlertSuccess('Produto alterado com sucesso!');
        $this->redirect();
    }

    /**
     * Altera registro da base de dados recebendo as requisições de um formulário
     * @param \Core\Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $produto = new Produto($request->id);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor_un = $request->valor_un;
        $produto->unidade_medida = $request->unidade_medida;
        $produto->disponivel = (isset($request->disponivel))?1:0;
        $produto->save();
        ToastsAlert::addAlertSuccess("{$produto->nome} Salvo com Sucesso!");
        $this->redirect();
    }
    public function delete(Request $request)
    {
        $produto = new Produto($request->id);
        if($produto->isStorage()){
            ToastsAlert::addAlertSuccess("{$produto->nome} Excluido com Sucesso!");
            $produto->delete();
            $this->redirect();
        }
        ToastsAlert::addAlertError("Produto não encontrado!");
        $this->redirect();
    }

    /**
     * Abre a tela de criação de um novo registro
     * @return void
     */
    public function novo()
    {
        $view = new View('produtos.item');
        $view->setTitle('Novo Produto')->show();
    }
    /**
     * Carrega os dados da base e passa para a view para edição.
     * @param mixed $id
     * @return void
     */
    public function edit($id)
    {
        $produto = new Produto($id);
        if(!$produto->isStorage()){
            ToastsAlert::addAlertError('Requisição inválida!');
            $this->redirect();
        }
        $view = new View('produtos.item');
        $view->setTitle("Produto {$produto->nome}")->show($produto->getData());
    }

}
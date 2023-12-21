<div class="conatiner-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-cupom">
                    <table class="printer-ticket" style="max-width:100%">
                        <tbody>
                            <?php
                            foreach ($atendimento->getPedidos() as $pedido): ?>
                                <tr class="top">
                                    <td colspan="2" class="font-weight-bold">
                                        <?= $pedido->getProduto()->nome . " (Cod. $pedido->produtos_id)"; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $pedido->date('criacao_data', 'H:i') ?>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="pb-2">
                                        <?= $pedido->money('valor_un') ?>
                                    </td>
                                    <td class="pb-2">
                                        <?= $pedido->quantidade ?>
                                    </td>
                                    <td class="pb-2">
                                        <?= $pedido->getSubTotal() ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-secondary"><i class="fas fa-print"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-first order-md-last">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-white bg-info mb-3 ">
                        <div class="card-body">
                            <div class="">
                                Total:
                            </div>
                            <h1 class="text-center"> R$
                                <?= number_format($atendimento->getValorTotal(), 2, ',', '.') ?>
                            </h1>
                        </div>
                        <div class="card-footer">
                            cod.
                            <?= $atendimento->id ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <a href="<?= action(\Controllers\Home::class) ?>" class="btn btn-warning btn-lg w-100 mb-2"> <i
                            class="fas fa-angle-left"></i> Voltar</a>
                    <a href="#" class="btn btn-success btn-lg w-100 mb-2" data-toggle="modal"
                        data-target="#registrar-pagamento"> <i class="fas fa-cash-register"></i> Registrar Pagamento</a>
                    <a href="#" class="btn btn-primary btn-lg w-100 mb-2" data-toggle="modal"
                        data-target="#finalizar-atendimento"> <i class="fas fa-handshake"></i> Finalizar Atendimento</a>
                </div>
                <div class="col-12 order-first order-md-last">
                    <form
                        action="<?= action(\Controllers\Home::class, 'addPedido', 'POST', ['id' => $atendimento->id]) ?>"
                        method="POST">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title">
                                    Adicionar Pedido
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="selectProdutos">Produto</label>
                                            <?php $produtosSelect->show() ?>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="inputQuantidade">Quantidade</label>
                                            <input type="number" name="quantidade" class="form-control"
                                                id="inputQunatidade" min="0.01" step="0.01" value="1">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i>
                                    Limpar</button>
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                                    Adicionar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Pagamentos
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (count($atendimento->getPagamentos())): ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hora</th>
                                            <th>Valor</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($atendimento->getPagamentos() as $pagamento): ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $pagamento->date('criacao_data', 'H:i');
                                                    $obs = $pagamento->observacao;
                                                    if (!empty($obs)):
                                                        ?>
                                                        <i class="fas fa-info-circle text-info" title="<?= $obs ?>"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $pagamento->money('valor') ?>
                                                </td>
                                                <td>
                                                    <?= $pagamento->getPagamentoTipo()->descricao ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="text-center text-muted"> Sem registros de pagamento</div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registrar-pagamento">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= action(\Controllers\Home::class, 'addPagamento', 'POST', ['id' => $atendimento->id]) ?>"
                method="post">
                <div class="modal-header bg-success">
                    <h4 class="modal-title"> <i class="fas fa-cash-register"></i> Registrar Pagamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class=" form-group col-6">
                            <label for="">Total</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type='text' class="form-control"
                                    value='<?= number_format($atendimento->getValorTotal(), 2, ',', '.') ?>' disabled>
                            </div>
                        </div>
                        <div class=" form-group col-6">
                            <label for="">Valor Pagamento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" class="form-control" step='0.01' min='0.01' name="valor"
                                    value="<?= round($atendimento->getValorTotal(), 2) ?>">
                            </div>
                        </div>
                        <div class=" form-group col-6">
                            <label for="">Troco</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="text" class="form-control" value="0,00" disabled>
                            </div>
                        </div>
                        <div class=" form-group col-6">
                            <label for="">Tipo de pagamento:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                </div>
                                <?php component(\Components\Select::class)
                                    ->addAttr('class', 'form-control')
                                    ->addAttr('name', 'pagamentos_tipos_id')
                                    ->addModel(model('PagamentoTipo')->orderByAsc('descricao'), 'id', 'descricao')
                                    ->show() ?>
                            </div>
                        </div>
                        <div class=" form-group col-12">
                            <label for="">Observação:</label>
                            <textarea name="observacao" placeholder="digite observações se forem nescessárias"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> <i
                            class="fas fa-undo-alt"></i> Cancelar</button>
                    <button type="submit" class="btn btn-outline-success"> <i class="far fa-money-bill-alt"></i>
                        Registrar</button>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="finalizar-atendimento">
    <div class="modal-dialog">
        <div class="modal-content">
            <form
                action="<?= action(\Controllers\Home::class, 'finalizarAtendimento', 'POST', ['id' => $atendimento->id]) ?>"
                method="post">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title"> <i class="fas fa-handshake"></i> Finalizar Atendimento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php if ($atendimento->getValorTotal() > 0): ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
                                Ao finalizar um atendiemnto que ainda possui saldo, você estará adicionando
                                um desconto a comanda do cliente.
                            </div>
                            <div class="col-12">
                                <div class="text-center">Confirma a finalização do Atendimento?</div>
                            </div>
                            <div class="col-12 text-danger text-center">
                                Valor do Desconto:<h5>
                                    R$ <?= number_format($atendimento->getValorTotal(), 2, ',', '.') ?>
                                </h5>
                                <input type="checkbox" required name="desconto"> Autorizo o desconto para o cliente.
                            </div>
                        <?php else: ?>
                            <div class="col">
                                <div class="text-center">Confirma a finalização do Atendimento?</div>
                            </div>
                        <?php endif ?>
                        <input type="hidden" name="desconto" value="<?= $atendimento->getValorTotal() ?>">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> <i
                            class="fas fa-undo-alt"></i> Cancelar</button>
                    <button type="submit" class="btn btn-outline-primary"> <i class="fas fa-handshake"></i>
                        Finalizar</button>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
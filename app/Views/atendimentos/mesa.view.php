<div class="conatiner-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body bg-cupom">
                    <table class="printer-ticket" style="max-width:100%">
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($atendimento->getPedidos() as $pedido):
                                $total += $pedido->valor_un * $pedido->quantidade;
                                ?>

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
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card text-white bg-info mb-3 ">
                        <div class="card-body">
                            <div class="">
                                Total:
                            </div>
                            <h1 class="text-center"> R$
                                <?= number_format($total, 2, ',', '.') ?>
                            </h1>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col">
                    <a href="<?= action(\Controllers\Home::class) ?>" class="btn btn-warning btn-lg w-100 mb-2"> <i
                            class="fas fa-angle-left"></i> Voltar</a>
                    <a href="<?= action(\Controllers\Home::class) ?>" class="btn btn-success btn-lg w-100 mb-2"> <i
                            class="fas fa-cash-register"></i> Registrar Pagamento</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="<?= action(\Controllers\Home::class, 'addPedido', 'POST', ['id' => $atendimento->id]) ?>"
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
        </div>
    </div>
</div>
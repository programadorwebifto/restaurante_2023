<div class="conatiner-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body bg-cupom">
                    <table class="printer-ticket" style="max-width:100%">
                        <tbody>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>
                            <tr class="top">
                                <td colspan="2" class="font-weight-bold">Doce de brigadeiro</td>
                                <td class="text-right">14:00 </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pb-2">R$ 7,99</td>
                                <td class="pb-2">2.0</td>
                                <td class="pb-2">R$ 15,98</td>
                            </tr>

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
                            <h1 class="text-center"> R$ 75,00</h1>
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
                                        <?php component(\Components\Select::class)
                                            ->addAttr('class', 'form-control')
                                            ->show() ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputQuantidade">Quantidade</label>
                                        <input type="number" name="quantidade" class="form-control" id="inputQunatidade" min="0.01"
                                            step="0.01" value="1">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                        <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Limpar</button>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                        Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
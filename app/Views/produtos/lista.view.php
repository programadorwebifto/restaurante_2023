<div class="row">
    <div class="col-12 py-2">
        <a href="<?=action(\Controllers\Produtos::class,'novo')?>" class="btn btn-primary float-right">Novo</a>
    </div>
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Lisa de Produtos Cadastrados</h3>
            </div>
            <div class="card-body">
                <table class="table w-100 table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th title="disponível">Disp.</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?= $produto->nome ?></td>
                                <td>R$ <?= number_format($produto->valor_un, 2, ',', '.') ?></td>
                                <td>
                                    <form action="<?=action(\Controllers\Produtos::class,'disponivel','POST')?>" method="POST">
                                        <button type="submit" class="btn">
                                              <i class="fas fa-<?=($produto->disponivel)?'check-circle text-success':'times-circle text-danger'?>"></i>
                                        </button>
                                        <input type="hidden" value="<?=$produto->id?>" name="id">
                                    </form>
                                </td>
                                <td>
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</div>
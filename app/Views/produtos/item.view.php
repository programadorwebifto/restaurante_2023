<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <form action="<?= action(\Controllers\Produtos::class, 'update', 'POST') ?>" method="post">
            <div class="card card-primary">
                <div class="card-header cursor-pointer" data-card-widget="collapse">
                    <h3 class="card-title">Formulário de cadastro de produtos</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome do produto"
                            value="<?= value($nome) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="textDescricao">Descricao</label>
                        <textarea class="form-control" id="textDescricao" placeholder="Descrição do produto"
                            name="descricao" required><?= value($descricao) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputValor">Valor</label>
                        <input type="number" step="0.01" min="0" class="form-control" name="valor_un" id="inputValor"
                            placeholder="Valor do produto" value="<?= value($valor_un) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="selectUnidade">Unidade de Medida</label>
                        <?php component(\Components\Select::class)
                            ->addAttr('class', 'form-control')
                            ->addAttr('required', '')
                            ->addAttr('id', 'selectUnidade')
                            ->addAttr('name', 'unidade_medida')
                            ->setValue(value($unidade_medida))
                            ->setPlaceholder('Selecione uma unidade para o produto')
                            ->addOption('Unidade', 'Unidade')
                            ->addOption('Kilo', 'Kilo')
                            ->addOption('Grama', 'Grama')
                            ->show(); ?>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkDisponivel" name='disponivel'
                            <?= (value($disponivel) == 0) ? '' : 'checked' ?>>
                        <label class="form-check-label" for="checkDisponivel">Disponível</label>
                    </div>
                    <input type="hidden" name="id" value="<?= value($id) ?>">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?= action(\Controllers\Produtos::class) ?>" class="btn btn-info"><i
                            class="fas fa-undo-alt"></i> Voltar</a>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Limpar</button>
                    <?php if (isset($id)): ?>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmar-exclusao">
                            <i class="fas fa-trash"></i> Excluir</button>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                        Salvar</button>
                </div>
                <!-- /.card-footer-->
            </div>
        </form>
        <!-- /.card -->
    </div>
</div>
<?php if (isset($id)): ?>
    <div class="modal fade" id="confirmar-exclusao">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Confirmar Exclusão</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Confirma a exclusão do produto <b>"
                            <?= $nome ?>" ?
                        </b></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="<?= action(\Controllers\Produtos::class, 'delete', 'POST') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" class="btn btn-outline-danger">Excluir</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endif; ?>
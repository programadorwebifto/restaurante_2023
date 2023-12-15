<section class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Dados do Usuário</h3>
                </div>
                <form action="<?= action(\Controllers\Usuarios\Perfil::class, 'update', 'POST') ?>" method="POST">
                    <div class="card-body row">
                        <div class="form-group col-md-8">
                            <label for="inputNome">
                                Nome
                            </label>
                            <input type="text" class="form-control" id="inputNome" disabled value="<?= value($nome) ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputTelefone">
                                Telefone<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="telefone" class="form-control" placeholder="(63)9999-9999"
                                id="inputTelefone" value="<?= value($telefone) ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCPF">
                                CPF
                            </label>
                            <input type="text" class="form-control" id="inputCPF" value="<?= value($cpf) ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputRG">
                                RG<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="inputRG" value="<?= value($rg) ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputRG_Expedidor">
                                RG Expedidor:<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="inputRG_Expedidor"
                                value="<?= value($rg_expedidor) ?>" disabled>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="inputEmail">
                                Email<span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="Email..." id="inputEmail"
                                value="<?= value($email) ?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?= value($id) ?>">
                        <input type="hidden" name="pessoas_id" value="<?= value($pessoas_id) ?>">
                    </div>
                    <div class="card-footer">
                        <a href="<?= action(\Controllers\Home::class) ?>" class="btn btn-danger">
                            <i class="fas fa-block"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fas fa-save"></i>
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Alterar Senha</h3>
                </div>
                <form action="<?= action(\Controllers\Usuarios\Perfil::class, 'changePassword', 'POST') ?>" method="POST">
                    <div class="card-body row">
                        <div class="form-group col-12">
                            <label for="senhaAtual">
                                Senha Atual<span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Digite sua senha Atual" id="senhaAtual">
                        </div>
                        <div class="form-group col-12">
                            <label for="novaSenha">
                                Nova Senha<span class="text-danger">*</span>
                            </label>
                            <input type="password" name="newpassword" class="form-control"
                                placeholder="Digite sua nova senha" id="novaSenha">
                        </div>
                        <div class="form-group col-12">
                            <label for="confirmacao">
                                Confirmação<span class="text-danger">*</span>
                            </label>
                            <input type="password" name="confirmacao" class="form-control"
                                placeholder="Digite a nova senha novamente" id="confirmacao">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-warning">
                            <i class="fas fa-eraser"></i>
                            Limpar
                        </button>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fas fa-save"></i>
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Dados do Usuário</h3>
                </div>
                <form action="<?=action(\Controllers\Usuarios\Cadastro::class,'save','POST')?>" method="POST">
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="inputNome">
                                Nome<span class="text-danger">*</span> 
                            </label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome Completo" id="inputNome" value="<?=value($nome)?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelefone">
                                Telefone<span class="text-danger">*</span> 
                            </label>
                            <input type="text" name="telefone" class="form-control" placeholder="(63)9999-9999" id="inputTelefone"  value="<?=value($telefone)?>"  required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCPF">
                                CPF<span class="text-danger">*</span> 
                            </label>
                            <input type="text" name="cpf" class="form-control" placeholder="CPF..." id="inputCPF" value="<?=value($cpf)?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputRG">
                                RG<span class="text-danger">*</span> 
                            </label>
                            <input type="text" name="rg" class="form-control" placeholder="RG..." id="inputRG" value="<?=value($rg)?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputRG_Expedidor">
                                RG Expedidor:<span class="text-danger">*</span> 
                            </label>
                            <input type="text" name="rg_expedidor" class="form-control" placeholder="Ex: SSP/TO" id="inputRG_Expedidor" value="<?=value($rg_expedidor)?>" required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputEmail">
                                Email<span class="text-danger">*</span> 
                            </label>
                            <input type="email" name="email"  class="form-control" placeholder="Email..." id="inputEmail" value="<?=value($email)?>"  required>
                        </div>
                        <input type="hidden" name="id"   value="<?=value($id)?>">
                        <input type="hidden" name="pessoas_id"   value="<?=value($pessoas_id)?>">
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-warning">
                            <i class="fas fa-eraser"></i>
                            Excluir
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
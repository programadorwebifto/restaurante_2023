<div class="register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?=action(\Controllers\Home::class)?>" class="h1"><?=APPLICATION_NAME?></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Formulário de cadastro</p>

                <form action="<?= action(\Controllers\Usuarios\Cadastro::class, 'salvar', 'POST');?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirmacao" placeholder="Repetir Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    Aceeito os <a href="#">termos de serviço</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="<?=action(\Controllers\Home::class)?>" class="text-center">Eu já possuo cadastro</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</div>
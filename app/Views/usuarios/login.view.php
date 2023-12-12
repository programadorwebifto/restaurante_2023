<div class="login-page">
    <div class="login-box">
        <div class="login-logo font-weight-bold text-purple">
            <?= APPLICATION_NAME ?>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h2 class="text-center border-bottom pb-2">Login</h2>

                <form action="<?= action(Controllers\Usuarios\Login::class, 'logar', 'POST') ?>" method="post">
                    <div class="input-group my-3">
                        <input type="text" name="cpf" class="form-control" placeholder="CPF">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Lembre-me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="#">Esqueci minha senha</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
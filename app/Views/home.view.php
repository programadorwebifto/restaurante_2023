<div class="container-fluid">
    <div class="row">
        <?php for ($mesa = 1; $mesa <= N_MESAS; $mesa++):
            $status = (array_key_exists($mesa, $mesas)) ? 'ocupada' : 'livre';    
        ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2" >
                <!-- Default box -->
                <div class="card card-outline card-<?=($status == 'livre')?'danger':'success'?> text-center">
                    <div class="card-body">
                        <h3>Mesa <?php echo $mesa ?></h3>
                        <img src="<?= assets("images/mesas/$status.png") ?>">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= action(\Controllers\Home::class,'atendimento','GET',['mesa'=>$mesa])?>" class="btn btn-primary"><i class="fas fa-bars"></i></a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        <?php endfor; ?>
    </div>
</div>
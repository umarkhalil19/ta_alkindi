<section role="main" class="content-body">
    <header class="page-header">
        <h2>Ubah Password</h2>
    </header>
    <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
    endif; ?>
    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open('atasan/change_pass_act', ['class' => 'form-horizontal']); ?>
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Form Ubah Password</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Passowrd Baru<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="new_pass1" class="form-control" placeholder="" required />
                            <?php echo form_error('new_pass1', '<small><span class="text-danger">', '</span></small>') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Konfirmasi Password Baru<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="new_pass2" class="form-control" placeholder="" required />
                            <?php echo form_error('new_pass2', '<small><span class="text-danger">', '</span></small>') ?>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary">Ubah Password</button>
                        </div>
                    </div>
                </footer>
            </section>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- end: page -->
</section>
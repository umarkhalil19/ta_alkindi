<section role="main" class="content-body">
    <header class="page-header">
        <h2>Daftar</h2>
    </header>

    <p class="alert alert-primary"><b>Pemberitahuan !!!</b><br>Untuk dapat melakukan pendaftaran ke sistem anda harus mendaftar akun terlebih dahulu<br>Silahkan lengkapi data berikut untuk melakukan pendaftaran akun.</p>
    <br>
    <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
endif; ?>
    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open('front/daftar_act',['class'=>'form-horizontal']); ?>  
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Form Pendaftaran Akun</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIK <span class="">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="nik" class="form-control"  maxlength="16" />
                                <?php echo form_error('nik','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama<span class="">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control"  />
                                <?php echo form_error('nama','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control"  />
                                <?php echo form_error('email','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No HP <span class="">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="no_hp" class="form-control" />
                                <?php echo form_error('no_hp','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password<span class="">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="pass" class="form-control" value="lapor_lhokseumawe"  />
                                <input type="password" name="pass1" class="form-control" value="lapor_lhokseumawe" disabled />
                                <p><i>Default Password : lapor_lhokseumawe</i></p>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" />
                                </div>
                            </div>
                            <div class="col-sm-9">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">GitHub</label>
                            <div class="col-sm-9">
                                <input type="url" name="github" class="form-control" placeholder="eg.: https://github.com/johndoe" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Skills <span class="">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="skills" rows="5" class="form-control" placeholder="Describe your skills" ></textarea>
                            </div>
                        </div> -->
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </footer>
                </section>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- end: page -->
</section>
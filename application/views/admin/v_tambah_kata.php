<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Kata Kunci</h2>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open('admin/tambah_kata_act',['class'=>'form-horizontal']); ?>  
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Form Tambah Kata Kunci</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kata Kunci <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="kata" class="form-control" placeholder="Kata Kunci" required autocomplete="off"/>
                                <?php echo form_error('kata','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kata Kunci <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select name="komisi" class="form-control" required>
                                    <option value="">Pilih Komisi</option>
                                    <?php foreach ($komisi->result() as $k) {
                                       echo '<option value="'.$k->komisi_id.'">'.$k->komisi_nama.'</option>';
                                    } ?>
                                </select>
                                <?php echo form_error('kata','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" required/>
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
                            <label class="col-sm-3 control-label">Skills <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="skills" rows="5" class="form-control" placeholder="Describe your skills" required></textarea>
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
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Operator</h2>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open('admin/update_operator',['class'=>'form-horizontal']); ?>  
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Form Tambah Data Operator</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" class="form-control" required value="<?php echo $operator->user_id?>"/>
                                <input type="text" name="nama" class="form-control" required value="<?php echo $operator->user_name?>"/>
                                <?php echo form_error('nama','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" required value="<?php echo $operator->user_email?>"/>
                                <?php echo form_error('email','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Komisi<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select name="komisi" class="form-control">
                                    <?php
                                        switch ($operator->user_level) {
                                            case '99':
                                                $akses = 'Admin';
                                                break;
                                            case '1':
                                                $akses = 'Operator';
                                                break;
                                            default:
                                                break;
                                        } 
                                        $km = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$operator->user_komisi'");
                                        if ($km->num_rows() == 0) {
                                            $km1 = "Admin Sistem";
                                        }else{
                                            $km2 = $km->row();
                                            $km1 = $km2->komisi_nama;    
                                        }
                                    ?>
                                    <option value="<?php echo $operator->user_komisi?>"><?php echo $km1?></option>
                                    <option value="">Pilih Komisi</option>
                                    <option value="0">Admin Sistem</option>
                                    <?php 
                                        foreach ($komisi->result() as $k) {
                                            echo '<option value="'.$k->komisi_id.'">'.$k->komisi_nama.'</option>';
                                        }
                                    ?>
                                </select>
                                <?php echo form_error('komisi','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Username<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" required value="<?php echo $operator->user_login?>"/>
                                <?php echo form_error('username','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="pass" class="form-control"/>
                                <span><i>Abaikan jika tidak ada perubahan</i></span>
                                <?php echo form_error('pass','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hak Akses<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select name="level" class="form-control">
                                    <option value="<?php echo $operator->user_level?>"><?php echo $akses?></option>
                                    <option value="">Pilih Level</option>
                                    <option value="99">Admin</option>
                                    <option value="1">Operator</option>
                                </select>
                                <?php echo form_error('level','<small><span class="text-danger">', '</span></small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                    <option value="<?php echo $operator->user_status?>"><?php echo $operator->user_status?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                <?php echo form_error('status','<small><span class="text-danger">', '</span></small>') ?>
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
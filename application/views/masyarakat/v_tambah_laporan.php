<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Laporan</h2>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart('masyarakat/tambah_laporan_act', ['class' => 'form-horizontal']); ?>
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Form Tambah Laporan</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Judul Laporan<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="judul" class="form-control" placeholder="" required />
                            <?php echo form_error('laporan', '<small><span class="text-danger">', '</span></small>') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Laporan<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="laporan" class="form-control" rows="10"></textarea>
                            <?php echo form_error('laporan', '<small><span class="text-danger">', '</span></small>') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bukti Dokumen<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="file_bukti" class="form_control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Komisi Tujuan<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="komisi" class="form-control" id="" disabled="disabled">
                                <option value="">Pilih Komisi</option>
                            </select><br>
                            <p class="alert alert-primary"><b>Perhatian !!!</b><br>Anda tidak perlu memilih komisi tujuan laporan anda, sistem kami akan memilih berdasarkan laporan yang anda sampaikan.</p>
                        </div>
                    </div>
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
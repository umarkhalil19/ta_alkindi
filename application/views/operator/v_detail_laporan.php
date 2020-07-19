<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Laporan</h2>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Data Laporan</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Judul Laporan<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <label class="control-label"><b><?php echo ': ' . $laporan->laporan_judul ?></b></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Laporan<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <label class="control-label" style="text-align: justify"><b><?php echo ': ' . $laporan->laporan_isi ?></b></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Komisi Tujuan<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <?php $nama = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$laporan->laporan_komisi'")->row(); ?>
                            <label class="control-label"><b><?php echo ': ' . $nama->komisi_nama ?></b></label>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <a href="<?php echo base_url() . 'operator/laporan' ?>" class="btn btn-warning"><span class="fa fa-arrow-left"> Kembali</span></a>
                            <?php
                            if ($laporan->laporan_status < 1) {
                            ?>
                                <a href="<?php echo base_url() . 'operator/proses_laporan/' . $laporan->laporan_id ?>" class="btn btn-primary"><span class="fa fa-check"> Proses</span></a>
                            <?php
                            } elseif ($laporan->laporan_status = 1 && $laporan->laporan_hari_proses >= 2) {
                            ?>
                                <a href="<?php echo base_url() . 'operator/laporan_selesai/' . $laporan->laporan_id ?>" class="btn btn-primary"><span class="fa fa-check"> Selesai</span></a>
                            <?php } ?>
                        </div>
                    </div>
                </footer>
            </section>
            <?php echo form_close(); ?>
        </div>
    </div>
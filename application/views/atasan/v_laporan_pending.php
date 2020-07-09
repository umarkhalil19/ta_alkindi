<section role="main" class="content-body">
    <header class="page-header">
        <h2>laporan Lewat Tenggat Waktu</h2>
    </header>
    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Data Laporan Lewat Tenggat Waktu</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Komisi Tujuan</th>
                        <th>Tanggal Laporan Masuk</th>
                        <th>Bukti Dokumen</th>s
                        <!-- <th>Status Laporan</th> -->
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($laporan->result() as $l) {
                        $nama = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$l->laporan_komisi'")->row();
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $l->laporan_judul ?></td>
                            <td><?php echo $nama->komisi_nama ?></td>
                            <td><?php echo TanggalIndo($l->laporan_tanggal_masuk) ?></td>
                            <!-- <td><?php //echo $status 
                                        ?></td> -->
                            <td align="center"><a href="<?php echo base_url() . 'dokumen/' . $l->laporan_bukti ?>" class="btn btn-sm btn-primary" target="_blank">Dokumen</a></td>
                            <td>
                                <a href="<?php echo base_url() . 'atasan/detail_laporan/' . $l->laporan_id ?>" class="btn btn-primary"><span class="fa fa-info-circle"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end: page -->
</section>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>laporan Diproses</h2>
    </header>
    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Data Laporan Diproses</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Komisi Tujuan</th>
                        <th>Tanggal Laporan Masuk</th>
                        <th>Tanggal Laporan Diproses</th>
                        <th>Laporan Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($laporan->result() as $l) {
                        $nama = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$l->laporan_komisi'")->row();
                        $cek = $this->db->query("SELECT laporan_hari_proses FROM v_laporan WHERE laporan_id = $l->laporan_id")->row();
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $l->laporan_judul ?></td>
                            <td><?php echo $nama->komisi_nama ?></td>
                            <td><?php echo TanggalIndo($l->laporan_tanggal_masuk) ?></td>
                            <td><?php echo TanggalIndo($l->laporan_tanggal_proses) ?></td>
                            <!-- <td align="center"><a href="<?php //echo base_url() . 'dokumen/' . $l->laporan_bukti 
                                                                ?>" class="btn btn-sm btn-primary" target="_blank">Dokumen</a></td> -->
                            <td>
                                <?php
                                if ($cek->laporan_hari_proses < 2) {
                                    echo '<p class="alert alert-warning">Laporan Sedang Di Proses</p>';
                                } elseif ($cek->laporan_hari_proses >= 2 && $l->laporan_status == 1) {
                                    echo '<a href="' . base_url() . "masyarakat/laporan_selesai/" . $l->laporan_id . '" class="btn btn-primary">Selesai</a>';
                                } elseif ($l->laporan_status == 2) {
                                    echo '<p class="alert alert-success">Laporan Selesai</p>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . 'masyarakat/detail_laporan/' . $l->laporan_id ?>" class="btn btn-primary"><span class="fa fa-info-circle"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end: page -->
</section>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Data Laporan</h2>
    </header>
    <!-- start: page -->
    <section class="panel">

        <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
        endif; ?>
        <header class="panel-heading">
            <h2 class="panel-title">Data Laporan Masyarakat (<?php echo $nama->masyarakat_nama; ?>)</h2>
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
                        <th>Status Laporan</th>
                        <th>Bukti Dokumen</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($laporan->result() as $l) {
                        $nama = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$l->laporan_komisi'")->row();
                        switch ($l->laporan_status) {
                            case '0':
                                $status = "Diterima";
                                $tgl_proses = "-";
                                break;
                            case '1':
                                $status = "Diproses";
                                $tgl_proses = TanggalIndo($l->laporan_tanggal_proses);
                                break;
                            default:
                                break;
                        }
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $l->laporan_judul ?></td>
                            <td><?php echo $nama->komisi_nama ?></td>
                            <td><?php echo TanggalIndo($l->laporan_tanggal_masuk) ?></td>
                            <td><?php echo $tgl_proses ?></td>
                            <td><?php echo $status ?></td>
                            <td align="center"><a href="<?php echo base_url() . 'dokumen/' . $l->laporan_bukti ?>" class="btn btn-sm btn-primary" target="_blank">Dokumen</a></td>
                            <td>
                                <a href="<?php echo base_url() . 'admin/detail_laporan/' . $l->laporan_id ?>" class="btn btn-primary"><span class="fa fa-info-circle"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end: page -->
</section>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua Laporan</h2>
    </header>
    <!-- start: page -->
    <section class="panel">

        <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
        endif; ?>

        <?php if ($laporan->num_rows() == 0) {
            echo '<p class="alert alert-primary"><b>Pemberitahuan !!!</b><br>Sistem mendeteksi bahwa anda adalah pengguna baru, ayo mulai melapor sekarang dengan menekan tombol di bawah ini<br><a href="' . base_url() . 'masyarakat/tambah_laporan' . '" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Laporan pertama</a></p>';
        } ?>
        <header class="panel-heading">
            <?php
            if ($laporan->num_rows() != 0) {
                echo '<a href="' . base_url() . 'masyarakat/tambah_laporan' . '" class="btn btn-sm btn-primary pull-right"><span class="fa fa-plus"></span> Tambah laporan</a>';
            }
            ?>
            <h2 class="panel-title">Data Semua Laporan</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Komisi Tujuan</th>
                        <th>Tanggal Laporan</th>
                        <th>Bukti Dokumen</th>
                        <!-- <th>Status Laporan</th> -->
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($laporan->result() as $l) {
                        $nama = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$l->laporan_komisi'")->row();
                        // switch ($l->laporan_status) {
                        //     case '0':
                        //         $status = "Diterima";
                        //         break;
                        //     case '1':
                        //         $status = "Ditidaklanjuti";
                        //         break;
                        //     default:
                        //         break;
                        // }
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
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Hasil Perhitungan</h2>
    </header>
    <!-- start: page -->
        <section class="panel">
            
    <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
endif; ?>
            <header class="panel-heading">
                <h2 class="panel-title">Data Hasil Perhitungan</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Judul Laporan</label>
                    <div class="col-sm-9">
                        <input type="text" disabled name="judul" class="form-control" value="<?php echo $this->session->userdata('judul') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Laporan</label>
                    <div class="col-sm-9">
                        <textarea name="laporan" disabled class="form-control" rows="10"><?php echo $this->session->userdata('laporan'); ?></textarea>
                        <?php echo form_error('laporan','<small><span class="text-danger">', '</span></small>') ?>
                    </div>
                </div>
                <br>
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kata Yang Muncul</th>
                            <th>Frekuensi Kata</th>
                            <th>Komisi</th>
                            <th>Nilai Naive Bayes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($temp->result() as $t) {
                                $n = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$t->komisi_id'")->row();
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $t->kata?></td>
                            <td><?php echo $t->kata_frekuensi?></td>
                            <td><?php echo $n->komisi_nama?></td>
                            <td><?php echo $t->nilai_algoritma_nb?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <br>
                <h2>Hasil Perhitungan Algoritma Naive Bayes Untuk Semua Komisi</h2>
                <?php 
                    $k = $this->db->query("SELECT komisi_id,komisi_nama FROM tbl_komisi");
                    foreach ($k->result() as $k) {
                        $data = $this->db->query("SELECT nilai_algoritma_nb FROM tbl_temp WHERE komisi_id=$k->komisi_id");
                        $total = 0;
                        foreach ($data->result() as $d) {
                            $total = $total + $d->nilai_algoritma_nb;
                        }
                        $array[$k->komisi_id] = $total;
                        echo '<p>Hasil Perhitungan Untuk '.$k->komisi_nama.' = '.$total.'</p>';
                    }
                    $nilai = max($array);
                    $komisi = array_search($nilai, $array);
                    $nama_komisi = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$komisi'")->row();
                    echo '<h6> Dari hasil diatas di dapat bahwa nilai dari <b>'.$nama_komisi->komisi_nama.'</b> merupakan nilai terbesar dengan total nilai : <b>'.$nilai.'</b> sehingga laporan ini akan di teruskan ke <b>'.$nama_komisi->komisi_nama.'</b></h6>';
                    $data_laporan = [
                        'judul' => $this->session->userdata('judul'),
                        'isi' => $this->session->userdata('laporan'),
                        'komisi' => $komisi,
                        'nilai' => $nilai 
                    ];
                    $this->session->set_userdata($data_laporan);
                    // $this->session->unset_userdata($isi_laporan);
                ?>
                <a href="<?php echo base_url().'masyarakat/laporan_benar'?>" class="btn btn-sm btn-success pull-right"><span class="fa fa-check"></span> Benar</a>
                <a href="<?php echo base_url().'masyarakat/laporan_salah'?>" class="btn btn-sm btn-danger "><span class="fa fa-times"></span> Salah</a>
            </div>
        </section>
    <!-- end: page -->
</section>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Kata Kunci</h2>
    </header>
    <!-- start: page -->
    <section class="panel">

        <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
        endif; ?>
        <header class="panel-heading">
            <a href="<?php echo base_url('operator/tambah_kata') ?>" class="btn btn-sm btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data</a>
            <h2 class="panel-title">Data Kata Kunci</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kata</th>
                        <th>Komisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kata->result() as $k) {
                        $komisi = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$k->komisi_id'")->row();
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $k->kata ?></td>
                            <td><?php echo $komisi->komisi_nama ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'operator/delete_kata/' . $k->kata_id ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
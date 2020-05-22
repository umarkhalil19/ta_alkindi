<section role="main" class="content-body">
    <header class="page-header">
        <h2>Masyarakat</h2>
    </header>
    <!-- start: page -->
    <section class="panel">

        <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
        endif; ?>
        <header class="panel-heading">
            <!-- <a href="<?php //echo base_url('admin/tambah_komisi') 
                            ?>" class="btn btn-sm btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data</a> -->
            <h2 class="panel-title">Data Masyarakat</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($masyarakat->result() as $m) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $m->masyarakat_nama ?></td>
                            <td><?php echo $m->masyarakat_email ?></td>
                            <td><?php echo $m->masyarakat_no_hp ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'admin/masyarakat_laporan/' . $m->masyarakat_id ?>" class="btn btn-primary"><span class="fa fa-list"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end: page -->
</section>
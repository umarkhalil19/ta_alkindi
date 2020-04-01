<section role="main" class="content-body">
    <header class="page-header">
        <h2>Komisi</h2>
    </header>
    <!-- start: page -->
        <section class="panel">
            
    <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
endif; ?>
            <header class="panel-heading">
                <a href="<?php echo base_url('admin/tambah_komisi') ?>" class="btn btn-sm btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data</a>
                <h2 class="panel-title">Basic</h2>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Komisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($komisi->result() as $k) {
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $k->komisi_nama?></td>
                            <td>
                                <a href="<?php echo base_url().'admin/edit_komisi/'.$k->komisi_id?>" class="btn btn-primary"><span class="fa fa-wrench"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </section>
    <!-- end: page -->
</section>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Operator</h2>
    </header>
    <!-- start: page -->
        <section class="panel">
            
    <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
endif; ?>
            <header class="panel-heading">
                <a href="<?php echo base_url('admin/tambah_operator') ?>" class="btn btn-sm btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data</a>
                <h2 class="panel-title">Data Operator</h2>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <!-- <th>Email</th> -->
                            <th>Komisi</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($operator->result() as $o) {
                                switch ($o->user_level) {
                                    case '99':
                                        $akses = 'Admin';
                                        break;
                                    case '1':
                                        $akses = 'Operator';
                                        break;
                                    default:
                                        break;
                                }
                                $komisi = $this->db->query("SELECT komisi_nama FROM tbl_komisi WHERE komisi_id='$o->user_komisi'");
                                if ($cek = $komisi->num_rows() > 0) {
                                    $k = $komisi->row();
                                    $ko = $k->komisi_nama;
                                }else{
                                    $ko = 'Admin';
                                }
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $o->user_name?></td>
                            <!-- <td><?php //echo $o->user_email ?></td> -->
                            <td><?php echo $ko ?></td>
                            <td><?php echo $o->user_login ?></td>
                            <td><?php echo $akses ?></td>
                            <td>
                                <?php 
                                    if ($o->user_id != 1) {
                                        echo '<a href="'.base_url().'admin/edit_operator/'.$o->user_id.'" class="btn btn-primary"><span class="fa fa-wrench"></span></a>
                                        <a href="'.base_url().'admin/hapus_operator/'.$o->user_id.'" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>';
                                    }else{
                                        echo 'No Action';
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </section>
    <!-- end: page -->
</section>
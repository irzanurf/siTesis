                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Daftar Ujian Tesis</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                        <a href="<?=base_url('Admin/tambah_ujian');?>"><button class='btn btn-info'><i class="fa fa-plus"></i> Tambah</button></a>
                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Ujian Tesis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    foreach($view as $v) { 
                                        $tgl = date('d-m-Y', strtotime($v->tgl));?>
                                        <tr>
                                            <td><?= $v->nama ?> (<?= $v->nim ?>)</td>
                                            <td><?= $v->judul ?></td>
                                            <td><?= $tgl ?></td>
                                            <td>
                                            <?php if (($v->status)=="" || ($v->status)==0 || ($v->status)==NULL) :?> 
                                                <form style="display:inline-block;" method="post" action="<?= base_url('admin/edit_ujian');?>">
                                                <input type='hidden' name="id" value="<?= $v->id_tesis ?>">
                                                <button type="Submit" class="btn btn-success">
                                                Edit
                                                </button>
                                                </form>
                                             <?php else :?>
                                            <?php endif;?>

                                                <form style="display:inline-block;" method="post" action="<?= base_url('admin/detail_ujian');?>">
                                                <input type='hidden' name="id" value="<?= $v->id_tesis ?>">
                                                <button type="Submit" class="btn btn-info">
                                                Detail
                                                </button>
                                                </form>

                                                <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="<?= base_url('admin/delete_ujian');?>">
                                                <input type='hidden' name="id" value="<?= $v->id_tesis ?>">
                                                <button type="Submit" class="btn btn-danger">
                                                Hapus
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin melakukan Log Out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Log Out" apabila Anda ingin mengakhiri season.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('welcome/logout');?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Universitas Diponegoro 2021</span></div>
            </div>
        </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/main/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/main/vendor/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/main/js/demo/datatables-demo.js');?>"></script>

</body>

</html>
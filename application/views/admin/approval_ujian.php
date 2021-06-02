
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Daftar Ujian Tesis</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                        <p>Keterangan: <br> <b>ACC A</b> = Lulus tanpa perbaikan<br>
                                <b>ACC B</b> = Lulus elektro setelah membuat pembetulan kecil seperti kesalahan pengetikan dan tata bahasa<br>
                                <b>ACC C</b> = Lulus setelah membuat perbaikan isi tesis dan tata bahasa sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini<br>
                                <b>ACC D</b> = Tidak lulus, tetapi berhak untuk mengajukan ujian ulang setelah melakukan pembetulan, perbaikan, dan kajian atau penelitian ulang sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini
                                </p>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Tanggal Ujian Tesis</th>
                                            <th>Status</th>
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
                                            <td><?= $v->status ?></td>
                                            <td>
                                            <?php if (($v->status)=="Graded") :?>
                                                <form style="display:inline-block;" method="post" action="<?= base_url('admin/SetApprovalUjian');?>">
                                                <input type='hidden' name="id" value="<?= $v->id_tesis ?>">
                                                <button type="Submit" class="btn btn-success">
                                                Approval
                                                </button>
                                                </form>
                                            
                                            <?php else : ?>
                                                <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Melakukan Cancel?');" action="<?= base_url('admin/cancelApprovalUjian');?>">
                                                <input type='hidden' name="id" value="<?= $v->id_tesis ?>">
                                                <button type="Submit" class="btn btn-danger">
                                                Cancel Approval
                                                </button>
                                                </form>

                                            <?php endif ?>
                                                <form style="display:inline-block;" method="post" action="<?= base_url('admin/ba_ujian');?>">
                                                <input type='hidden' name="id" value="<?= $v->id_tesis ?>">
                                                <button type="Submit" class="btn btn-info">
                                                Berita Acara
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
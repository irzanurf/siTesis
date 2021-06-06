<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Detail Seminar Proposal</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->                                
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>

                                <div class="form-group">
                                    <label>Mahasiswa</label>
                                    <input class="form-control" name="nama" value="<?= $tesis->nama?>" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nim" value="<?= $tesis->nim?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul" value="<?= $tesis->judul?>" readonly>
                                </div>

                                <?php $tgl = date('d-m-Y', strtotime($view->tgl));?>

                                <div class="form-group">
                                    <label>Tanggal Seminar Proposal</label>
                                    <input class="form-control" name="tgl" value="<?= $tgl?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Seminar Proposal/Link Seminar Proposal</label>
                                    <input class="form-control" name="tempat" value="<?= $view->tempat?>" readonly>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji3->nama)): ?>
                                    <label>Pembimbing Ketua/Penguji 1 </label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji1->nama?>" readonly>
                                    <?php else: ?>
                                    <label>Pembimbing Ketua/Penguji 1 </label>
                                    <input class="form-control" name="penguji1" value="-" readonly>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji3->nama)): ?>
                                    <label>Pembimbing Anggota/Penguji 2 </label>
                                    <input class="form-control" name="penguji2" value="<?= $penguji2->nama?>" readonly>
                                    <?php else: ?>
                                    <label>Pembimbing Anggota/Penguji 2 </label>
                                    <input class="form-control" name="penguji2" value="-" readonly>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji3->nama)): ?>
                                    <label>Penguji 3 </label>
                                    <input class="form-control" name="penguji3" value="<?= $penguji3->nama?>" readonly>
                                    <?php else: ?>
                                    <label>Penguji 3 </label>
                                    <input class="form-control" name="penguji3" value="-" readonly>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php if(!empty($penguji4->nama)): ?>
                                    <label>Penguji 4 </label>
                                    <input class="form-control" name="penguji4" value="<?= $penguji4->nama?>" readonly>
                                    <?php else: ?>
                                    <label>Penguji 4 </label>
                                    <input class="form-control" name="penguji4" value="-" readonly>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php if(!empty($penguji5->nama)): ?>
                                    <label>Penguji 5 </label>
                                    <input class="form-control" name="penguji5" value="<?= $penguji5->nama?>" readonly>
                                    <?php else: ?>
                                    <label>Penguji 5 </label>
                                    <input class="form-control" name="penguji5" value="-" readonly>
                                    <?php endif; ?>
                                </div> 
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>
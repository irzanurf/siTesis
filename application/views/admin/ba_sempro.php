<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Berita Acara Seminar Proposal</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/print_sempro');?>

                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-download"></i> Download</button>
                                </div>
                                
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>
                                <div class="form-group">
                                    <textarea style="display:none;" class="form-control" name="penguji1"><?= $penguji1->nama?></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea style="display:none;" class="form-control" name="penguji2"><?= $penguji2->nama?></textarea>
                                </div>
                                <?php if (empty($penguji3->nama)) : ?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="penguji3" value="-"  >
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                <textarea style="display:none;" class="form-control" name="penguji3"><?= $penguji3->nama?></textarea>
                                </div>
                                <?php endif; ?>

                                <?php if (empty($penguji4->nama)) : ?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="penguji4" value="-"  >
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                <textarea style="display:none;" class="form-control" name="penguji4"><?= $penguji4->nama?></textarea>
                                </div>
                                <?php endif; ?>

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
                                <?php $a=$penguji1->nilai ?>
                                    <label>Pembimbing Ketua/Penguji 1 (<?= $penguji1->nama?>)</label>
                                    <input class="form-control" name="nilai1" value="<?= $penguji1->nilai?>" readonly>
                                    <textarea class="form-control" name="cat1" readonly><?= $penguji1->catatan?></textarea>
                                </div>

                                <div class="form-group">
                                <?php $a=$a+($penguji2->nilai) ?>
                                    <label>Pembimbing Anggota/Penguji 2 (<?= $penguji2->nama?>)</label>
                                    <input class="form-control" name="nilai2" value="<?= $penguji2->nilai?>" readonly>
                                    <textarea class="form-control" name="cat2" readonly><?= $penguji2->catatan?></textarea>
                                </div>

                                <div class="form-group">
                                <?php 
                                    if(empty($penguji3->nama)) :?>
                                    <label>Penguji 3</label>
                                    <input class="form-control" name="cat3" value="-" readonly>
                                    <textarea class="form-control" name="cat3" readonly></textarea>

                                    <?php
                                    else : ?>
                                     <?php $a=$a+($penguji3->nilai) ?>
                                    <label>Penguji 3 (<?= $penguji3->nama?>)</label>
                                    <input class="form-control" name="nilai3" value="<?= $penguji3->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat3" readonly><?= $penguji3->catatan?></textarea>

                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php 
                                    if(empty($penguji4->nama)) :?>
                                    <label>Penguji 4</label>
                                    <input class="form-control" name="nilai4" value="-" readonly>
                                    <textarea class="form-control" name="cat4" readonly></textarea>

                                    <?php
                                    else : ?>
                                     <?php $a=$a+($penguji4->nilai) ?>
                                    <label>Penguji 4 (<?= $penguji4->nama?>)</label>
                                    <input class="form-control" name="nilai4" value="<?= $penguji4->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat4" readonly><?= $penguji4->catatan?></textarea>

                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php if (empty($penguji3->nama) && empty($penguji4->nama)) : $a=$a/2 ?>
                                <?php elseif (!empty($penguji3->nama) && empty($penguji4->nama)) : $a=$a/3 ?>
                                <?php elseif (empty($penguji3->nama) && !empty($penguji4->nama)) : $a=$a/3 ?>
                                <?php elseif (!empty($penguji3->nama) && !empty($penguji4->nama)) : $a=$a/4 ?>
                                <?php endif; ?>
                                    <label>Nilai Total</label>
                                    <?php $a=number_format($a,2); ?>
                                    <input class="form-control" name="total" value="<?= $a?>" readonly>
                                </div>
                                
                                <div class="form-group"><label>Keputusan jenis rekomendasi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select style="pointer-events: none;" class="form-control" name="app" id="app" required="">
                                        <?php
                                        foreach ($app as $a) {
                                            ?>
                                            <option value="<?php echo $a->ket; ?>"<?php echo ($view->status==$a->app) ? "selected='selected'" : "" ?>><?php echo $a->ket; ?>  </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <p>Keterangan: <br> <b>ACC A</b> = Lulus dan berhak melanjutkan proposal tesis dan penelitian untuk menghasilkan tesis<br>
                                <b>ACC B</b> = Lulus dan berhak melanjutkan proposal tesis dan penelitian setelah membuat pembetulan kecil<br>
                                <b>ACC C</b> = Lulus dan berhak berhak melanjutkan proposal tesis dan penelitian setelah membuat perbaikan sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini<br>
                                <b>ACC D</b> = Tidak lulus, tetapi berhak untuk mengajukan seminar ulang setelah melakukan pembetulan, perbaikan, dan kajian atau penelitian pendahuluan ulang sebagaimana tertera dalam lampiran perbaikan yang tidak terpiah dari berita acara ini
                                </p>
                               
                                
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>
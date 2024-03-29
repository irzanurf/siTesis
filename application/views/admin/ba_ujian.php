<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Berita Acara Ujian Tesis</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/print_ujian');?>
                                <div class="form-group">
                                    <button name="button" value="1" type="submit" id="submit" class="btn btn-primary"><i class="fa fa-download"></i> Berita acara untuk pengelola</button>
                                
                                    <button name="button" value="2" type="submit" id="submit" class="btn btn-success"><i class="fa fa-download"></i> Berita acara dan saran untuk mahasiswa</button>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>
                                <div class="form-group">
                                    <textarea style="display:none;" class="form-control" name="penguji1"><?= $penguji1->nama?></textarea>
                                </div>
                                <div class="form-group">
                                    <input style="display:none;" class="form-control" name="nip_penguji1" value="<?= $penguji1->username?>">
                                </div>

                                <?php if (empty($penguji2->nama)) : ?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="penguji2" value="-"  >
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                <textarea style="display:none;" class="form-control" name="penguji2"><?= $penguji2->nama?></textarea>
                                </div>
                                <?php endif; ?>

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

                                <?php if (empty($penguji5->nama)) : ?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="penguji5" value="-"  >
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                <textarea style="display:none;" class="form-control" name="penguji5"><?= $penguji5->nama?></textarea>
                                </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label>Mahasiswa</label>
                                    <input class="form-control" name="nama" value="<?= $tesis->nama ?>" readonly>
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
                                    <label>Tempat Ujian Tesis/Link Ujian Tesis</label>
                                    <input class="form-control" name="tempat" value="<?= $view->tempat?>" readonly>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji1->nama)): ?>
                                    <label>Pembimbing Ketua/Penguji 1 <b>(<?= $penguji1->nama?>)</b></label>
                                    <?php else: ?>
                                    <label>Pembimbing Ketua/Penguji 1 <b>(-)</b></label>
                                    <?php endif; ?>
                                    <?php 
                                    if(empty($penguji1->nilai) || ($penguji1->nilai)==0) : ?>
                                    <input class="form-control" name="nilai1" value="-" readonly>
                                    
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="nilai1" value="<?= $penguji1->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat1" readonly><?= $penguji1->catatan?></textarea>
                                    <input type="hidden" class="form-control" name="file1" value="<?= $penguji1->file?>">
                                    
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji2->nama)): ?>
                                    <label>Pembimbing Anggota/Penguji 2 <b>(<?= $penguji2->nama?>)</b></label>
                                    <?php else: ?>
                                    <label>Pembimbing Anggota/Penguji 2 <b>(-)</b></label>
                                    <?php endif; ?>
                                    <?php 
                                    if(empty($penguji2->nilai) || ($penguji2->nilai)==0) : ?>
                                    <input class="form-control" name="nilai2" value="" readonly>
                                    
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="nilai2" value="<?= $penguji2->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat2" readonly><?= $penguji2->catatan?></textarea>
                                    <input type="hidden" class="form-control" name="file2" value="<?= $penguji2->file?>">
                                    
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji3->nama)): ?>
                                    <label>Penguji 3 <b>(<?= $penguji3->nama?>)</b></label>
                                    <?php else: ?>
                                    <label>Penguji 3 <b>(-)</b></label>
                                    <?php endif; ?>
                                    <?php 
                                    if(empty($penguji3->nilai) || ($penguji3->nilai)==0) : ?>
                                    <input class="form-control" name="penguji3" value="" readonly>
                                    
                                    <?php
                                    else :?>
                                    <input class="form-control" name="nilai3" value="<?= $penguji3->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat3" readonly><?= $penguji3->catatan?></textarea>
                                    <input type="hidden" class="form-control" name="file3" value="<?= $penguji3->file?>">
                                    
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji4->nama)): ?>
                                    <label>Penguji 4 <b>(<?= $penguji4->nama?>)</b></label>
                                    <?php else: ?>
                                    <label>Penguji 4 <b>(-)</b></label>
                                    <?php endif; ?>
                                    <?php 
                                    if(empty($penguji4->nilai) || ($penguji4->nilai)==0) : ?>
                                    <input class="form-control" name="penguji4" value="" readonly>
                                    
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="nilai4" value="<?= $penguji4->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat4" readonly><?= $penguji4->catatan?></textarea>
                                    <input type="hidden" class="form-control" name="file4" value="<?= $penguji4->file?>">
                                    
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <?php if(!empty($penguji5->nama)): ?>
                                    <label>Penguji 5 <b>(<?= $penguji5->nama?>)</b></label>
                                    <?php else: ?>
                                    <label>Penguji 5 <b>(-)</b></label>
                                    <?php endif; ?>
                                    <?php 
                                    if(empty($penguji5->nilai) || ($penguji5->nilai)==0) : ?>
                                    <input class="form-control" name="penguji5" value="" readonly>
                                    
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="nilai5" value="<?= $penguji5->nilai ?>" readonly>
                                    <textarea class="form-control" name="cat5" readonly><?= $penguji5->catatan?></textarea>
                                    <input type="hidden" class="form-control" name="file5" value="<?= $penguji5->file?>">

                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <label>Nilai Total</label>
                                    <input class="form-control" name="total" value="<?= $view->nilai ?>" readonly>
                                </div>
                                
                                <div class="form-group"><label>Keputusan jenis rekomendasi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select style="pointer-events: none;" class="form-control" name="app" id="app" required="">
                                        <?php
                                        foreach ($app as $a) {
                                            ?>
                                            <option value="<?php echo $a->ket; ?>"<?php echo ($view->status==$a->app) ? "selected='selected'" : "" ?>><?php echo $a->app; ?>  </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Masa Revisi (Minggu)</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input type="float" class="form-control" name="lama" value="<?= $view->lama?>" readonly>
                                </div>

                                <p>Keterangan: <br> <b>ACC A</b> = Lulus tanpa perbaikan<br>
                                <b>ACC B</b> = Lulus elektro setelah membuat pembetulan kecil seperti kesalahan pengetikan dan tata bahasa<br>
                                <b>ACC C</b> = Lulus setelah membuat perbaikan isi tesis dan tata bahasa sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini<br>
                                <b>ACC D</b> = Tidak lulus, tetapi berhak untuk mengajukan ujian ulang setelah melakukan pembetulan, perbaikan, dan kajian atau penelitian ulang sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini
                                </p>
                               
                                
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>
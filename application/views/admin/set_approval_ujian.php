<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Approval Ujian Tesis</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/add_app_ujian');?>
                                
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>
                                <div class="form-group">
                                    <label>Mahasiswa</label>
                                    <input class="form-control" name="nama-nim" value="<?= $tesis->nama?> (<?= $tesis->nim?>)" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul" value="<?= $tesis->judul?>" disabled>
                                </div>

                                <?php $tgl = date('d-m-Y', strtotime($view->tgl));?>

                                <div class="form-group">
                                    <label>Tanggal Seminar Proposal</label>
                                    <input class="form-control" name="tgl" value="<?= $tgl?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Ujian Tesis/Link Ujian Tesis</label>
                                    <input class="form-control" name="tempat" value="<?= $view->tempat?>" disabled>
                                </div>

                                <div class="form-group">
                                <?php $a=$penguji1->nilai ?>
                                    <label>Pembimbing Ketua/Penguji 1 (<?= $penguji1->nama?>)</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji1->nilai?>" disabled>
                                </div>

                                <div class="form-group">
                                <?php $a=$a+($penguji2->nilai) ?>
                                    <label>Pembimbing Anggota/Penguji 2 (<?= $penguji2->nama?>)</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji2->nilai?>" disabled>
                                </div>

                                <div class="form-group">
                                <?php 
                                    if(empty($penguji3->nama)) :?>
                                    <label>Penguji 3</label>
                                    <input class="form-control" name="penguji1" value="-" disabled>

                                    <?php
                                    else : ?>
                                    <?php $a=$a+($penguji3->nilai) ?>
                                    <label>Penguji 3 (<?= $penguji3->nama?>)</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji3->nilai ?>" disabled>

                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php 
                                    if(empty($penguji4->nama)) :?>
                                    <label>Penguji 4</label>
                                    <input class="form-control" name="penguji1" value="-" disabled>

                                    <?php
                                    else : ?>
                                    <?php $a=$a+($penguji4->nilai) ?>
                                    <label>Penguji 4 (<?= $penguji4->nama?>)</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji4->nilai ?>" disabled>

                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php 
                                    if(empty($penguji5->nama)) :?>
                                    <label>Penguji 5</label>
                                    <input class="form-control" name="penguji1" value="-" disabled>

                                    <?php
                                    else : ?>
                                    <?php $a=$a+($penguji5->nilai) ?>
                                    <label>Penguji 5 (<?= $penguji5->nama?>)</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji5->nilai ?>" disabled>

                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                <?php if (empty($penguji3->nama) && empty($penguji4->nama) && !empty($penguji5->nama)) : $a=$a/3 ?>
                                <?php elseif (!empty($penguji3->nama) && empty($penguji4->nama) && empty($penguji5->nama)) : $a=$a/3 ?>
                                <?php elseif (empty($penguji3->nama) && !empty($penguji4->nama) && empty($penguji5->nama)) : $a=$a/3 ?>
                                <?php elseif (empty($penguji3->nama) && !empty($penguji4->nama) && !empty($penguji5->nama)) : $a=$a/4 ?>
                                <?php elseif (!empty($penguji3->nama) && empty($penguji4->nama) && !empty($penguji5->nama)) : $a=$a/4 ?>
                                <?php elseif (!empty($penguji3->nama) && !empty($penguji4->nama) && empty($penguji5->nama)) : $a=$a/4 ?>
                                <?php elseif (!empty($penguji3->nama) && !empty($penguji4->nama) && !empty($penguji5->nama)) : $a=$a/5 ?>
                                <?php elseif (empty($penguji3->nama) && empty($penguji4->nama) && empty($penguji5->nama)) : $a=$a/2 ?>
                                    <?php endif; ?>
                                    <label>Nilai Total</label>
                                    <?php $a=number_format($a,2); ?>
                                    <input class="form-control" name="total" value="<?= $a?>" readonly>
                                </div>
                                
                                <?php 
                                $cek = $view->status;
                                if($cek==NULL || $cek=="" || $cek=="Graded" ) :?>
                                <div class="form-group"><label>Keputusan jenis rekomendasi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select class="form-control" name="app" id="app" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($app as $a) {
                                            ?>
                                            <option value="<?php echo $a->app; ?>"><?php echo $a->app; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <?php
                                    else : ?>
                                <div class="form-group"><label>Keputusan jenis rekomendasi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select class="form-control" name="app" id="app" required="">
                                        <?php
                                        foreach ($app as $a) {
                                            ?>
                                            <option value="<?php echo $a->app; ?>"<?php echo ($view->status==$a->app) ? "selected='selected'" : "" ?>><?php echo $a->app; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php endif; ?>


                                <div class="form-group">
                                    <label>Masa Revisi (Minggu)</label>
                                    <?php if(empty($view->lama)) :?>
                                    <input type="float" class="form-control" name="lama" >
                                    <?php else :?>
                                    <input type="float" class="form-control" name="lama" value="<?= $view->lama?>">
                                    <?php endif;?>
                                </div>

                                <p>Keterangan: <br> <b>ACC A</b> = Lulus tanpa perbaikan<br>
                                <b>ACC B</b> = Lulus elektro setelah membuat pembetulan kecil seperti kesalahan pengetikan dan tata bahasa<br>
                                <b>ACC C</b> = Lulus setelah membuat perbaikan isi tesis dan tata bahasa sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini<br>
                                <b>ACC D</b> = Tidak lulus, tetapi berhak untuk mengajukan ujian ulang setelah melakukan pembetulan, perbaikan, dan kajian atau penelitian ulang sebagaimana tertera dalam lampiran perbaikan yang tidak terpisah dari berita acara ini
                                </p>
                               
                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>
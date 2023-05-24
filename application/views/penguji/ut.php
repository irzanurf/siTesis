<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Ujian Tesis</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <!-- /.row -->
    <h3><center>Informasi Ujian Tesis</center></h3>
                                <div class="form-group">
                                    <label>Mahasiswa</label>
                                    <input class="form-control" name="nama-nim" value="<?= $tesis->nama?> (<?= $tesis->nim?>)" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul" value="<?= $tesis->judul?>" disabled>
                                </div>

                                <?php $tgl = date('d-m-Y', strtotime($tesis->tgl));?>

                                <div class="form-group">
                                    <label>Tanggal Seminar Proposal</label>
                                    <input class="form-control" name="tgl" value="<?= $tgl?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Seminar Proposal/Link Seminar Proposal</label>
                                    <input class="form-control" name="tempat" value="<?= $tesis->tempat?>" disabled>
                                </div>
    </div>

    <div class="col-lg-6 border-left-primary">
    <!-- /.row -->
                                <h3><center>Informasi Penguji</center></h3>

                                <div class="form-group">
                                    <?php if(!empty($penguji1->nama)): ?>
                                    <label>Pembimbing Ketua/Penguji 1 <b>(<?= $penguji1->nama?>)</b></label>
                                    <?php else: ?>
                                    <label>Pembimbing Ketua/Penguji 1 <b>(-)</b></label>
                                    <?php endif; ?>
                                    <?php 
                                    if(empty($penguji1->nilai) || ($penguji1->nilai)==0) : ?>
                                    <input class="form-control" name="penguji1" value="-" disabled>
                                    
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="penguji1" value="<?= $penguji1->nilai ?>" disabled>
                                    
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
                                    <input class="form-control" name="penguji2" value="-" disabled>
                                    
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="penguji2" value="<?= $penguji2->nilai ?>" disabled>
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
                                    <input class="form-control" name="penguji3" value="-" disabled>
                                    <?php
                                    else :?>
                                    <input class="form-control" name="penguji3" value="<?= $penguji3->nilai ?>" disabled>
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
                                    <input class="form-control" name="penguji4" value="-" disabled>
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="penguji4" value="<?= $penguji4->nilai ?>" disabled>
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
                                    <input class="form-control" name="penguji5" value="-" disabled>
                                    <?php
                                    else : ?>
                                    <input class="form-control" name="penguji5" value="<?= $penguji5->nilai ?>" disabled>
                                    <?php endif; ?>
                                </div>
    <!-- /.row -->
                                </div>
</div>
<hr><div class="row justify-content-md-center">
                                
                                <?php if (empty($v->cek)) :?>
                                <form method="post" action="<?=base_url('Penguji/penilaian_ujian');?>">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Mulai Penilaian</button>
                                </div></div>
                                </form>

                                <?php elseif (!empty($v->cek) && (($v->status)=="" || ($v->status)==0 || ($v->status)==NULL || ($v->status)=="Graded" || empty($v->cek))) :?>
                                <form method="post" action="<?=base_url('Penguji/edit_penilaian_ujian');?>">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-info">Mulai Penilaian</button>
                                </div></div>
                                </form>

                                <?php endif; ?>
        </div>

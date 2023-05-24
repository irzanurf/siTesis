<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Edit Ujian Tesis</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/update_ujian');?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $tesis->id?>  >
                                </div>
                                
                                <div class="form-group">
                                    <label>NIM</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="nim" value="<?= $tesis->nim?>" required="">
                                </div>

                                <div class="form-group">
                                    <label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="nama" value="<?= $tesis->nama?>" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label>Judul Tesis</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" name="judul" row="3" required=""><?= $tesis->judul?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Ujian Tesis</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input type="date" class="form-control" name="tgl" value="<?= $view->tgl?>" required="">
                                </div>

                                <div class="form-group">
                                    <label>Tempat Ujian Tesis/Link Ujian Tesis</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" name="tempat" row="2" required=""><?= $view->tempat?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Pembimbing Ketua dan Penguji 1</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="chosen-select-width" name="dosen1"  required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"<?php echo ($penguji1->id_penguji==$ds->username) ? "selected='selected'" : "" ?>><?php echo $ds->nama; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pembimbing Anggota dan Penguji 2</label>
                                    <select class="chosen-select-width" name="dosen2">
                                    <?php if (empty($penguji2->id_penguji)) : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <?php else : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"<?php echo ($penguji2->id_penguji==$ds->username) ? "selected='selected'" : "" ?>><?php echo $ds->nama; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 3</label>
                                    <select class="chosen-select-width" name="dosen3">
                                    <?php if (empty($penguji3->id_penguji)) : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <?php else : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"<?php echo ($penguji3->id_penguji==$ds->username) ? "selected='selected'" : "" ?>><?php echo $ds->nama; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 4</label>
                                    <select class="chosen-select-width" name="dosen4">
                                    <?php if (empty($penguji4->id_penguji)) : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <?php else : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"<?php echo ($penguji4->id_penguji==$ds->username) ? "selected='selected'" : "" ?>><?php echo $ds->nama; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 5</label>
                                    <select class="chosen-select-width" name="dosen5">
                                    <?php if (empty($penguji5->id_penguji)) : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <?php else : ?>
                                    <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"<?php echo ($penguji5->id_penguji==$ds->username) ? "selected='selected'" : "" ?>><?php echo $ds->nama; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>
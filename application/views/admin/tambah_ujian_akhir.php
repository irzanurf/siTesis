<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Ujian Akhir</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/add_ujian');?>
                                
                                <div class="form-group">
                                    <label>NIM</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="nim" required="">
                                </div>

                                <div class="form-group">
                                    <label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="nama" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label>Judul Tesis</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" name="judul" row="3" required=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Seminar Proposal</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input type="date" class="form-control" name="tgl" required="">
                                </div>

                                <div class="form-group">
                                    <label>Tempat Ujian Tesis/Link Ujian Tesis</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" name="tempat" row="2" required=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Pembimbing Ketua dan Penguji 1</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="chosen-select-width" name="dosen1"  required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pembimbing Anggota dan Penguji 2</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="chosen-select-width" name="dosen2"  required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 3</label>
                                    <select class="chosen-select-width" name="dosen3">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 4</label>
                                    <select class="chosen-select-width" name="dosen4">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pengelola/Penguji 5</label>
                                    <select class="chosen-select-width" name="dosen5">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>
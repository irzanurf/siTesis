<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Seminar Proposal</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Penguji/addPenilaianSempro');?>
                                
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

                                <div class="form-group">
                                    <label>Pembimbing Ketua/Penguji 1</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji1->nama?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Pembimbing Anggota/Penguji 2</label>
                                    <input class="form-control" name="penguji1" value="<?= $penguji2->nama?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 3</label>
                                    <?php 
                                    if(empty($penguji3->nama)) :?>
                                    <input class="form-control" name="penguji1" value="-" disabled>

                                    <?php
                                    else : ?>
                                    <input class="form-control" name="penguji1" value="<?= $penguji3->nama ?>" disabled>

                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Penguji 4</label>
                                    <?php 
                                    if(empty($penguji4->nama)) :?>
                                    <input class="form-control" name="penguji1" value="-" disabled>

                                    <?php
                                    else : ?>
                                    <input class="form-control" name="penguji1" value="<?= $penguji4->nama ?>" disabled>

                                    <?php endif; ?>
                                </div>
                                <p><br>Keterangan: <br> SB-Sangat Baik (bobot angka 90), B-Baik (bobot angka 75), <br>
                                CK-Cukup (bobot angka 60), K-Kurang (bobot angka 40) <br> Nilai = Bobot x Skor</p>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                <colgroup>
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 45%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 20%;">
                                    <col span="1" style="width: 15%;">
                                </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Komponen Penilaian</th>
                                            <th>Bobot (%)</th>
                                            <th>Skor</th>
                                            <th>NIlai</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <tr>
                                        <td colspan='5' style="text-align:center" ><b>Penilaian terhadap Isi Proposal Tesis</b></td>
                                        </tr>

                                        <tr>                        
                                        <td style="text-align:center">1</td>
                                        <td>Isi proposal tesis memaparkan sesuatu karakteristik yang belum pernah dibahas dalam literatur ilmiah sebelumnya atau berpeluang memberikan perbaikan atau modifikasi terhadap topik yang diteliti secara bernas</td>
                                        <td><input type="text" id="bobot1" name="bobot1" value="30" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor1" name="skor1" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                            <option value="">...</option>
                                            <?php
                                            foreach ($nilai as $n) {
                                            ?>
                                            <option value="<?php echo $n->nilai; ?>"><?php echo $n->ket; ?></option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai1" name="nilai1" readonly></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">2</td>
                                        <td>Proposal Tesis ditulis dan disajikan dengan jelas</td>
                                        <td><input type="text" id="bobot2" name="bobot2" value="20" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor2" name="skor2" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                            <option value="">...</option>
                                            <?php
                                            foreach ($nilai as $n) {
                                            ?>
                                            <option value="<?php echo $n->nilai; ?>"><?php echo $n->ket; ?></option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai2" name="nilai2" readonly></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">3</td>
                                        <td>Hasil yang akan diperoleh dalam proposal tesis layak untuk dipublikasikan</td>
                                        <td><input type="text" id="bobot3" name="bobot3" value="20" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor3" name="skor3" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                            <option value="">...</option>
                                            <?php
                                            foreach ($nilai as $n) {
                                            ?>
                                            <option value="<?php echo $n->nilai; ?>"><?php echo $n->ket; ?></option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai3" name="nilai3" readonly></td>
                                        </tr>

                                        <tr>
                                        <td colspan='5' style="text-align:center" ><b>Penilaian ketika Presentasi dan Tanya Jawab dalam Seminar Proposal Tesis</b></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">4</td>
                                        <td>Ide dalam proposal tesis dapat dipresentasikan secara langsung dengan baik</td>
                                        <td><input type="text" id="bobot4" name="bobot4" value="10" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor4" name="skor4" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                            <option value="">...</option>
                                            <?php
                                            foreach ($nilai as $n) {
                                            ?>
                                            <option value="<?php echo $n->nilai; ?>"><?php echo $n->ket; ?></option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai4" name="nilai4" readonly></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">5</td>
                                        <td>Mahasiswa mampu memberikan penjelasan atau argumentasi atau jawaban pertanyaan yang diajukan penguji dengan lancar dan benar</td>
                                        <td><input type="text" id="bobot5" name="bobot5" value="20" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor5" name="skor5" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                            <option value="">...</option>
                                            <?php
                                            foreach ($nilai as $n) {
                                            ?>
                                            <option value="<?php echo $n->nilai; ?>"><?php echo $n->ket; ?></option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai5" name="nilai5" readonly></td>
                                        </tr>

                                        <tr>
                                        <td colspan='4' style="text-align:center">Total</td>
                                        <td><input type="text" name="totalnilai" id="totalnilai" readonly></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                                
                    
                        <div class="form-group">
                        <label><br>Komentar Penilai</label>
                        <div >
                            <textarea class="form-control" name="komentar"  rows="3"></textarea>
                        </div>
                        </div>
                                

                               
                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>

        <script type="text/javascript">
        
        function Multiply() {
        var i;
        var totalnilai;
        for (i = 1; i < 7; i++) {
            var txtbox_Value = $("#bobot"+i).val();
            var selectBox_Value = $("#skor"+i).val();
            var MultipliedValue = (txtbox_Value * selectBox_Value / 100);
            $("#nilai"+i).val(MultipliedValue);
        }
        
        
        }
        </script>

        <script type="text/javascript">
        
        function Multiply() {
        var i;
        
        for (i = 1; i < 7; i++) {
            var txtbox_Value = $("#bobot"+i).val();
            var selectBox_Value = $("#skor"+i).val();
            var MultipliedValue = (txtbox_Value * selectBox_Value / 100);
            $("#nilai"+i).val(MultipliedValue);
        }

        var nilai1 = parseFloat ($("#nilai1").val());
        var nilai2 = parseFloat ($("#nilai2").val());
        var nilai3 = parseFloat ($("#nilai3").val());
        var nilai4 = parseFloat ($("#nilai4").val());
        var nilai5 = parseFloat ($("#nilai5").val());
        var totalnilai = (nilai1 + nilai2 + nilai3 + nilai4 + nilai5);
        console.log(totalnilai);
        $("#totalnilai").val(totalnilai);
        
        }
        </script>

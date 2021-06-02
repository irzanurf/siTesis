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
    <?= form_open_multipart('Penguji/updatePenilaianUjian');?>
                                
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
                                        <td>Penulisan Tesis (Tesis ditulis dan disajikan dengan jelas dan bernas)</td>
                                        <td><input type="text" id="bobot1" name="bobot1" value="30" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor1" name="skor1" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                        <?php
                                        for($i=0, $count = count($nilai);$i<$count;$i++) {?>
                                            ?>
                                            <option value="<?php echo $nilai[$i]->nilai; ?>"<?php echo ($nilai[$i]->nilai==$detail[0]->skor) ? "selected='selected'" : "" ?>><?php echo $nilai[$i]->ket; ?> </option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai1" name="nilai1" value="<?= $detail[0]->nilai; ?>" readonly></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">2</td>
                                        <td>Kelayakan Materi Tesis</td>
                                        <td><input type="text" id="bobot2" name="bobot2" value="20" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor2" name="skor2" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                        <?php
                                        for($i=0, $count = count($nilai);$i<$count;$i++) {?>
                                            ?>
                                            <option value="<?php echo $nilai[$i]->nilai; ?>"<?php echo ($nilai[$i]->nilai==$detail[1]->skor) ? "selected='selected'" : "" ?>><?php echo $nilai[$i]->ket; ?> </option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai2" name="nilai2" value="<?= $detail[1]->nilai; ?>" readonly></td>
                                        </tr>

                                        <tr>
                                        <td colspan='5' style="text-align:center" ><b>Penilaian ketika Presentasi dan Tanya Jawab dalam Ujian Tesis</b></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">3</td>
                                        <td>Karya dalam tesis dapat dipresentasikan secara langsung dan berfungsi dengan baik</td>
                                        <td><input type="text" id="bobot3" name="bobot3" value="20" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor3" name="skor3" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                        <?php
                                        for($i=0, $count = count($nilai);$i<$count;$i++) {?>
                                            ?>
                                            <option value="<?php echo $nilai[$i]->nilai; ?>"<?php echo ($nilai[$i]->nilai==$detail[2]->skor) ? "selected='selected'" : "" ?>><?php echo $nilai[$i]->ket; ?> </option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai3" name="nilai3" value="<?= $detail[2]->nilai; ?>" readonly></td>
                                        </tr>

                                        <tr>
                                        <td style="text-align:center">4</td>
                                        <td>Mahasiswa mampu memberikan penjelasan atau argumentasi atau jawaban pertanyaan yang diajukan penguji dengan lancar dan benar</td>
                                        <td><input type="text" id="bobot4" name="bobot4" value="10" disabled></td>
                                        <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                        <td><select class="form-control" id="skor4" name="skor4" onchange="Multiply()" required=""> <a href="javascript: void(0)" onChange="calc()"></a>
                                        <?php
                                        for($i=0, $count = count($nilai);$i<$count;$i++) {?>
                                            ?>
                                            <option value="<?php echo $nilai[$i]->nilai; ?>"<?php echo ($nilai[$i]->nilai==$detail[3]->skor) ? "selected='selected'" : "" ?>><?php echo $nilai[$i]->ket; ?> </option>
                                            <?php
                                        }
                                        ?>
                                            </select></td>
                                        <td><input type="text" id="nilai4" name="nilai4" value="<?= $detail[3]->nilai; ?>" readonly></td>
                                        </tr>

                                        <tr>
                                        <td colspan='4' style="text-align:center">Total</td>
                                        <td><input type="text" name="totalnilai" id="totalnilai" value="<?= $total->nilai; ?>" readonly></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                                
                    
                        <div class="form-group">
                        <label><br>Komentar Penilai</label>
                        <div >
                            <textarea class="form-control" name="komentar"  rows="3"><?=$total->catatan;?></textarea>
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
        var totalnilai = (nilai1 + nilai2 + nilai3 + nilai4);
        console.log(totalnilai);
        $("#totalnilai").val(totalnilai);
        
        }
        </script>

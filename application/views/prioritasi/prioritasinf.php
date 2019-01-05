<div class="row">
    <center><h4><b>Penentuan Prioritas Kebutuhan Non-Fungsional</b></h4></center>
</div>

<div class="row">
    <div class="col s12 ">
        <div class="card" style="padding:1%;">
            <h7><b>Skala Perbandingan</b></h7>
            <table>
                <thead>
                    <tr>
                        <td style="widt:2rem;">Nilai Perbandingan</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="widt:2rem;">1</td>
                        <td>Kedua kebutuhan sama penting.</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">3</td>
                        <td>Kebutuhan yang dianggap dominan sedikit lebih penting.</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">5</td>
                        <td>Kebutuhan yang dianggap dominan lebih penting.</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">7</td>
                        <td>Kebutuhan yang dianggap dominan sangat penting</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">9</td>
                        <td>Kebutuhan yang dianggap dominan mutlak sangat penting</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">2, 4, 6, 8</td>
                        <td>Rata-rata</td>
                    </tr>
                </tbody>
            </table>
                <p style="font-size:12px;"><b>Keterangan : </b></p>
                <p style="font-size:10px;">- Untuk memilih kebutuhan yang dianggap lebih dominan, gunakan checkbox dominan.</p>
                <p style="font-size:10px;">- Kebutuhan yang dianggap tidak dominan akan memiliki nilai kepentingan 1/nilai kepentingan yang dimasukkan</p>
        </div>
    </div>
</div>

<div clas="row">
<?php if ($nonfungsionals->result() == null) : ?>
    <div class="row red-text">
    <center> <b> <?php echo $warning ?> </b> </center>
    </div>
    <div class = "row">
        <center><a class="btn waves-effect" href="<?php echo base_url(); ?>kebutuhanNonfungsional">Kebutuhan Non-fungsional</a></center>
    </div>
<?php  else : ?>
    <?php $x = 0; $y = 0; ?>
    <!-- Jika ada kebutuhan non-fungsional -->
    <form action="<?php echo base_url(); ?>prosesprioritasinf" method="post">
    <!-- Untuk Kode dan Deskripsi kebutuhan yang mau dibandingkan -->
    <?php foreach ($nonfungsionals->result() as $index1 => $nf) : ?>
    <div class="row">
        <div class="col s12 ">
            <div class="card">
                <div class="card-title" style="padding-top:1%; padding-bottom:1%;">
                <center><h5><b>
                    <?php echo $nf->kode ;?>
                    <?php echo $nf->deskripsi ;?>
                </b></h5></center>
                </div>
                    <!-- Untuk list kebutuhan yang jadi pembanding -->
                    <?php foreach ($nonfungsionals->result() as  $index => $nf2) : ?> 
                    <?php if($nf->id != $nf2->id && $nf->id < $nf2->id) :?>
                    <div class="row" style="padding-left:3%;padding-bottom:3%;">
                        <li style="list-style-type: none;">
                            <?php echo $nf2->kode ;?>
                            <?php echo $nf2->deskripsi ;?>

                            <br>
                                <div class="input-field col s3">
                                    <input name="kepentingan[<?php echo $index1;?>][<?php echo $index;?>]" id="value" type="number" min="1" max="9" class="validate" required>
                                    <label for="value">Nilai Kepentingan</label>
                                    <input type="hidden" name="id_nf_utama[<?php echo $x; ?>]" value="<?php echo $nf->id; ?>">
                                    <input type="hidden" name="id_nf_pembanding[<?php echo $y; ?>]" value="<?php echo $nf2->id; ?>">
                                </div>        
                            <br>  
                                
                                <div class="col">
                                    <input name="dom[<?php echo $index1;?>][<?php echo $index;?>]"  id="dom" type="hidden" value ="null">
                                    <label>
                                        <input name="dom[<?php echo $index1;?>][<?php echo $index;?>]" id="dom" type="checkbox" value ="dom">
                                        <span>Dominan</span>
                                    </label>
                                </div>   
                        </li>
                    <!-- </div> -->
                    </div>
                        <!-- <br><br> -->                  
                <?php $x++; $y++; ?>
                    <?php endif ?>  
                <?php endforeach?>
            </div>
        </div>
    </div>
    <?php endforeach?>
    <div class = "row">
        <button type="submit" name="proses_pr_nf" class="btn waves-effect">Lanjutkan</button>
    </div>
    </form>
<?php endif ?>
</div>
<script>
      $(document).ready(function(){
    $('.terserah').formSelect();
  });
</script>

                    <!-- <div class = "row">
                            <label>Kepentingan</label>
                                <select name="kepentingan[<?php echo $index1;?>][<?php echo $index;?> ] ">
                                    <option  value = "" disabled selected>Nilai Kepetingan</option>
                                    <option  value = "1">1</option>
                                    <option  value = "2">2</option>
                                    <option  value = "3">3</option>
                                    <option  value = "3">4</option>
                                    <option  value = "3">5</option>
                                    <option  value = "3">6</option>
                                    <option  value = "3">7</option>
                                    <option  value = "3">8</option>
                                    <option  value = "3">9</option>
                                </select>
                            </div> -->
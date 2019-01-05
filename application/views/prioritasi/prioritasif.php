<div class="row">
    <center><h4><b>Penentuan Prioritas Kebutuhan Fungsional</b></h4></center>
</div>

<div class="row">
    <div class="col s12 ">
        <div class="card" style="padding:1%;">
            <h7><b>Skala Perbandingan</b></h7>
            <table>
                <thead>
                    <tr>
                        <td style="widt:2rem;"><b>Nilai Perbandingan</b></td>
                        <td><b>Keterangan</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="widt:2rem;">1</td>
                        <td>Kedua kebutuhan sama penting.</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">2</td>
                        <td>Kebutuhan fungsional sedikit lebih penting.</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">3</td>
                        <td>Kebutuhan fungsional lebih penting.</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">4</td>
                        <td>Kebutuhan fungsional sangat penting</td>
                    </tr>
                    <tr>
                        <td style="widt:2rem;">5</td>
                        <td>Kebutuhan fungsional mutlak sangat penting</td>
                    </tr>`
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
<?php if ($fungsionals->result() == null) : ?>
    <div class="row red-text">
    <center> <b> <?php echo $warning ?> </b> </center>
    </div>
    <div class = "row">
        <center><a class="btn waves-effect" href="<?php echo base_url(); ?>kebutuhanFungsional">Kebutuhan Fungsional</a></center>
    </div>
<?php  else : ?>
    <?php $x = 0; $y = 0; ?>
    <div class="col s12 ">
    <form action="<?php echo base_url(); ?>prosesprioritasif" method="post">
        <?php foreach ($fungsionals->result() as $index_f => $fungsional) :?>
        <div class="card">
            <div class="card-title" style="padding-top:1%; padding-bottom:1%;">
                <center><h5><b>
                <?php echo $fungsional->kode ?>
                <?php echo $fungsional->deskripsi ?>
                </b></h5></center>
            </div>

            <?php foreach ($nonfungsionals->result() as $index_nf => $nonfungsional) : ?>
                <div class="row" style="padding-left:3%;">
                    <li style="list-style-type: none;">
                        <?php echo $nonfungsional->kode ?>
                        <?php echo $nonfungsional->deskripsi ?>
                        <br>
                        <div class="input-field col s3">
                                <input name="kepentingan[<?php echo $index_f;?>][<?php echo $index_nf;?>]" id="value" type="number" min="1" max="5" class="validate" required>
                                <label for="value">Nilai Kepentingan</label>
                                <input type="hidden" name="idf[<?php echo $x; ?>]" value="<?php echo $fungsional->id; ?>">
                                <input type="hidden" name="idnf[<?php echo $y; ?>]" value="<?php echo $nonfungsional->id; ?>">
                        </div>                        
                    </li>
                </div>
                <?php $x++; $y++; ?>
            <?php endforeach ?>
        </div>
        <?php endforeach ?>        
    
        <div class="row">
            <button type="submit" name="selesai" class="btn waves-effect" style="margin-left:88%;">Selesai</button>
        </div>
    </form>
    </div>
<?php endif ?>
</div>
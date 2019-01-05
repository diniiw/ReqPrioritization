<h4>Edit Kebutuhan Fungsional</h4>
<?php foreach ($fungsional->result() as $fungsi): ?>
        <form class="col s10" action="<?php echo base_url(); ?>updateKebutuhanF/<?php echo $fungsi->id; ?>" method="post" >
            <div class="card-content black-text">
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="kodef" name="kode_f" type="text" class="validate" value="<?php echo $fungsi->kode; ?>" readonly="readonly">
                        <label for="kodef">Kode Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="deskripsif" name="deskripsi_f" type="text" class="validate" value="<?php echo $fungsi->deskripsi; ?>">
                        <label for="deskripsif">Deskripsi Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="time" name="waktu_f" type="text" class="validate" value="<?php echo $fungsi ->waktu; ?>">
                        <label for="time">Estimasi Waktu Implementasi Kebutuhan (hari)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="cost" name="biaya_f" type="text" class="validate" value="<?php echo $fungsi->biaya; ?>">
                        <label for="cost">Estimasi Waktu Implementasi Kebutuhan (Rp)</label>
                    </div>
                </div>
            </div>
            <div class = "row">
                <button type="submit" name="simpan" value="Simpan"  class="btn waves-effect">Simpan</button>
                <a type="button" class="btn waves-effect" href="<?php echo base_url(); ?>kebutuhanFungsional">Batal</a>
            </div>
        </form>
<?php endforeach ?>
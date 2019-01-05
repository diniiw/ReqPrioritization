<h4>Edit Kebutuhan Nonfungsional</h4>
<?php foreach ($nonfungsional->result() as $nf): ?>
        <form class="col s10" action="<?php echo base_url(); ?>updateKebutuhanNF/<?php echo $nf->id; ?>" method="post" >
            <div class="card-content black-text">
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="kodef" name="kode_nf" type="text" class="validate" value="<?php echo $nf->kode; ?>" readonly="readonly">
                        <label for="kodef">Kode Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="deskripsif" name="deskripsi_nf" type="text" class="validate" value="<?php echo $nf->deskripsi; ?>">
                        <label for="deskripsif">Deskripsi Kebutuhan</label>
                    </div>
                </div>
            </div>
            <div class = "row">
                <button type="submit" name="simpan" value="Simpan"  class="btn waves-effect">Simpan</button>
                <a type="button" class="btn waves-effect" href="<?php echo base_url(); ?>kebutuhanNonfungsional">Batal</a>
            </div>
        </form>
<?php endforeach ?>
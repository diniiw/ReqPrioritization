<div class="row">
<div class="col s12" id="fungsional">
<h5>Kebutuhan Non-Fungsional</h5>

    <a class="waves-effect waves-light btn modal-trigger" href="#tambahNF">Tambah Kebutuhan Non-fungsional</a>

    <!-- Tabel untuk kebutuhan fungsional -->
    <table class="highlight">
        <thead>
            <th>No</th>
            <th>Kode Kebutuhan</th>
            <th>Deskripsi Kebutuhan</th>
            <th>Nilai Prioritas</th>
            <th>Action</th>
        </thead>
        
        <tbody>
        <?php $no = 1; ?>
        <?php foreach ($nonfungsionals->result() as $nf): ?>
        <tr>
            <td> <?php echo $no++; ?> </td>
            <td> <?php echo $nf->kode; ?> </td>
            <td> <?php echo $nf->deskripsi; ?> </td>
            <td> <?php echo $nf->prioritas; ?> </td>
            <td>
                
                <form action="<?php echo base_url(); ?>editKebutuhanNF/<?php echo $nf->id; ?> " method="get">
                    <button type="submit" name="editf" class="btn-flat"><i class="material-icons">edit</i></button>
                </form>

                <!-- <form action="<?php echo base_url(); ?>deleteNF/<?php echo $nf->id; ?>" method="post">
                    <button type="submit" name="destroynf" class="btn-flat"><i class="material-icons">delete</i></button>
                    <input type="hidden" name="_method" value="DELETE">
                </form> -->
                
                <button class="btn-flat modal-trigger" href="#deletenf"><i class="material-icons">delete</i></button>

            </td>
        </tr>
        <?php endforeach ?>
    </tabel>
</div>
</div>

    <div id="tambahNF" class="modal">
    <div class="modal-content">
        <h4>Tambah Kebutuhan Nonfungsional</h4>
        <!-- <?php echo validation_errors(); ?> -->
        <form id ="form_tambahNF" class="col s10" action="<?php echo base_url(); ?>tambahNonfungsional" method="post" >
            <div class="card-content black-text">
                <div class="row">
                    <div class="input-field" col s6>
                        <input  value="<?php echo $kodeBaru; ?>" id="kodenf" name="kode_nf" type="text" class="validate" readonly="readonly">
                        <label for="kodef">Kode Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="deskripsif" name="deskripsi_nf" type="text" class="validate" required>
                        <label for="deskripsif">Deskripsi Kebutuhan</label>
                    </div>
                </div>
            </div>
        <button type="submit" name="tambah_nf" value="Tambah"  class="modal-action btn waves-effect">Tambah</button>
        </form>
        <button type="submit" name="batal" class="modal-close waves-effect waves-green btn">Batal</button>
    </div>
    </div>

        <div id="deletenf" class="modal">
        <div class="modal-content">
            <!-- <h4>Please Confirm</h4> -->
            <p>Hapus kebutuhan <b><?php echo $nf->kode; ?>  : <?php echo $nf->deskripsi; ?> ?</b></p>
        </div>
        <div class="modal-footer">
            <form action="<?php echo base_url(); ?>deleteNF/<?php echo $nf->id; ?>" method="post">
                <button type="submit" name="destroyf" class="btn-flat">Hapus</button>
            </form>
            <button type="submit" name="destroyf" class="modal-close waves-effect waves-green btn-flat">Tidak</button>
       </div>
    </div>

<script>
    // Script untuk modal
    $(document).ready(function() {
        $('.modal').modal();
    })
</script>
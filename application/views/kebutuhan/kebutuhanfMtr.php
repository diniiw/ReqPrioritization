<div class="row">
<div class="col s12" id="fungsional">
<h5>Kebutuhan Fungsional</h5>

    <a class="waves-effect waves-light btn modal-trigger" href="#tambahF">Tambah Kebutuhan Fungsional</a>

    <!-- Tabel untuk kebutuhan fungsional -->
    <table class="highlight">
        <thead>
            <th>No</th>
            <th>Kode Kebutuhan</th>
            <th>Deskripsi Kebutuhan</th>
            <th>Waktu</th>
            <th>Waktu Kumulatif</th>
            <th>Biaya</th>
            <th>Biaya Kumulatif</th>
            <th>Nilai Prioritas</th>
            <th>Action</th>
        </thead>
        
        <tbody>
        <?php $no = 1; $waktu_k = 0; $biaya_k=0;?>
        <?php foreach ($fungsionals->result() as $fungsi): ?>
        <tr>
            <td> <?php echo $no++; ?> </td>
            <td> <?php echo $fungsi->kode; ?> </td>
            <td> <?php echo $fungsi->deskripsi; ?> </td>
            <td> <?php echo $fungsi->waktu; ?> </td>
            <td> <?php $waktu_k = $waktu_k + $fungsi->waktu; echo $waktu_k; ?> </td>
            <td> <?php echo $fungsi->biaya; ?> </td>
            <td> <?php $biaya_k = $biaya_k + $fungsi->biaya; echo $biaya_k; ?> </td>
            <td> <?php echo $fungsi->prioritas; ?> </td>
            <td>
                
                <form action="<?php echo base_url(); ?>editKebutuhanF/<?php echo $fungsi->id; ?> " method="get">
                    <button type="submit" name="editf" class="btn-flat"><i class="material-icons">edit</i></button>
                </form>

                <!-- <form action="<?php echo base_url(); ?>deleteF/<?php echo $fungsi->id; ?>" method="post">
                    <button type="submit" name="destroyf" class="btn-flat"><i class="material-icons">delete</i></button> -->
                    <!-- <input type="hidden" name="_method" value="DELETE">                     -->
    <!-- <a class="waves-effect waves-light btn modal-trigger" href="#tambahF">Tambah Kebutuhan Fungsional</a> -->
                <!-- </form> -->
                <button class="btn-flat modal-trigger" href="#deletef"><i class="material-icons">delete</i></button>

            </td>
        </tr>
<?php endforeach; ?>
    </tabel>
</div>
</div>

    <div id="tambahF" class="modal">
    <div class="modal-content">
        <h4>Tambah Kebutuhan Fungsional</h4>
        <form id ="form_tambahF" class="col s10" action="<?php echo base_url(); ?>tambahFungsional" method="post" >
            <div class="card-content black-text">
                <div class="row">
                    <div class="input-field" col s6>
                        <input  value="<?php echo $kodeBaru; ?>" id="kodef" name="kode_f" type="text" class="validate" readonly="readonly">
                        <label for="kodef">Kode Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="deskripsif" name="deskripsi_f" type="text" class="validate" required>
                        <label for="deskripsif">Deskripsi Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="time" name="waktu_f" type="number" class="validate" required>
                        <label for="time">Estimasi Waktu untuk Implementasi Kebutuhan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field" col s6>
                        <input id="cost" name="biaya_f" type="number" class="validate" required>
                        <label for="cost">Estimasi Biaya untuk Implementasi Kebutuhan</label>
                    </div>
                </div>
            </div>
        <button type="submit" name="tambah_f" value="Tambah"  class="modal-action btn waves-effect">Tambah</button>
        <!-- {{ csrf_field() }} -->
        </form>        
        <button type="submit" name="batal" class="modal-close waves-effect waves-green btn">Batal</button>
    </div>
    </div>

    <div id="deletef" class="modal">
        <div class="modal-content">
            <!-- <h4>Please Confirm</h4> -->
            <p>Hapus kebutuhan <b><?php echo $fungsi->kode; ?>  : <?php echo $fungsi->deskripsi; ?> ?</b></p>
        </div>
        <div class="modal-footer">
            <form action="<?php echo base_url(); ?>deleteF/<?php echo $fungsi->id; ?>" method="post">
                <button type="submit" name="destroyf" class="btn-flat">Hapus</button>
            </form>
            <button type="submit" name="destroyf" class="modal-close waves-effect waves-green btn-flat">Tidak</button>
       </div>
    </div>


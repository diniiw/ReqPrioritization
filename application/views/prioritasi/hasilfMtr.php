<div class="row">
<div class="col s12" id="fungsional">
<h5>Hasil Prioritas Kebutuhan Fungsional</h5>
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
        </thead>
        
        <tbody>
        <?php $no = 1; $waktu_k = 0; $biaya_k = 0; ?>
        <?php foreach ($fungsionals->result() as $fungsional) :?>
        <tr>
            <td> <?php echo $no++ ?> </td>
            <td> <?php echo $fungsional->kode ?> </td>
            <td> <?php echo $fungsional->deskripsi ?> </td>
            <td> <?php echo $fungsional->waktu ?> </td>
            <td> <?php $waktu_k = $waktu_k + $fungsional->waktu; echo $waktu_k; ?> </td>
            <td> <?php echo $fungsional->biaya ?> </td>
            <td> <?php $biaya_k = $biaya_k + $fungsional->biaya; echo $biaya_k; ?> </td>
            <td> <?php echo $fungsional->prioritas ?> </td>
        </tr>
        <?php endforeach ?>
    </tabel>
</div>
</div>
<div class="row">
<!-- <form class="col s10" action="<?php echo base_url(); ?>" method  ="get">
    <button type="submit" name="lanjutkan" class="btn waves-effect">Lanjutkan</button>
</form> -->
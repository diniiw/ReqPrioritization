<div class="row">
<div class="col s12" id="fungsional">
<h5>Prioritas Kebutuhan Non-Fungsional</h5>
    <table class="highlight">
        <thead>
            <th>No</th>
            <th>Kode Kebutuhan</th>
            <th>Deskripsi Kebutuhan</th>
            <th>Nilai Prioritas</th>
        </thead>
        
        <tbody>
        <?php $no = 1 ?>
        <?php foreach ($nonfungsionals->result() as $nonfungsional) : ?>
        <tr>
            <td> <?php echo $no++ ?> </td>
            <td> <?php echo $nonfungsional->kode ?> </td>
            <td> <?php echo $nonfungsional->deskripsi ?> </td>
            <td> <?php echo $nonfungsional->prioritas ?> </td>
        </tr>
        <?php endforeach ?>
    </tabel>
</div>
</div>

<div class="row">
<form class="col s10" action="<?php echo base_url(); ?>prioritasiFungsional" method  ="get">
    <button type="submit" name="lanjutkan" class="btn waves-effect">Lanjutkan</button>
</form>
</div>
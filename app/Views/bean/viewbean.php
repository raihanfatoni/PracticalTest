<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Bean Catalogue
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".base_url('home/login')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses');?>
<?= form_open('bean/index') ?>
    <div class="input-group mb-3">
        <input type="text" name ="cari" class="form-control" placeholder="Search Bean" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class = "input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="tombolcari" name="tombolcari">
                <i class= "fa fa-search"></i>
            </button>
        </div>
    </div>
<?= form_close();?>
<table class="table table-striped table-bordered" style="width:100%;">
<thead align="center">
    <tr>
        <th>ID</th>
        <th>Bean</th>
        <th>Description </th>
        <th>Price</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach($tampildata as $row): 
    ?>
    <tr>
        <td><?=$row['id_bean']?></td>
        <td><?=$row['nama'];?></td>
        <td><?=$row['description'];?></td>
        <td>$<?=number_format($row['price'],  2)?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
<div class = "float=center">
    <?= $pager->links('bean','paging');?>
</div>
<script>
 function edit(id){
    window.location = ('/barang/formedit/'+ id);
}

function hapus(){
    pesan = confirm('Yakin Data Barang Dihapus?');
    if($pesan){
        return true;
    } else{
        return false;
    }
}
</script>
<?= $this->endSection('isi')?>
<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Manajemen Data Barang
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Tambah Data',[
    'class' => 'btn btn-primary',
    'onclick' => "location.href=('".site_url('barang/formtambah')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses');?>
<?= form_open('barang/index') ?>
    <div class="input-group mb-3">
        <input type="text" name ="cari" class="form-control" placeholder="Cari Data Barang" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class = "input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="tombolcari" name="tombolcari">
                <i class= "fa fa-search"></i>
            </button>
        </div>
    </div>
<?= form_close();?>
<table class="table table-striped table-bordered" style="width:100%;">
<thead>
    <tr>
        <th>ID Barang</th>
        <th>ID Supplier</th>
        <th>ID Kategori </th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th >Aksi</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach($tampildata as $row): 
    ?>
    <tr>
        <td><?=$row['id_barang']?></td>
        <td><?=$row['supplier_id'];?></td>
        <td><?=$row['kategori_id'];?></td>
        <td><?=$row['nama_barang'];?></td>
        <td><?=number_format($row['hargabeli']);?></td>
        <td><?=number_format($row['hargajual']);?></td>
        <td>
            <button type="button" class = "btn btn-info" title = "Edit Data" onclick="edit('<?= $row['id_barang']?>')">
                <i class="fa fa-edit"></i> 
            </button>
            <form method="POST" action="/barang/hapus/<?= $row['id_barang'] ?>" style="display:inline;" onsubmit="hapus();">
                <input type="hidden" value = "DELETE" name="_method">
                <button type="submit" class = "btn btn-danger" title = "Delete Data">
                    <i class="fa fa-trash-alt"></i> 
                </button>        
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
<div class = "float=center">
    <?= $pager->links('barang','paging');?>
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
<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Bean Distributor List 
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Add Distributor',[
    'class' => 'btn btn-primary',
    'onclick' => "location.href=('".site_url('distributor/formtambah')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses');?>
<?= form_open('distributor/index') ?>
    <div class="input-group mb-3">
        <input type="text" name ="cari" class="form-control" placeholder="Search Distributor" aria-label="Recipient's username" aria-describedby="button-addon2">
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
        <th>Distributor Name</th>
        <th>City</th>
        <th>Action</th>
    </tr>
</thead>
<tbody align="center">
    <?php
    foreach($tampildata as $row): 
    ?>
    <tr>
        <td><?=$row['id_distributor']?></td>
        <td><?=$row['nama'];?></td>
        <td><?=$row['city'];?></td>
        <td>
            <button type="button" class = "btn btn-info" title = "Edit Data" onclick="edit('<?= $row['id_distributor']?>')">
                <i class="fa fa-edit"></i> 
            </button>
            <form method="POST" action="/distributor/hapus/<?= $row['id_distributor'] ?>" style="display:inline;" onsubmit="hapus();">
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
    <?= $pager->links('distributor','paging');?>
</div>
<script>
 function edit(id){
    window.location = ('/distributor/formedit/'+ id);
}

function hapus(){
    pesan = confirm('Yakin Data Distributor Dihapus?');
    if($pesan){
        return true;
    } else{
        return false;
    }
}
</script>
<?= $this->endSection('isi')?>
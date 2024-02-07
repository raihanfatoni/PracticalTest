<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Form Edit Supplier
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('supplier/index')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open('supplier/updatedata','',[
    'idsupplier'=> $id
])?>
<div class ="form-group">
    <label for="nama_perusahaan"> Nama Perusahaan</label>
    <?= form_input('nama_perusahaan',$nama,[
        'class' => 'form-control',
        'id' => 'nama_perusahaan',
        'autofocus' => 'true',
        
    ])?>

    <?= session()->getFlashdata('errorNamaPerusahaan');?>
</div>
<div class = "form-group">
    <?= form_submit('','Update',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?> 
<?= $this->endSection('isi')?>
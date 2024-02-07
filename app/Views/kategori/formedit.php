<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Form Edit Kategori
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('kategori/index')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open('kategori/updatedata','',[
    'idkategori'=> $id
])?>
<div class ="form-group">
    <label for="nama_kategori"> Nama Kategori</label>
    <?= form_input('nama_kategori',$nama,[
        'class' => 'form-control',
        'id' => 'nama_kategori',
        'autofocus' => 'true',
        
    ])?>

    <?= session()->getFlashdata('errorNamaKategori');?>
</div>
<div class = "form-group">
    <?= form_submit('','Update',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?> 
<?= $this->endSection('isi')?>
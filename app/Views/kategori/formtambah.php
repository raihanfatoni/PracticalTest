<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Form Tambah Data Kategori
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('kategori/index')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open('kategori/simpandata')?>
<div class ="form-group">
    <label for="nama_kategori"> Nama Kategori</label>
    <?= form_input('nama_kategori','',[
        'class' => 'form-control',
        'id' => 'nama_kategori',
        'autofocus' => 'true',
        'placeholder' => 'Isi Nama Kategori!',
        
    ])?>

    <?= session()->getFlashdata('errorNamaKategori');?>
</div>
<div class = "form-group">
    <?= form_submit('','Simpan',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?> 
<?= $this->endSection('isi')?>
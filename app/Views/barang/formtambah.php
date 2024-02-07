<?php
    $dropdownKatid = [
        'name'=> 'kategori_id',
        'options'=> $namaKategori,
        'class'=> 'form-control'
    ];

    $dropdownSupp = [
        'name'=> 'supplier_id',
        'options'=> $kodeSupplier,
        'class'=> 'form-control'
    ];

    $submit = [
        'name'=>'submit',
        'id'=>'submit',
        'value'=>'Pilih Data',
        'class'=>'btn btn-primary',
        'type'=>'submit'
    ];
?>
<?= $this->extend('main/layout')?>

<?= $this->section('judul')?>
Form Tambah Data Barang
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('barang/index')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open('barang/simpandata')?>
<div class ="form-group">
<label for="id_barang"> ID Barang</label>
    <?= form_input('id_barang','',[
        'class' => 'form-control',
        'id' => 'id_barang',
        'autofocus' => 'true',
        'placeholder' => 'Isi ID Barang!',
        
    ])?>
    <label> Kategori ID</label>
    <?= form_dropdown($dropdownKatid)?>
    <label for="satid"> Supplier ID</label>
    <?= form_dropdown($dropdownSupp)?>
    <label for="nama_barang"> Nama Barang</label>
    <?= form_input('nama_barang','',[
        'class' => 'form-control',
        'id' => 'nama_barang',
        'autofocus' => 'true',
        'placeholder' => 'Isi Nama Barang!',
        
    ])?>
    <label for="hargabeli"> Harga Beli</label>
    <?= form_input('hargabeli','',[
        'class' => 'form-control',
        'type' => 'number',
        'id' => 'hargabeli',
        'placeholder' => 'Isi Harga Beli',
        
    ])?>
    <label for="hargajual"> Harga Jual</label>
    <?= form_input('hargajual','',[
        'class' => 'form-control',
        'type' => 'number',
        'id' => 'hargajual',
        'placeholder' => 'Isi Harga Jual',
        
    ])?><br>
    <?= session()->getFlashdata('errorNamaBarang');?>
</div>
<div class = "form-group">
    <?= form_submit('','Simpan',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?> 
<?= $this->endSection('isi')?>
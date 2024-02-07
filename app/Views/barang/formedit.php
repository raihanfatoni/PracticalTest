<?php
    $dropdownKatid = [
        'name'=> 'kategori_id',
        'options'=> $namaKategori,
        'selected'=>$kategori_id,
        'class'=> 'form-control'
    ];

    $dropdownSupp = [
        'name'=> 'supplier_id',
        'options'=> $kodeSupplier,
        'selected'=>$supplier_id,
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
Form Edit Data Barang
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('barang/index')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open('barang/updatedata','',[
    'iddistributor'=> $id
])?>
<div class ="form-group">
    <label for="nama_barang"> Nama Barang</label>
    <?= form_input('nama_barang',$nama_barang,[
        'class' => 'form-control',
        'id' => 'nama_barang',
        'autofocus' => 'true',
    ])?>
    <label for="katid"> Kategori ID (<?=$kategori_id ?>)</label><br>
    <?= form_dropdown($dropdownKatid)?>
    <label for="satid"> Satuan ID (<?=$supplier_id ?>)</label>
    <?= form_dropdown($dropdownSupp)?>
    <label for="hargabeli"> Harga Beli</label>
    <?= form_input('hargabeli',$hargabeli,[
        'class' => 'form-control',
        'id' => 'hargabeli',
        
    ])?>
    <label for="hargajual"> Harga Jual</label>
    <?= form_input('hargajual',$hargajual,[
        'class' => 'form-control',
        'id' => 'hargajual',
        
    ])?>
    <?= session()->getFlashdata('errorNamaBarang');?>
</div>
<div class = "form-group">
    <?= form_submit('','Simpan',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?> 
<?= $this->endSection('isi')?>
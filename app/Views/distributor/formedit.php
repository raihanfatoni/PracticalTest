<?php
    $dropdownCountries = [
        'name'=> 'country',
        'options'=> $kodeCountry,
        'class'=> 'form-control',
        'selected'=>$country
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
<?= form_open('distributor/updatedata','',[
    'iddistributor'=> $id
])?>
<div class ="form-group">
    <label for="nama"> Distributor Name</label>
    <?= form_input('nama',$nama,[
        'class' => 'form-control',
        'id' => 'nama',
        'autofocus' => 'true',
        'placeholder' => 'Fill Distributor Name!',
        
    ])?>
    <label for="city"> City</label>
    <?= form_input('city',$city,[
        'class' => 'form-control',
        'id' => 'city',
        'autofocus' => 'true',
        'placeholder' => 'Fill City!',
        
    ])?>
    <label for="region"> Region</label>
    <?= form_input('region',$region,[
        'class' => 'form-control',
        'id' => 'region',
        'autofocus' => 'true',
        'placeholder' => 'Fill Region!',
        
    ])?>
    <label for="country"> Country</label>
    <?= form_dropdown($dropdownCountries)?>
    <label for="phone"> Phone Number</label>
    <?= form_input('phone',$phone,[
        'class' => 'form-control',
        'id' => 'phone',
        'autofocus' => 'true',
        'placeholder' => 'Fill Phone Number !',
        
    ])?>
    <label for="email"> Email</label>
    <?= form_input('email',$email,[
        'class' => 'form-control',
        'id' => 'email',
        'autofocus' => 'true',
        'placeholder' => 'Fill email !',
        
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
<?php
    $dropdownCountries = [
        'name'=> 'country',
        'options'=> $kodeCountry,
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
Add Coffee Distributor
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Back',[
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('".site_url('distributor/index')."')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open('distributor/simpandata')?>
<div class ="form-group">
    <label for="nama"> Distributor Name</label>
    <?= form_input('nama','',[
        'class' => 'form-control',
        'id' => 'nama',
        'autofocus' => 'true',
        'placeholder' => 'Fill Distributor Name!',
        
    ])?>
    <label for="city"> City</label>
    <?= form_input('city','',[
        'class' => 'form-control',
        'id' => 'city',
        'autofocus' => 'true',
        'placeholder' => 'Fill City!',
        
    ])?>
    <label for="region"> Region</label>
    <?= form_input('region','',[
        'class' => 'form-control',
        'id' => 'region',
        'autofocus' => 'true',
        'placeholder' => 'Fill Region!',
        
    ])?>
    <label for="country"> Country</label>
    <?= form_dropdown($dropdownCountries)?>
    <label for="phone"> Phone Number</label>
    <?= form_input('phone','',[
        'class' => 'form-control',
        'id' => 'phone',
        'autofocus' => 'true',
        'placeholder' => 'Fill Phone Number !',
        
    ])?>
    <label for="email"> Email</label>
    <?= form_input('email','',[
        'class' => 'form-control',
        'id' => 'email',
        'autofocus' => 'true',
        'placeholder' => 'Fill email !',
        
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
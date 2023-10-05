<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>

<div>
    <div class="profile">
        <img src="<?=base_url('asset/img/image.jpg');?>" style="width : 200px;">
        <h1><?=$nama?></h1>
        <h1><?=$kelas?></h1>
        <h1><?=$npm?></h1>
    </div>
</div>
  <?=$this->endSection()?>
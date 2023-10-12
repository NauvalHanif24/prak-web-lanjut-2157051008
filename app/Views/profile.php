<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>

<div>
    <div class="profile">
        <img src="<?=$user['foto'] ?? '<default-foto>'  ?>" style="width : 200px;">
        <h1><?=$user['nama']?></h1>
        <h1><?=$user['id_kelas']?></h1>
        <h1><?=$user['npm']?></h1>
    </div>
</div>
  <?=$this->endSection()?>
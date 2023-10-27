<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>

<div>

<?php $nama_kelas = session()->getFlashdata('nama_kelas');?>

<h2>Form Data Siswa</h2>
<form action="<?= base_url('/user/' . $user['id']) ?>" method="POST" enctype="multipart/form-data">    <?= (empty(validation_show_error('nama')))?'':'is_valid'?>
<div class="invalid-feedback">
    <?= validation_show_error('nama')?>
  </div>
  <?php $nama_kelas = session()->getFlashdata('nama_kelas');?>
    <?= (empty(validation_show_error('nama')))?'':'is_valid'?>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $user['nama'] ?>"required><br><br>

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="<?= $user['npm'] ?>" required><br><br>

        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas">
          <?php
          foreach ($kelas as $item) {
            ?>
            <option value="<?= $item['id'] ?>" <?= $user['id_kelas'] == $item['id'] ? 'selected' : '' ?> >
              <?= $item['nama_kelas'] ?>
          </option>
          <?php
          }
          ?>
          </select>
          <label for="foto">Foto:</label>
          <input type="file"name="foto">
          <img src="<? $user['foto'] ?? '<default-foto>' ?>">
          <input type="file" name="foto" id="foto" >

          <input type="hidden" name="_method"value="PUT">
          <?= csrf_field() ?>

        <input type="submit" value="Submit">
    </form>

  </div>
  <?=$this->endSection()?>
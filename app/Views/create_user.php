<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>

<div>

<?php $nama_kelas = session()->getFlashdata('nama_kelas');?>

<h2>Form Data Siswa</h2>
    <form action="<?= base_url('/user/store') ?>" method="post" enctype="multipart/form-data">
    <?= (empty(validation_show_error('nama')))?'':'is_valid'?>
<div class="invalid-feedback">
    <?= validation_show_error('nama')?>
  </div>
  <?php $nama_kelas = session()->getFlashdata('nama_kelas');?>
    <?= (empty(validation_show_error('nama')))?'':'is_valid'?>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required><br><br>

        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas">
          <?php
          foreach ($kelas as $item) {
            ?>
            <option value="<?= $item['id'] ?>">
              <?= $item['nama_kelas'] ?>
          </option>
          <?php
          }
          ?>
          </select>
          <label for="foto">Foto:</label>
          <input type="file"name="foto">

        <input type="submit" value="Submit">
    </form>

  </div>
  <?=$this->endSection()?>
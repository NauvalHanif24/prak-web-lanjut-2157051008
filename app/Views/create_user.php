<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>/* Apply basic styles to the form */
form {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  border-radius: 5px;
}

/* Style the labels for the form controls */
label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

/* Style the text inputs */
input[type="text"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

/* Style the submit button */
input[type="submit"] {
  background-color: #007BFF;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

/* Change button color on hover */
input[type="submit"]:hover {
  background-color: #0056b3;
}
</style>
</head>
<body>
<?php $nama_kelas = session()->getFlashdata('nama_kelas');?>

<h2>Form Data Siswa</h2>
    <form action="<?= base_url('/user/store') ?>" method="post">
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

        <input type="submit" value="Submit">
    </form>
</body>
</html>
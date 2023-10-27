<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="list-box">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">List Kelas</h6>
                <a href="<?= base_url('/kelas/create')?>" class="btn btn-dark">+ Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>               
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($kelas as $kelas){
                          ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelas['nama_kelas']?></td>                                                                  
                            <td>
                              <div class="middlecon d-flex justify-content-center align-items-center">
                                <a class="btn btn-secondary me-2" href="<?= base_url('kelas/' . $kelas['id']) ?>">Detail</a>
                                <a class="btn btn-dark me-2" href="<?= base_url('kelas/' . $kelas['id'] . '/edit') ?>">Edit</a>
                                <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="POST">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <?= csrf_field() ?>
                                  <button class="btn btn-danger"">Delete
                                  </button>
                                </form>                   
                              </div>
                            </td>
                          </tr>                                                                                  
                          <?php
                         }
                         ?>
                    </tbody>
                </table>
              </div>
            </div>  
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
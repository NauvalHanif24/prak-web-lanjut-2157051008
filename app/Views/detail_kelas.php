<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="list-box">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Detail Kelas</h6>
                <a href="<?= base_url('/kelas')?>" class="btn btn-dark">Back</a>
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
                            <th>NPM</th>
                            <th>Kelas</th>                           
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($kelas as $kelas){
                          ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kelas['nama']?></td>                            
                            <td><?= $kelas['npm']?></td>                              
                            <td><?= $kelas['nama_kelas']?></td>             
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
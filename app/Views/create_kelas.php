<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        
            <div class="col-md-6">
                <div class="form-wrap">
                    <div class="form-header d-flex align-items-center justify-content-between mb-3">
                        <div class="title">
                            <h4 class="mb-1">Create Kelas</h4>
                        </div>
                        <div class="back">
                            <a href="<?= base_url('/kelas')?>" class="btn btn-outline-dark">Back</a>
                        </div>
                    </div>
                    <div class="form">
                        <form action="<?= base_url('/kelas/store');?>" method="POST" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <?php if (session('validation') && session('validation')->hasError('nama_kelas')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('validation')->getError('nama_kelas'); ?>
                                    </div>
                                <?php endif; ?>
                                <input type="text" id="floatingInput" class="form-control <?= session('validation') && session('validation')->hasError('nama_kelas') ? 'is-invalid' : '' ?>"  placeholder="Nama Kelas" name="nama_kelas" value="<?= old('nama_kelas') ?>">
                                <label for="floatingInput">Nama Kelas</label>
                            </div>

                            <div class="submit-wrap d-flex justify-content-end align-items-center">
                                <input class="btn btn-warning save" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?= $this->endSection('content') ?>
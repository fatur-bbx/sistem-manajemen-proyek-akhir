<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<?php if ($session->get('exceptMahasiswa')) { ?>
    <?php $akun = $session->get('exceptMahasiswa'); ?>
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Mahasiswa</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $jumlahMahasiswa ?>
                                    <span class="text-success text-sm font-weight-bolder">Orang</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Mahasiswa yang diampu</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $mahasiswaModel->countMahasiswayangDiampu($akun[0]['id_pengguna']) ?>
                                    <span class="text-success text-sm font-weight-bolder">Orang</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <p class="mb-1 pt-2 text-bold">Selamat datang di</p>
                            <h5 class="font-weight-bolder">SIMPA</h5>
                            <p class="mb-5">Website ini dapat mengelola dokumen Proyek Akhir dari mahasiswa yang dapat ditinjau oleh Dosen Pembimbing dan Dosen Penguji.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                        <div class="border-radius-lg h-100">
                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <img class="w-100 position-relative z-index-2 pt-4" src="/assets/img/logos/simpa.png" alt="rocket">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Mari mulai dengan SIMPA</h5>
                    <p class="text-white">Dengan SIMPA, mengelola dokumen PA menjadi lebih mudah.</p>
                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                        Klik disini
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
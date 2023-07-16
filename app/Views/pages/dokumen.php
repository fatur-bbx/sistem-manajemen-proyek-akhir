<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<?php
$akun;
if ($session->get('exceptMahasiswa')) {
    $akun = $session->get('exceptMahasiswa');
} else {
    $akun = $session->get('mahasiswa');
} ?>
<?php
$PA[0]['nama_dokumen'] = '-';
$BA[0]['nama_dokumen'] = '-';
$LP[0]['nama_dokumen'] = '-';
$FR[0]['nama_dokumen'] = '-';
$PA[0]['id_dokumen'] = '-';
$BA[0]['id_dokumen'] = '-';
$LP[0]['id_dokumen'] = '-';
$FR[0]['id_dokumen'] = '-';
if ($dokumen->getFile($akun[0]['id_mahasiswa'], 0)) {
    $PA = $dokumen->getFile($akun[0]['id_mahasiswa'], 0);
}

if ($dokumen->getFile($akun[0]['id_mahasiswa'], 1)) {
    $BA = $dokumen->getFile($akun[0]['id_mahasiswa'], 1);
}

if ($dokumen->getFile($akun[0]['id_mahasiswa'], 2)) {
    $LP = $dokumen->getFile($akun[0]['id_mahasiswa'], 2);
}

if ($dokumen->getFile($akun[0]['id_mahasiswa'], 3)) {
    $FR = $dokumen->getFile($akun[0]['id_mahasiswa'], 3);
}

?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tabel <?= $judulHalaman ?></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dokumen</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Dokumen</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $PA[0]['nama_dokumen'] ?></span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">Proyek Akhir</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row align-middle">
                                        <?php if ($PA[0]['nama_dokumen'] != '-') { ?>
                                            <div class="col">
                                                <a href="<?= base_url('/dokumen/' . $PA[0]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Pratinjau
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $PA[0]["id_dokumen"] ?>" style="cursor: pointer;">
                                                    Hapus
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusModal<?= $PA[0]["id_dokumen"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/hapus') ?>" method="POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="fileDokumen" value="<?= $PA[0]['nama_dokumen'] ?>">
                                                                    <input type="hidden" name="id_dokumen" value="<?= $PA[0]["id_dokumen"] ?>">
                                                                    <label>Apakah anda yakin ingin menghapus data ini?</label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col">
                                                <a class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tambahModal1" style="cursor: pointer;">
                                                    Tambah
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="tambahModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/tambah') ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="nim" id="nim" value="<?= $akun[0]['nim'] ?>">
                                                                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?= $akun[0]['id_mahasiswa'] ?>">
                                                                    <label for="pa" class="btn btn-primary">Tambah Dokumen</label>
                                                                    <input type="hidden" name="jenis_dokumen" id="jenis_dokumen" value="0">
                                                                    <input type="file" name="pa" id="pa" style="display: none;">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $BA[0]['nama_dokumen'] ?></span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">Berita Acara</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row align-middle">
                                        <?php if ($BA[0]['nama_dokumen'] != '-') { ?>
                                            <div class="col">
                                                <a href="<?= base_url('/dokumen/' . $BA[0]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Pratinjau
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $BA[0]["id_dokumen"] ?>" style="cursor: pointer;">
                                                    Hapus
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusModal<?= $BA[0]["id_dokumen"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/hapus') ?>" method="POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="fileDokumen" value="<?= $BA[0]['nama_dokumen'] ?>">
                                                                    <input type="hidden" name="id_dokumen" value="<?= $BA[0]["id_dokumen"] ?>">
                                                                    <label>Apakah anda yakin ingin menghapus data ini?</label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col">
                                                <a class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tambahModal1" style="cursor: pointer;">
                                                    Tambah
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="tambahModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/tambah') ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="nim" id="nim" value="<?= $akun[0]['nim'] ?>">
                                                                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?= $akun[0]['id_mahasiswa'] ?>">
                                                                    <label for="ba" class="btn btn-primary">Tambah Dokumen</label>
                                                                    <input type="hidden" name="jenis_dokumen" id="jenis_dokumen" value="1">
                                                                    <input type="file" name="ba" id="ba" style="display: none;">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $LP[0]['nama_dokumen'] ?></span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">Lembar Pengesahan</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row align-middle">
                                        <?php if ($LP[0]['nama_dokumen'] != '-') { ?>
                                            <div class="col">
                                                <a href="<?= base_url('/dokumen/' . $LP[0]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Pratinjau
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $LP[0]["id_dokumen"] ?>" style="cursor: pointer;">
                                                    Hapus
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusModal<?= $LP[0]["id_dokumen"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/hapus') ?>" method="POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="fileDokumen" value="<?= $LP[0]['nama_dokumen'] ?>">
                                                                    <input type="hidden" name="id_dokumen" value="<?= $LP[0]["id_dokumen"] ?>">
                                                                    <label>Apakah anda yakin ingin menghapus data ini?</label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col">
                                                <a class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tambahModal1" style="cursor: pointer;">
                                                    Tambah
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="tambahModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/tambah') ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="nim" id="nim" value="<?= $akun[0]['nim'] ?>">
                                                                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?= $akun[0]['id_mahasiswa'] ?>">
                                                                    <label for="lp" class="btn btn-primary">Tambah Dokumen</label>
                                                                    <input type="hidden" name="jenis_dokumen" id="jenis_dokumen" value="2">
                                                                    <input type="file" name="lp" id="lp" style="display: none;">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $FR[0]['nama_dokumen'] ?></span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">Form Revisi</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row align-middle">
                                        <?php if ($FR[0]['nama_dokumen'] != '-') { ?>
                                            <div class="col">
                                                <a href="<?= base_url('/dokumen/' . $FR[0]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Pratinjau
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $FR[0]["id_dokumen"] ?>" style="cursor: pointer;">
                                                    Hapus
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusModal<?= $FR[0]["id_dokumen"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/hapus') ?>" method="POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="fileDokumen" value="<?= $FR[0]['nama_dokumen'] ?>">
                                                                    <input type="hidden" name="id_dokumen" value="<?= $FR[0]["id_dokumen"] ?>">
                                                                    <label>Apakah anda yakin ingin menghapus data ini?</label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col">
                                                <a class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tambahModal1" style="cursor: pointer;">
                                                    Tambah
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="tambahModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dokumen/tambah') ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokumen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="nim" id="nim" value="<?= $akun[0]['nim'] ?>">
                                                                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?= $akun[0]['id_mahasiswa'] ?>">
                                                                    <label for="fr" class="btn btn-primary">Tambah Dokumen</label>
                                                                    <input type="hidden" name="jenis_dokumen" id="jenis_dokumen" value="3">
                                                                    <input type="file" name="fr" id="fr" style="display: none;">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
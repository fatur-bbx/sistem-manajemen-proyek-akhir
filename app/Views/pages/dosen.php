<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <h6>Tabel <?= $judulHalaman ?></h6>
                </div>
                <div class="row">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="<?= base_url('/dosen/tambah') ?>" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control mb-2">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control mb-2">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control mb-2">
                                        <input type="hidden" name="level" value="1">
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
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dosen</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengguna as $dosen) : ?>
                                <?php if ($dosen["level"] != 1) {
                                    continue;
                                }  ?>
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $dosen["nama"] ?></span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $dosen["username"] ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-3">
                                                <a class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $dosen['id_pengguna'] ?>" style="cursor: pointer;">
                                                    Ubah
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ubahModal<?= $dosen['id_pengguna'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dosen/ubah') ?>" method="POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Dosen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_pengguna" value="<?= $dosen["id_pengguna"] ?>">
                                                                    <label for="nama">Nama</label>
                                                                    <input type="text" name="nama" id="nama" class="form-control mb-2" value="<?= $dosen["nama"] ?>">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" name="username" id="username" class="form-control mb-2" value="<?= $dosen["username"] ?>">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" id="password" class="form-control mb-2" value="<?= $dosen["password"] ?>">
                                                                    <input type="hidden" name="level" value="1">
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
                                            <div class="col-3">
                                                <a class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $dosen["id_pengguna"] ?>" style="cursor: pointer;">
                                                    Hapus
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusModal<?= $dosen["id_pengguna"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="<?= base_url('dosen/hapus') ?>" method="POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dosen</h5>
                                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_pengguna" value="<?= $dosen["id_pengguna"] ?>">
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
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
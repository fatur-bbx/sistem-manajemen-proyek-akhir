<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<?php
$akun;
if ($session->get('exceptMahasiswa')) {
  $akun = $session->get('exceptMahasiswa');
} else {
  $akun = $session->get('mahasiswa');
} ?>
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <h6>Tabel <?= $judulHalaman ?></h6>
        </div>
        <?php if ($akun[0]['level'] == 0) { ?>
          <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
              Tambah
            </button>

            <!-- Modal -->
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <form action="<?= base_url('/mahasiswa/tambah') ?>" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control mb-2" required>
                      <div class="row">
                        <div class="col">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" class="form-control mb-2" required>
                        </div>
                        <div class="col">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control mb-2" required>
                        </div>
                      </div>
                      <label for="nim">NIM</label>
                      <input type="number" name="nim" id="nim" class="form-control mb-2" required>
                      <div class="row">
                        <div class="col">
                          <label for="program_studi">Program Studi</label>
                          <input type="text" name="program_studi" id="program_studi" class="form-control mb-2" required>
                        </div>
                        <div class="col">
                          <label for="angkatan">Angkatan</label>
                          <input type="number" name="angkatan" id="angkatan" class="form-control mb-2" required>
                        </div>
                      </div>
                      <label for="kbk">KBK</label>
                      <select name="kbk" id="kbk" class="form-control mb-2" required>
                        <option value="">Pilih KBK</option>
                        <option value="KBK Data Engineering (DE)">KBK Data Engineering (DE)</option>
                        <option value="KBK Bisnis Analis (BA)">KBK Bisnis Analis (BA)</option>
                        <option value="KBK Soft Computing (SC)">KBK Soft Computing (SC)</option>
                        <option value="KBK Software Engineering (SE)">KBK Software Engineering (SE)</option>
                        <option value="KBK Computer Network (CN)">KBK Computer Network (CN)</option>
                      </select>
                      <label for="dosen_pembimbing">Dosen Pembimbing</label>
                      <select name="dosen_pembimbing" id="dosen_pembimbing" class="form-control mb-2" required>
                        <option value="">Pilih Dosen Pembimbing</option>
                        <?php foreach ($dosen as $dsn) : ?>
                          <?php if ($dsn['level'] != 1) {
                            continue;
                          } ?>
                          <option value="<?= $dsn['id_pengguna'] ?>"><?= $dsn['nama'] ?></option>
                        <?php endforeach; ?>
                      </select>
                      <label for="dosen_penguji">Dosen Penguji</label>
                      <select name="dosen_penguji" id="dosen_penguji" class="form-control mb-2" required>
                        <option value="">Pilih Dosen Penguji</option>
                        <?php foreach ($dosen as $dsn) : ?>
                          <?php if ($dsn['level'] != 1) {
                            continue;
                          } ?>
                          <option value="<?= $dsn['id_pengguna'] ?>"><?= $dsn['nama'] ?></option>
                        <?php endforeach; ?>
                      </select>
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
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Program Studi</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Angkatan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dosen Pembimbing</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dosen Penguji</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KBK</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Proyek AKhir</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Berita Acara</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Lembar Pengesahan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Revisi</th>
                <?php if($akun[0]['level'] == 0) { ?>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                <?php } ?>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($mahasiswa as $mhs) : ?>
                <?php $pembimbing = $dosenModel->find($mhs['dosen_pembimbing']); ?>
                <?php $penguji = $dosenModel->find($mhs['dosen_penguji']); ?>
                <?php if ($akun[0]['id_pengguna'] == $mhs['dosen_pembimbing'] || $akun[0]['id_pengguna'] == $mhs['dosen_penguji'] || $akun[0]['level'] == 0) { ?>
                  <?php $dkm = $dokumen->getForMhs($mhs['id_mahasiswa'] );?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $mhs['nama'] ?></h6>
                          <p class="text-xs text-secondary mb-0">Username : <?= $mhs['username'] ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="text-secondary text-xs font-weight-bold"><?= $mhs['nim'] ?></span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success"><?= $mhs['program_studi'] ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $mhs['angkatan'] ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $pembimbing['nama'] ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $penguji['nama'] ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $mhs['kbk'] ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <?php if (isset($dkm[0])) { ?>
                        <a href="<?= base_url('/dokumen/' . $dkm[0]['id_dokumen']) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      <?php } else { ?>
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          -
                        </a>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center">
                      <?php if (isset($dkm[1])) { ?>
                        <a href="<?= base_url('/dokumen/' . $dkm[1]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      <?php } else { ?>
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          -
                        </a>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center">
                      <?php if (isset($dkm[2])) { ?>
                        <a href="<?= base_url('/dokumen/' . $dkm[2]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      <?php } else { ?>
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          -
                        </a>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center">
                      <?php if (isset($dkm[3])) { ?>
                        <a href="<?= base_url('/dokumen/' . $dkm[3]["id_dokumen"]) ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      <?php } else { ?>
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          -
                        </a>
                      <?php } ?>
                    </td>
                    <?php if($akun[0]['level'] == 0) { ?>
                    <td class="align-middle text-center">
                      <a class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $mhs["id_mahasiswa"] ?>" style="cursor: pointer;">
                        Hapus
                      </a>
                      <div class="modal fade" id="hapusModal<?= $mhs["id_mahasiswa"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <form action="<?= base_url('mahasiswa/hapus') ?>" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="id_mahasiswa" value="<?= $mhs["id_mahasiswa"] ?>">
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
                    </td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Program Studi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Angkatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KBK</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Proyek AKhir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Berita Acara</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Lembar Pengesahan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokumen Revisi</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fatur Rizqy Alfarisz</h6>
                            <p class="text-xs text-secondary mb-0">fatur21ti@mahasiswa.pcr.ac.id</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="text-secondary text-xs font-weight-bold">2155301048</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Teknik Informatika</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">21</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">IDK</span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Klik disini
                        </a>
                      </td>
                      <td class="align-middle text-center">
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Klik disini
                        </a>
                      </td>
                      <td class="align-middle text-center">
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Klik disini
                        </a>
                      </td>
                      <td class="align-middle text-center">
                        <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Klik disini
                        </a>
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
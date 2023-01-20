<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/user'); ?>">Pegawai</a></li>
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
                    </ol>
                </div>
                <h4 class="page-title col-4 mx-auto">Form Tambah Pegawai</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Form row -->
    <div class="row">
        <div class="col-12">
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="card col-4 mx-auto">
                <div class="card-body col-13">
                    <form method="post">
                        <div class="form">
                            <div class="form-group">
                                <label class="col-form-label">NIP</label>
                                <input type="text" class="form-control" name="nip" placeholder="NIP" value="<?= set_value('nip') ?>">
                                <small class="text-danger"> <?= form_error('nip') ?></small>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Massukkan Nama Lengkap" value="<?= set_value('nama_lengkap') ?>">
                                <small class="text-danger"> <?= form_error('nama_lengkap') ?></small>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="<?= set_value('username') ?>">
                                <small class="text-danger"> <?= form_error('username') ?></small>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <select class="form-control" name="role">
                                    <option value="laki-laki" <?php if (set_value('role') == 'laki-laki') echo 'selected=selected' ?>>Laki-laki</option>
                                    <option value="perempuan" <?php if (set_value('role') == 'perempuan') echo 'selected=selected' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" value="<?= set_value('password') ?>">
                                <small class="text-danger"> <?= form_error('password') ?></small>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Tipe</label>
                                <select class="form-control" name="role">
                                    <option value="admin" <?php if (set_value('role') == 'admin') echo 'selected=selected' ?>>Admin</option>
                                    <option value="supervisor" <?php if (set_value('role') == 'supervisor') echo 'selected=selected' ?>>Supervisor</option>
                                    <option value="user" <?php if (set_value('role') == 'user') echo 'selected=selected' ?>>Anggota</option>
                                </select>
                            </div>
                        </div>


                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

    </div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title col-4 mx-auto">Kepegawaian</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Form row -->
    <div class="row">
        <div class="col-12">
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="card col-4 mx-auto">
                <div class="card-body col-13">
                    <form method="post">
                        <div class="form">
                            <div class="form-group">
                                <label class="col-form-label">Kategori Pegawai</label>
                                <select class="form-control" name="role">
                                    <option value="kepala-satker" <?php if (set_value('role') == 'kepala-satker') echo 'selected=selected' ?>>Kepala Satker</option>
                                    <option value="bagian-umum" <?php if (set_value('role') == 'bagian-umum') echo 'selected=selected' ?>>Bagian Umum</option>
                                    <option value="fungsional tertentu" <?php if (set_value('role') == 'fungsional-tertentu') echo 'selected=selected' ?>>Fungsional Tertentu</option>
                                    <option value="fungsional umum" <?php if (set_value('role') == 'fungsional-umum') echo 'selected=selected' ?>>Fungsional Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Jabatan</label>
                                <select class="form-control" name="role">
                                    <option value="analis-anggraran" <?php if (set_value('role') == 'analis-anggraran') echo 'selected=selected' ?>>Analis Aggaran Ahli</option>
                                    <option value="analis-sdm-aparatur" <?php if (set_value('role') == 'analis-sdm-aparatur') echo 'selected=selected' ?>>Analis SDM Aparatur</option>
                                    <option value="pranata-keuangan-apdn" <?php if (set_value('role') == 'pranata-keuangan-apdn') echo 'selected=selected' ?>>Pranata keuangan APDN</option>
                                    <option value="pranata-komputer-ahli" <?php if (set_value('role') == 'pranata-komputer-ahli') echo 'selected=selected' ?>>Pranata Komputer Ahli</option>
                                    <option value="pranata-komputer-terampil" <?php if (set_value('role') == 'pranata-komputer-terampil') echo 'selected=selected' ?>>Pranata Komputer Terampil</option>
                                    <option value="statistisi-ahli" <?php if (set_value('role') == 'statistisi-ahli') echo 'selected=selected' ?>>Statistisi Ahli</option>
                                    <option value="statistisi-terampil" <?php if (set_value('role') == 'statistisi-terampil') echo 'selected=selected' ?>>Statistisi Terampil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Jenjang</label>
                                <select class="form-control" name="role">
                                    <option value="kepala-satker" <?php if (set_value('role') == 'kepala-satker') echo 'selected=selected' ?>>Kepala Satker</option>
                                    <option value="bagian-umum" <?php if (set_value('role') == 'bagian-umum') echo 'selected=selected' ?>>Bagian Umum</option>
                                    <option value="fungsional tertentu" <?php if (set_value('role') == 'fungsional-tertentu') echo 'selected=selected' ?>>Fungsional Tertentu</option>
                                    <option value="fungsional umum" <?php if (set_value('role') == 'fungsional-umum') echo 'selected=selected' ?>>Fungsional Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="date">TMT Jabatan (format bulan-hari-tahun, contoh: 02-12-2001)</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="11/12/2023" value="<?= set_value('date') ?>">
                                <small class="text-danger"> <?= form_error('date') ?></small>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Golongan</label>
                                <select class="form-control" name="role">
                                    <option value="admin" <?php if (set_value('role') == 'admin') echo 'selected=selected' ?>>Admin</option>
                                    <option value="supervisor" <?php if (set_value('role') == 'supervisor') echo 'selected=selected' ?>>Supervisor</option>
                                    <option value="user" <?php if (set_value('role') == 'user') echo 'selected=selected' ?>>Anggota</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Pangkat</label>
                                <select class="form-control" name="role">
                                    <option value="admin" <?php if (set_value('role') == 'admin') echo 'selected=selected' ?>>Admin</option>
                                    <option value="supervisor" <?php if (set_value('role') == 'supervisor') echo 'selected=selected' ?>>Supervisor</option>
                                    <option value="user" <?php if (set_value('role') == 'user') echo 'selected=selected' ?>>Anggota</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="date">TMT Golongan (format bulan-hari-tahun, contoh: 02-12-2001)</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="11/12/2023" value="<?= set_value('date') ?>">
                                <small class="text-danger"> <?= form_error('date') ?></small>
                            </div>


                        </div>

                        <a href="<?= base_url('admin/user'); ?>" class="btn btn-primary float-left"><i class="mdi mdi-undo"></i> Kembali </a>
                        <button type="submit" class="btn btn-success float-right"><i class="mdi mdi-floppy"></i> Simpan
                        </button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->
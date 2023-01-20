<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>

                        <li class="breadcrumb-item active">Tim Kerja</li>
                        <li class="breadcrumb-item active">Anggota</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Anggota Tim Kerja [<?= $unit->unit_name ?>]</h4>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <a href="<?= base_url('admin/work-unit/') ?>" class="btn btn-info btn-rounded mb-3" style="margin-left:15px;"><i class="mdi mdi-arrow-left"></i> Kembali</a>
        <?php if ($this->current_user->user['role'] == 'supervisor') : ?>
            <div class="col-sm-4">
                <a href="<?= base_url('admin/work-unit/' . $unit->work_unit_id) . '/member/add' ?>" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> Tambah Anggota</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-12">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th width="20">No</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Tgl Dibuat</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $n = 1;
                            foreach ($members as $member) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $member->first_name . " " . $member->last_name ?></td>
                                    <td><?= $member->user_id == $unit->supervisor_id ? 'Kordinator' : 'Anggota' ?></td>
                                    <td><?= $member->created_at ?></td>
                                    <td>
                                        <?php if ($this->current_user->user['role'] == 'supervisor' && $member->user_id != $unit->supervisor_id) : ?>
                                            <a href="<?= base_url('admin/work-unit/' . $unit->work_unit_id . '/member/delete/' . $member->user_id) ?>" class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"> <i class="mdi mdi-account-remove"></i>
                                            </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div> <!-- container
<!--Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>

                        <li class="breadcrumb-item active">Tim Kerja</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Tim Kerja</h4>
            </div>
        </div>
    </div>

    <?php if ($this->current_user->user['role'] == 'supervisor') : ?>
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="<?= base_url('admin/work-unit/add'); ?>" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> Tambah
                    Tim Kerja</a>
            </div>
        </div>
    <?php endif ?>

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
                                <th>Nama Tim</th>
                                <th>Deskripsi</th>
                                <th>Kordinator</th>
                                <!-- <th>Status</th> -->
                                <th>Tgl Dibuat</th>
                                <th>Tgl Diubah</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $n = 1;
                            foreach ($data as $unit) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $unit->unit_name ?></td>
                                    <td><?= $unit->description ?></td>
                                    <td><?= $unit->supervisor_name ?></td>
                                    <td><?= $unit->created_at ?></td>
                                    <td><?= $unit->updated_at ?></td>
                                    <td>
                                        <?php if ($this->current_user->user['role'] == 'admin' || $this->current_user->user['role'] == 'supervisor') : ?>
                                            <a href="<?= base_url('admin/work-unit/' . $unit->work_unit_id . '/detail') ?>" class="btn btn-icon btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail"> <i class="mdi mdi-information-outline"></i> </a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('admin/work-unit/' . $unit->work_unit_id . '/member') ?>" class="btn btn-icon btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Anggota"> <i class="mdi mdi-account-multiple-outline"></i> </a>
                                        <?php if ($this->current_user->user['role'] == 'supervisor') : ?>
                                            <a href="<?= base_url('admin/work-unit/edit/' . $unit->work_unit_id) ?>" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="mdi mdi-account-edit"></i> </a>
                                            <a href="<?= base_url('admin/work-unit/delete/' . $unit->work_unit_id) ?>" class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"> <i class="mdi mdi-account-remove"></i>
                                            </a>
                                        <?php endif; ?>
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
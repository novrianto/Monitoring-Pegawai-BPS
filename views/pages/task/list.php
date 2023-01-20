<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>

                        <li class="breadcrumb-item active">Tugas</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Tugas</h4>
            </div>
        </div>
    </div>

    <?php if ($this->current_user->user['role'] == 'supervisor') : ?>
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="<?= base_url('admin/task/add'); ?>" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> Tambah
                    Tugas</a>
            </div>
        </div>
    <?php endif; ?>

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
                                <th>Nama Tugas</th>
                                <th>Beban Kerja</th>
                                <th>Deskripsi</th>
                                <th>Tim Kerja</th>
                                <th>Pekerja</th>
                                <th>Status</th>
                                <th>Progress</th>
                                <th>Tgl Dibuat</th>
                                <th>Tgl Diubah</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $n = 1;
                            foreach ($data as $task) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $task->task_name ?></td>
                                    <td><?= $task->task_point ?></td>
                                    <td><?= $task->description ?></td>
                                    <td><?= $task->unit_name ?></td>
                                    <td><?= $task->full_name ?></td>
                                    <td>
                                        <?php if ($task->status == 'new') : ?>
                                            <span class="badge badge-primary">Baru</span>
                                        <?php elseif ($task->status == 'ongoing') : ?>
                                            <span class="badge badge-warning">Sedang Berjalan</span>
                                        <?php elseif ($task->status == 'finish') : ?>
                                            <span class="badge badge-success">Selesai</span>
                                        <?php else : ?>
                                            <span class="badge badge-secondary">Unknown</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="<?= 'width:' . $task->progress . '%' ?>" aria-valuenow="<?= $task->progress ?>" aria-valuemin="0" aria-valuemax="100"><?= $task->progress . '%' ?></div>
                                        </div>
                                    </td>
                                    <td><?= $task->created_at ?></td>
                                    <td><?= $task->updated_at ?></td>
                                    <td>
                                        <?php if ($this->current_user->user['user_id'] == $task->user_id) : ?>
                                            <a href="<?= base_url('admin/task/progress/' . $task->task_id) ?>" class="btn btn-icon btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lapor Perkembangan Tugas"> <i class="mdi mdi-timer-sand"></i> </a>
                                        <?php endif; ?>
                                        <?php if ($this->current_user->user['role'] == 'supervisor') : ?>
                                            <a href="<?= base_url('admin/task/edit/' . $task->task_id) ?>" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="mdi mdi-account-edit"></i> </a>
                                            <a href="<?= base_url('admin/task/delete/' . $task->task_id) ?>" class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"> <i class="mdi mdi-account-remove"></i>
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

</div> <!-- container -->
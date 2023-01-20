<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/task'); ?>">Tugas</a></li>
                        <li class="breadcrumb-item active">Lapor Perkembangan Tugas</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Lapor Perkembangan Tugas</h4>
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table dt-responsive nowrap">
                                <tr>
                                    <td>Nama Tugas</td>
                                    <td class="ml-2 mr-2">:</td>
                                    <td><?= $data->task_name ?></td>
                                </tr>
                                <tr>
                                    <td>Beban Kerja</td>
                                    <td class="ml-2 mr-2">:</td>
                                    <td><?= $data->task_point ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td class="ml-2 mr-2">:</td>
                                    <td><?= $data->description ?></td>
                                </tr>
                                <tr>
                                    <td>Tim Kerja</td>
                                    <td class="ml-2 mr-2">:</td>
                                    <td><?= $data->unit_name ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="ml-2 mr-2">:</td>
                                    <td><?= $data->full_name ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="id" value="<?= set_value('task_id', $data->task_id) ?>">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Progress Tugas</label>
                                <input type="range" class="form-control-range" name="progress" min="0" max="100" value="<?= set_value('progress', $data->progress) ?>">
                                <small class="text-danger"> <?= form_error('progress') ?></small>
                            </div>
                        </div>

                        <a href="<?= base_url('admin/task'); ?>" class="btn btn-primary float-left"><i class="mdi mdi-undo"></i> Kembali </a>
                        <button type="submit" class="btn btn-success float-right"><i class="mdi mdi-floppy"></i> Simpan
                        </button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->
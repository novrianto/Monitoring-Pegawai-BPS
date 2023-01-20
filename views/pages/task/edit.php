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
                        <li class="breadcrumb-item active">Edit Tugas</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Edit Tugas</h4>
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
                    <form method="post">
                        <input type="hidden" name="id" value="<?= set_value('task_id', $data->task_id) ?>">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Nama Tugas</label>
                                <input type="text" class="form-control" name="task_name" placeholder="Masukkan nama tugas" value="<?= set_value('task_name', $data->task_name) ?>">
                                <small class="text-danger"> <?= form_error('task_name') ?></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Beban Kerja</label>
                                <input type="number" class="form-control" name="task_point" placeholder="Masukkan jumlah beban kerja" value="<?= set_value('task_point', $data->task_point) ?>">
                                <small class="text-danger"> <?= form_error('task_point') ?></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="description" placeholder="Masukkan deskripsi" value="<?= set_value('description', $data->description) ?>">
                                <small class="text-danger"> <?= form_error('description') ?></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Tim Kerja</label>
                                <select class="form-control" id="work_unit_id" name="work_unit_id">
                                    <option value="">Pilih Unit</option>
                                    <?php foreach ($arrUnit as $unit) : ?>
                                        <option value="<?= $unit->work_unit_id ?>" <?php if (set_value('work_unit_id', $data->work_unit_id) == $unit->work_unit_id) echo 'selected=selected' ?>><?= $unit->unit_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Pekerja</label>
                                <select class="form-control" id="user_id" name="user_id" data-current="<?= set_value('user_id', $data->user_id) ?>"></select>
                            </div>
                            <?php /*
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="new" <?php if( set_value('status', $data->status) == 'new') echo 'selected=selected'?>>Baru</option>
                                    <option value="ongoing" <?php if( set_value('status', $data->status) == 'ongoing') echo 'selected=selected'?>>Sedang Berjalan</option> 
                                    <option value="finish" <?php if( set_value('status', $data->status) == 'finish') echo 'selected=selected'?>>Selesai</option> 
                                </select>
                            </div>
                            */ ?>
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
<script type="text/javascript">
    var arrMember = <?php echo json_encode($arrMember) ?>;
</script>
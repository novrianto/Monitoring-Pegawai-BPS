<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/work-unit'); ?>">Tin=m Kerja</a></li>
                        <li class="breadcrumb-item active">Edit Tim Kerja</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Edit Tim Kerja</h4>
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
                        <input type="hidden" name="id" value="<?= set_value('work_unit_id', $data->work_unit_id) ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label">Nama Tim</label>
                                <input type="text" class="form-control" name="unit_name" placeholder="Masukkan nama tim" value="<?= set_value('unit_name', $data->unit_name) ?>">
                                <small class="text-danger"> <?= form_error('unit_name') ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="description" placeholder="Masukkan deskripsi" value="<?= set_value('description', $data->description) ?>">
                                <small class="text-danger"> <?= form_error('description') ?></small>
                            </div>
                        </div>

                        <a href="<?= base_url('admin/work-unit'); ?>" class="btn btn-primary float-left"><i class="mdi mdi-undo"></i> Kembali </a>
                        <button type="submit" class="btn btn-success float-right"><i class="mdi mdi-floppy"></i> Simpan
                        </button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->
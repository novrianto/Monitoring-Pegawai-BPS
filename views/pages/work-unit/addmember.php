<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>

                        <li class="breadcrumb-item active">Tim Kerja</li>
                        <li class="breadcrumb-item active">Anggota</li>
                        <li class="breadcrumb-item active">Pilih Anggota</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Calon Anggota</h4>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <a href="<?= base_url('admin/work-unit/' . $unit->work_unit_id) . '/member' ?>" class="btn btn-info btn-rounded mb-3" style="margin-left:15px;"><i class="mdi mdi-arrow-left"></i> Kembali</a>
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
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $n = 1;
                            foreach ($members as $member) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $member->first_name . " " . $member->last_name ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="work_unit_id" value="<?= $unit->work_unit_id ?>">
                                            <input type="hidden" name="user_id" value="<?= $member->user_id ?>">
                                            <button type="submit" class="btn btn-icon btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah"> <i class="mdi mdi-plus"></i> Pilih
                                            </button>
                                        </form>
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
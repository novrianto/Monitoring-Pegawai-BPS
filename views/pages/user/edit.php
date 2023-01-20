<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url('admin/user');?>">Pegawai</a></li>
                        <li class="breadcrumb-item active">Edit Pegawai</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Edit Pegawai</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Form row -->
    <div class="row">
        <div class="col-12">
            <?php if($this->session->flashdata('error')):?>
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $this->session->flashdata('error');?>
                </div>
            <?php endif;?>
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="id" value="<?=set_value('user_id', $user->user_id)?>">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Nama Depan</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Masukkan nama depan" value="<?=set_value('first_name', $user->first_name)?>">
                                <small class="text-danger"> <?=form_error('first_name')?></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Nama Belakang</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Masukkan nama belakang" value="<?=set_value('last_name', $user->last_name)?>">
                                <small class="text-danger"> <?=form_error('last_name')?></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="* Biarkan kosong jika tidak ingin mengubah password" value="<?=set_value('password')?>">
                                <small class="text-danger"> <?=form_error('password')?></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Tipe</label>
                                <select class="form-control" name="role">
                                    <?php if( $this->current_user->user['role'] == 'admin' ) : ?>
                                        <option value="admin" <?php if( set_value('role', $user->role) == 'admin') echo 'selected=selected'?>>Admin</option>
                                    <?php endif ?>

                                    <?php if( $this->current_user->user['role'] == 'admin' || $this->current_user->user['role'] == 'supervisor' ) : ?>
                                        <option value="supervisor" <?php if( set_value('role', $user->role) == 'supervisor') echo 'selected=selected'?>>Supervisor</option>
                                    <?php endif ?>

                                    <option value="user" <?php if( set_value('role', $user->role) == 'user') echo 'selected=selected'?>>Anggota</option> 
                                </select>
                            </div>
                        </div>

                        <a href="<?=base_url('admin/user');?>" class="btn btn-primary float-left"><i
                                class="mdi mdi-undo"></i> Kembali </a>
                        <button type="submit" class="btn btn-success float-right"><i class="mdi mdi-floppy"></i> Simpan
                        </button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->
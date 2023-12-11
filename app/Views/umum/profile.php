<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-8">

        <div class="card">
            <div class="card-header text-center">
                <?php if (session()->get('role') == 'admin') { ?>
                    <img src="<?= base_url(); ?>/profile/admin_foto/<?= $profile->user_photo; ?>" alt="Photo Profile" width="170" class="img-thumbnail rounded-circle">
                <?php } ?>
                <?php if (session()->get('role') == 'user') { ?>
                    <img src="<?= base_url(); ?>/profile/user_foto/<?= $profile->user_photo; ?>" alt="Photo Profile" width="170" class="img-thumbnail rounded-circle">
                <?php } ?>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <tbody>
                            <tr>
                                <td class="text-bold-500">Nama Lengkap</td>
                                <td>:</td>
                                <td><?= $profile->name; ?></td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Email</td>
                                <td>:</td>
                                <td><?= $profile->email; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div><br>
                <div class="d-flex justify-content-center">
                    <a href="<?= base_url('staff/Profile/edit_profile'); ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
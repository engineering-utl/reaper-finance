<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Change Password</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <!-- Display flash messages -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Change Password Form -->
             <div class="row">
                <div class="col-sm-6">
                <form action="<?= base_url('ChangePassword/update_password') ?>" method="post">
                <!-- CSRF Token -->
                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
                </div>
             </div>
         
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
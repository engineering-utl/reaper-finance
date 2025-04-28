<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Contact Submissions</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <!-- Search and Sort Form -->
            <form method="get" action="<?= base_url('AdminContact/index') ?>" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= $this->input->get('search') ?>">
                    </div>
                    <div class="col-md-3">
                        <select name="sort_by" class="form-control">
                          
                            <option value="first_name" <?= $this->input->get('sort_by') == 'first_name' ? 'selected' : '' ?>>First Name</option>
                            <option value="last_name" <?= $this->input->get('sort_by') == 'last_name' ? 'selected' : '' ?>>Last Name</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="sort_order" class="form-control">
                            <option value="DESC" <?= $this->input->get('sort_order') == 'DESC' ? 'selected' : '' ?>>Latest First</option>
                            <option value="ASC" <?= $this->input->get('sort_order') == 'ASC' ? 'selected' : '' ?>>Oldest First</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php if (!empty($submissions)): ?>
                        <?php foreach ($submissions as $submission): ?>
                            <?php $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $submission['first_name'] ?></td>
                                <td><?= $submission['last_name'] ?></td>
                                <td><?= $submission['email'] ?></td>
                                <td><?= $submission['message'] ?></td>
                                
                                <td><?= date('m-d-Y H:i:s', strtotime($submission['created_at'])) ?></td>
                                <td>
                                   
                                    <a href="<?= base_url('AdminContact/delete/' . $submission['id']) ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this submission?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No submissions found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                <?= $pagination ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
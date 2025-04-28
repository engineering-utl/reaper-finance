<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Trustlines</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trustlines</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <!-- Search Form -->
            <form method="get" action="<?= base_url('Trustlines/index') ?>" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search by title..." value="<?= $this->input->get('search') ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <div class="btn-holder">
                <button id="addFaqBtn" class="btn btn-primary mb-3 btn-add">Add Trustlines</button>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Title Link</th>
                        <th>Trustline Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($trustlines)): ?>
                        <?php foreach ($trustlines as $trustline): ?>
                            <tr>
                                <td><?= $trustline['id'] ?></td>
                                <td><?= $trustline['title'] ?></td>
                                <td><?= $trustline['title_link'] ?></td>
                                <td><?= $trustline['trustline_link'] ?></td>
                                <td>
                                    <button class="btn btn-warning editFaqBtn" data-id="<?= $trustline['id'] ?>" title="Edit"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                                    <a class="btn btn-danger" href="<?= base_url('Trustlines/delete/' . $trustline['id']) ?>" title="Delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No Trustlines found.</td>
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

    <!-- FAQ Modal -->
    <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="faqForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="faqModalLabel">Add Trustline</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="faq_id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="title_link" class="form-label">Title Link</label>
                            <input type="text" class="form-control" name="title_link" id="title_link" required>
                        </div>
                        <div class="mb-3">
                            <label for="trustline_link" class="form-label">Trustline Link</label>
                            <input type="text" class="form-control" name="trustline_link" id="trustline_link" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#addFaqBtn').click(function () {
                $('#faqForm')[0].reset();
                $('#faq_id').val('');
                $('#faqModalLabel').text('Add Trustline');
                $('#faqModal').modal('show');
            });

            $('.editFaqBtn').click(function () {
                const id = $(this).data('id');
                $.get('<?= base_url('Trustlines/edit/') ?>' + id, function (data) {
                    const trustline = JSON.parse(data);
                    $('#faq_id').val(trustline.id);
                    $('#title').val(trustline.title);
                    $('#title_link').val(trustline.title_link);
                    $('#trustline_link').val(trustline.trustline_link);
                    $('#faqModalLabel').text('Edit Trustline');
                    $('#faqModal').modal('show');
                });
            });

            $('#faqForm').submit(function (e) {
                e.preventDefault();
                const formData = $(this).serialize();
                const id = $('#faq_id').val();
                const url = id ? '<?= base_url('Trustlines/update/') ?>' + id : '<?= base_url('Trustlines/add') ?>';
                $.post(url, formData, function () {
                    location.reload();
                });
            });
        });
    </script>

<?php include 'footer.php'; ?>
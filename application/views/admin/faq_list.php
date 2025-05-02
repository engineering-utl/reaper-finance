<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">FAQs</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <!-- Search Form -->
            <form method="get" action="<?= base_url('Faq/index') ?>" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search by question..." value="<?= $this->input->get('search') ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <div class="btn-holder">
                <button id="addFaqBtn" class="btn btn-primary mb-3 btn-add">Add FAQ</button>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($faqs)): ?>
                        <?php foreach ($faqs as $faq): ?>
                            <tr>
                                <td><?= $faq['id'] ?></td>
                                <td><?= $faq['question'] ?></td>
                                <td><?= $faq['answer'] ?></td>
                                <td><?= $faq['order'] ?></td>
                                <td>
                                    <?php if ($faq['status'] == 'enabled'): ?>
                                        <span class="btn btn-success btn-sm">Enabled</span>
                                    <?php else: ?>
                                        <span class="btn btn-danger btn-sm">Disabled</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning editFaqBtn" data-id="<?= $faq['id'] ?>" title="Edit"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                                    <a class="btn btn-danger" href="<?= base_url('Faq/delete/' . $faq['id']) ?>" title="Delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No FAQs found.</td>
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
                        <h5 class="modal-title" id="faqModalLabel">Add FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="faq_id">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" class="form-control" name="question" id="question" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea class="form-control" name="answer" id="answer" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" class="form-control" name="order" id="order" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
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
                $('#faqModalLabel').text('Add FAQ');
                $('#faqModal').modal('show');
            });

            $('.editFaqBtn').click(function () {
                const id = $(this).data('id');
                $.get('<?= base_url('Faq/edit/') ?>' + id, function (data) {
                    const faq = JSON.parse(data);
                    $('#faq_id').val(faq.id);
                    $('#question').val(faq.question);
                    $('#answer').val(faq.answer);
                    $('#order').val(faq.order);
                    $('#status').val(faq.status);
                    $('#faqModalLabel').text('Edit FAQ');
                    $('#faqModal').modal('show');
                });
            });

            $('#faqForm').submit(function (e) {
                e.preventDefault();
                const formData = $(this).serialize();
                const id = $('#faq_id').val();
                const url = id ? '<?= base_url('Faq/update/') ?>' + id : '<?= base_url('Faq/add') ?>';
                $.post(url, formData, function () {
                    location.reload();
                });
            });
        });
    </script>

<?php include 'footer.php'; ?>
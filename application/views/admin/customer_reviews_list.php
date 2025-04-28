<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Customer Reviews</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer Reviews</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <div class="btn-holder">
                <button id="addReviewBtn" class="btn btn-primary mb-3 btn-add">Add Review</button>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($reviews as $review): ?>
                        <?php $i++; ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $review['customer_name'] ?></td>
                        <td><?= $review['link'] ?></td>
                        <td>
                            <button class="btn btn-warning editReviewBtn" data-id="<?= $review['id'] ?>" titlle="Edit"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                            <a class="btn btn-danger" href="<?= base_url('Customer_reviews/delete/' . $review['id']) ?>" title="Delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Review Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="reviewForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Add Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="review_id">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Title</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation" required>
                        </div>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="company_tagline" class="form-label">Company Tag Line</label>
                            <input type="text" class="form-control" name="company_tagline" id="company_tagline" required>
                        </div>
                        <div class="mb-3">
                            <label for="time_of_comment" class="form-label">Time of Comment</label>
                            <input type="datetime-local" class="form-control" name="time_of_comment" id="time_of_comment" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" required></textarea>
                        </div> -->
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" id="link" required>
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
            $('#addReviewBtn').click(function () {
                $('#reviewForm')[0].reset();
                $('#review_id').val('');
                $('#reviewModalLabel').text('Add Review');
                $('#reviewModal').modal('show');
            });

            $('.editReviewBtn').click(function () {
                const id = $(this).data('id');
                $.get('<?= base_url('Customer_reviews/edit/') ?>' + id, function (data) {
                    const review = JSON.parse(data);
                    $('#review_id').val(review.id);
                    $('#customer_name').val(review.customer_name);
                    // $('#designation').val(review.designation);
                    // $('#company_name').val(review.company_name);
                    // $('#company_tagline').val(review.company_tagline);
                    // $('#time_of_comment').val(review.time_of_comment);
                    // $('#comment').val(review.comment);
                    $('#link').val(review.link);
                    $('#reviewModalLabel').text('Edit Review');
                    $('#reviewModal').modal('show');
                });
            });

            $('#reviewForm').submit(function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const id = $('#review_id').val();
                const url = id ? '<?= base_url('Customer_reviews/update/') ?>' + id : '<?= base_url('Customer_reviews/add') ?>';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function () {
                        location.reload();
                    }
                });
            });
        });
    </script>

<?php include 'footer.php'; ?>
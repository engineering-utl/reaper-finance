<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Executives</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <div class="btn-holder">
                <button id="addExecutiveBtn" class="btn btn-primary mb-3 btn-add">Add Executive</button>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        
                        <th>Position</th>
                        <th>Facebook / X / LinkedIn</th>
                        
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($executives)): ?>
                        <?php foreach ($executives as $executive): ?>
                            <tr>
                                <td><?= $executive['id'] ?></td>
                                <td><img src="<?= base_url('uploads/executives/' . $executive['image']) ?>" width="50" height="50"></td>
                                <td><?= $executive['name'] ?></td>
                                
                                <td><?= $executive['position'] ?></td>
                                <td>
                                    <?= $executive['facebook_link'] ?> </br>
                                    <?= $executive['x_link'] ?> </br>
                                    <?= $executive['linkedin_link'] ?>
                                </td>
                                <td>
                                    <?php if ($executive['status'] == 'enabled'): ?>
                                        <span class="btn btn-success btn-sm">Enabled</span>
                                    <?php else: ?>
                                        <span class="btn btn-danger btn-sm">Disabled</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning editExecutiveBtn" data-id="<?= $executive['id'] ?>" title="Edit"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                                    <a class="btn btn-danger" href="<?= base_url('Executive/delete/' . $executive['id']) ?>" onclick="return confirm('Are you sure you want to delete this executive?')" title="Delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">No executives found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Executive Modal -->
    <div class="modal fade" id="executiveModal" tabindex="-1" aria-labelledby="executiveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="executiveForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="executiveModalLabel">Add Executive</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="executive_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" id="position" required>
                        </div>
                        <div class="mb-3">
                            <label for="facebook_link" class="form-label">Facebook Link</label>
                            <input type="url" class="form-control" name="facebook_link" id="facebook_link">
                        </div>
                        <div class="mb-3">
                            <label for="x_link" class="form-label">X Link</label>
                            <input type="url" class="form-control" name="x_link" id="x_link">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                            <input type="url" class="form-control" name="linkedin_link" id="linkedin_link">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image">
                            <div id="imagePreview"></div>
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
            $('#addExecutiveBtn').click(function () {
                $('#imagePreview').html('');
                $('#executiveForm')[0].reset();
                $('#executive_id').val('');
                $('#executiveModalLabel').text('Add Executive');
                $('#executiveModal').modal('show');
            });

            $('.editExecutiveBtn').click(function () {
                const id = $(this).data('id');
                $.get('<?= base_url('Executive/edit/') ?>' + id, function (data) {
                    const executive = JSON.parse(data);
                    $('#executive_id').val(executive.id);
                    $('#name').val(executive.name);
                    $('#position').val(executive.position);
                    $('#facebook_link').val(executive.facebook_link);
                    $('#x_link').val(executive.x_link);
                    $('#linkedin_link').val(executive.linkedin_link);
                    $('#status').val(executive.status);
                    $('#imagePreview').html('<img src="<?= base_url('uploads/executives/') ?>' + executive.image + '" width="100" height="100">');
                    $('#executiveModalLabel').text('Edit Executive');
                    $('#executiveModal').modal('show');
                });
            });

            $('#executiveForm').submit(function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const id = $('#executive_id').val();
                const url = id ? '<?= base_url('Executive/update/') ?>' + id : '<?= base_url('Executive/add') ?>';
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

            $('#image').change(function(e) {
                var files = e.target.files;

                if (files.length > 0) {
                    var html = '';
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        if (file.type.match('image.*')) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                html += '<img src="' + event.target.result + '" width="100" height="100" style="margin: 5px;">';
                                $('#imagePreview').html(html);  // Update preview div
                            };
                            reader.readAsDataURL(file);  // Read file as DataURL (for preview)
                        } else {
                            alert('Not an image file:' + file.type);
                            $('#image').val('');
                        }
                    }
                }
            });
        });
    </script>

<?php include 'footer.php'; ?>
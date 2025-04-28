<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<style>
    .ck-body-wrapper{
    z-index: 10000;
}
</style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Archives</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archives</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <!-- Search and Sort Form -->
            <form method="get" action="<?= base_url('Blog/index') ?>" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= $this->input->get('search') ?>">
                    </div>
                    <div class="col-md-3">
                        <select name="sort_by" class="form-control">
                            <option value="id" <?= $this->input->get('sort_by') == 'id' ? 'selected' : '' ?>>ID</option>
                            <option value="title" <?= $this->input->get('sort_by') == 'title' ? 'selected' : '' ?>>Title</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="sort_order" class="form-control">
                            <option value="asc" <?= $this->input->get('sort_order') == 'asc' ? 'selected' : '' ?>>Ascending</option>
                            <option value="desc" <?= $this->input->get('sort_order') == 'desc' ? 'selected' : '' ?>>Descending</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex justify-content-lg-end">
                        <button type="submit" class="btn btn-primary apply-btn">Apply</button>
                    </div>
                </div>
            </form>

            <div class="btn-holder">
                <button id="addBlogBtn" class="btn btn-primary mb-3 btn-add">Add Archive</button>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Date</th>
                        <th>Author Image</th>
                        <th>Archive Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($blogs)): ?>
                        <?php foreach ($blogs as $blog): ?>
                            <tr>
                                <td><?= $blog['id'] ?></td>
                                <td><?= $blog['title'] ?></td>
                                <td><?= $blog['blogger_name'] ?></td>
                                <td><?= date('m-d-Y', strtotime($blog['date'])) ?></td>
                                <td><img src="<?= base_url('uploads/blogs/' . $blog['blogger_image']) ?>" width="50" height="50"></td>
                                <td><img src="<?= base_url('uploads/blogs/' . $blog['image']) ?>" width="50" height="50"></td>
                                <td>
                                    <?php if ($blog['status'] == 'enabled'): ?>
                                        <span class="btn btn-success btn-sm">Enabled</span>
                                    <?php else: ?>
                                        <span class="btn btn-danger btn-sm">Disabled</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning editBlogBtn" data-id="<?= $blog['id'] ?>"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                                    <a class="btn btn-danger" href="<?= base_url('Blog/delete/' . $blog['id']) ?>"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No blogs found.</td>
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

    <!-- Blog Modal -->
    <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 800px;">
            <div class="modal-content">
                <form id="blogForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="blogModalLabel">Add Archive</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="blog_id">
                        <div class="mb-3">
                            <label for="sub_header" class="form-label">Sub Header</label>
                            <input type="text" class="form-control" name="sub_header" id="sub_header" required>
                        </div>
                        <div class="mb-3">
                            <label for="header_description" class="form-label">Header Description</label>
                            <input type="hidden" name="header_description" id="header_description" required>
                            <div id="editor"></div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="blogger_name" class="form-label">Author Name</label>
                            <input type="text" class="form-control" name="blogger_name" id="blogger_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="blogger_image" class="form-label">Author Image</label>
                            <input type="file" name="blogger_image" id="blogger_image">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Archive Image</label>
                            <input type="file" name="image" id="image">
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
        // Initialize CKEditor 5
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', '|',
                    'numberedList', 'bulletedList', '|',
                    'insertTable', 'undo', 'redo', '|',
                    'sourceEditing'
                ],
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                }
            })
            .then(editor => {
                // Store the CKEditor instance globally to access it later
                window.editor = editor;
            })
            .catch(error => {
                console.error('There was an error initializing CKEditor 5:', error);
            });

        // Add Blog Button - Clear form and show modal
        $('#addBlogBtn').click(function () {
            $('#blogForm')[0].reset();
            $('#blog_id').val('');
            $('#blogModalLabel').text('Add Archive');
            $('#blogModal').modal('show');
            
            // Clear CKEditor data when adding a new blog
            if (window.editor) {
                window.editor.setData(''); // Clear the CKEditor content
            }
        });

        // Edit Blog Button - Fetch and populate data in modal
        $('.editBlogBtn').click(function () {
            const id = $(this).data('id');
            $.get('<?= base_url('Blog/edit/') ?>' + id, function (data) {
                const blog = JSON.parse(data);
                $('#blog_id').val(blog.id);
                $('#sub_header').val(blog.sub_header);
                $('#title').val(blog.title);
                $('#description').val(blog.description);
                $('#blogger_name').val(blog.blogger_name);
                $('#date').val(blog.date);
                $('#status').val(blog.status);
                $('#blogModalLabel').text('Edit Archive');
                $('#blogModal').modal('show');
                
                // Set CKEditor data for editing
                if (window.editor) {
                    window.editor.setData(blog.header_description); // Set CKEditor content
                }
            });
        });

        // Submit Form - Handle form submission via AJAX
        $('#blogForm').submit(function (e) {
            e.preventDefault();

            $('#header_description').val(window.editor.getData());
            const formData = new FormData(this);

            const id = $('#blog_id').val();
            const url = id ? '<?= base_url('Blog/update/') ?>' + id : '<?= base_url('Blog/add') ?>';

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    location.reload(); // Reload the page after successful submission
                }
            });
        });
    });
    </script>

<?php include 'footer.php'; ?>
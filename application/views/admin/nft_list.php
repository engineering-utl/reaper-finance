<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">NFTs</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">NFTs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <div class="btn-holder">
                <button id="addNftBtn" class="btn btn-primary mb-3 btn-add">Add NFT</button>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Handler Image</th>
                        <th>Handler Name</th>
                        <th>Price</th>
                        <th>External Link</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($nfts as $nft): ?>
                        <?php $i++; ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $nft['title'] ?></td>
                        <td><img src="<?= base_url('uploads/nfts/' . $nft['image']) ?>" width="50" height="50"></td>
                        <td><img src="<?= base_url('uploads/nfts/' . $nft['handler_image']) ?>" width="50" height="50"></td>
                        <td><?= $nft['handler_name'] ?></td>
                        <td><?= $nft['price'] ?></td>
                        <td><a href="<?= $nft['external_link'] ?>" target="_blank">Link</a></td>
                        <td><?php if ($nft['status'] == 'enabled'): ?>
                                <span class="btn btn-success btn-sm">Enabled</span>
                            <?php else: ?>
                                <span class="btn btn-danger btn-sm">Disabled</span>
                            <?php endif; ?></td>
                        <td>
                            <button class="btn btn-warning editNftBtn" data-id="<?= $nft['id'] ?>" title="Edit"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                            <a class="btn btn-danger" href="<?= base_url('Nft/delete/' . $nft['id']) ?>" title="Delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- NFT Modal -->
    <div class="modal fade" id="nftModal" tabindex="-1" aria-labelledby="nftModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="nftForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nftModalLabel">Add NFT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="nft_id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="handler_name" class="form-label">Handler Name</label>
                            <input type="text" class="form-control" name="handler_name" id="handler_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="external_link" class="form-label">External Link</label>
                            <input type="url" class="form-control" name="external_link" id="external_link" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">NFT Image</label>
                            <input type="file" name="image" id="image">
                            <div id="imagePreview"></div>
                        </div>
                        <div class="mb-3">
                            <label for="handler_image" class="form-label">Handler Image</label>
                            <input type="file" name="handler_image" id="handler_image">
                            <div id="imagePreview2"></div>
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
            $('#addNftBtn').click(function () {
                $('#imagePreview').html('');
                $('#imagePreview2').html('');
                $('#nftForm')[0].reset();
                $('#nft_id').val('');
                $('#nftModalLabel').text('Add NFT');
                $('#nftModal').modal('show');
            });

            $('.editNftBtn').click(function () {
                const id = $(this).data('id');
                $.get('<?= base_url('Nft/edit/') ?>' + id, function (data) {
                    const nft = JSON.parse(data);
                    $('#nft_id').val(nft.id);
                    $('#title').val(nft.title);
                    $('#handler_name').val(nft.handler_name);
                    $('#price').val(nft.price);
                    $('#external_link').val(nft.external_link);
                    $('#status').val(nft.status);
                    $('#imagePreview').html('<img src="<?= base_url('uploads/nfts/') ?>' + nft.image + '" width="100" height="100">');
                    $('#imagePreview2').html('<img src="<?= base_url('uploads/nfts/') ?>' + nft.handler_image + '" width="100" height="100">');
                    $('#nftModalLabel').text('Edit NFT');
                    $('#nftModal').modal('show');
                });
            });

            $('#nftForm').submit(function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const id = $('#nft_id').val();
                const url = id ? '<?= base_url('Nft/update/') ?>' + id : '<?= base_url('Nft/add') ?>';
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

            // Function to preview images before uploading
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

            // Function to preview images before uploading
            $('#handler_image').change(function(e) {
                var files = e.target.files;

                if (files.length > 0) {
                    var html = '';
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        if (file.type.match('image.*')) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                html += '<img src="' + event.target.result + '" width="100" height="100" style="margin: 5px;">';
                                $('#imagePreview2').html(html);  // Update preview div
                            };
                            reader.readAsDataURL(file);  // Read file as DataURL (for preview)
                        } else {
                            alert('Not an image file:' + file.type);
                            $('#handler_image').val('');
                        }
                    }
                }
            });
        });
    </script>

<?php include 'footer.php'; ?>
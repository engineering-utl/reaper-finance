<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Roadmap</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Roadmap</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <button id="addRoadmapBtn" class="btn btn-primary mb-3">Add Roadmap</button>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    <?php foreach ($roadmaps as $roadmap): ?>
                        <?php $i++; ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= date('m-d-Y', strtotime($roadmap['roadmap_date'])) ?></td>
                        <td><?= $roadmap['description'] ?></td>
                        <td><?php if ($roadmap['status'] == 'enabled'): ?>
                                <span class="btn btn-success btn-sm">Enabled</span>
                            <?php else: ?>
                                <span class="btn btn-danger btn-sm">Disabled</span>
                            <?php endif; ?></td>
                        <td>
                            <button class="btn btn-warning editRoadmapBtn" data-id="<?= $roadmap['id'] ?>" title="Edit"><img src="<?php echo base_url('assets/images/edit-dash.png'); ?>"  alt="Edit" /></button>
                            <a class="btn btn-danger" href="<?= base_url('Roadmap/delete/' . $roadmap['id']) ?>" title="Delete"> <a class="btn btn-danger" href="<?= base_url('Trustlines/delete/' . $trustline['id']) ?>" title="Delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Roadmap Modal -->
    <div class="modal fade" id="roadmapModal" tabindex="-1" aria-labelledby="roadmapModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="roadmapForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roadmapModalLabel">Add Roadmap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="roadmap_id">
                        <div class="mb-3">
                            <label for="roadmap_date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="roadmap_date" id="roadmap_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
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
            $('#addRoadmapBtn').click(function () {
                $('#roadmapForm')[0].reset();
                $('#roadmap_id').val('');
                $('#roadmapModalLabel').text('Add Roadmap');
                $('#roadmapModal').modal('show');
            });

            $('.editRoadmapBtn').click(function () {
                const id = $(this).data('id');
                $.get('<?= base_url('Roadmap/edit/') ?>' + id, function (data) {
                    const roadmap = JSON.parse(data);
                    $('#roadmap_id').val(roadmap.id);
                    $('#roadmap_date').val(roadmap.roadmap_date);
                    $('#description').val(roadmap.description);
                    $('#status').val(roadmap.status);
                    $('#roadmapModalLabel').text('Edit Roadmap');
                    $('#roadmapModal').modal('show');
                });
            });

            $('#roadmapForm').submit(function (e) {
                e.preventDefault();
                const formData = $(this).serialize();
                const id = $('#roadmap_id').val();
                const url = id ? '<?= base_url('Roadmap/update/') ?>' + id : '<?= base_url('Roadmap/add') ?>';
                $.post(url, formData, function () {
                    location.reload();
                });
            });
        });
    </script>

<?php include 'footer.php'; ?>
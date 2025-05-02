<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Footer Menu</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <div id="menu-container">
                <?php foreach ($menu_sections as $section => $items): ?>
                    <h3 class="modal-title">:: <?php echo $section; ?></h3>
                    <div class="section pb-4" data-section="<?php echo $section; ?>">
                        <div class="row mb-3">
                        <div class="col-sm-6 d-flex justify-content-end">
                        <button class="add-more btn btn-primary mr-5 addmore-btn" title="Add More">Add More <span style="margin-left:6px;"><img src="<?php echo base_url('assets/images/addmore.png'); ?>"  alt="Add" /><span></button>
                        </div>
                        
                        </div>
                    
                        <?php foreach ($items as $item): ?>
                            <div class="menu-item" data-id="<?php echo $item['id']; ?>">
                                <input type="text" class="title form-control" style="width:20%; display:inline" value="<?php echo $item['title']; ?>" placeholder="Title">
                                <input type="text" class="link form-control" style="width:20%; display:inline" value="<?php echo $item['link']; ?>" placeholder="Link">
                                <button class="delete-item btn btn-primary" style="background-color: #db1313"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></button>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                    <hr/>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
  
    
<script>
$(document).ready(function() {
    // Add new item
    $('.add-more').on('click', function() {
        var section = $(this).closest('.section').data('section');
        var newItem = `
            <div class="menu-item">
                <input type="text" class="title form-control" placeholder="Title" style="width:20%; display:inline">
                <input type="text" class="link form-control" placeholder="Link"  style="width:20%; display:inline">
                <button class="delete-item btn btn-primary" style="background-color: #db1313"><img src="<?php echo base_url('assets/images/delete.png'); ?>"  alt="Delete" /></button>
            </div>`;
        $(this).closest('.section').append(newItem);
    });

    // Delete item
    $(document).on('click', '.delete-item', function() {
        var menuItem = $(this).closest('.menu-item');
        var itemId = menuItem.data('id');

        if (itemId) {
            $.ajax({
                url: '<?= base_url('Menu/delete_item') ?>',
                method: 'POST',
                data: { id: itemId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        menuItem.remove();
                        alert('Item deleted!');
                    }
                }
            });
        } else {
            menuItem.remove();
        }
    });

    // Save changes
    $(document).on('change', '.title, .link', function() {
        var section = $(this).closest('.section').data('section');
        var menuItem = $(this).closest('.menu-item');
        var title = menuItem.find('.title').val();
        var link = menuItem.find('.link').val();
        var itemId = menuItem.data('id');

        if (title && link) {
            $.ajax({
                url: '<?= base_url('Menu/add_item') ?>',
                method: 'POST',
                data: { section: section, title: title, link: link, id: itemId },
                dataType: 'json',
                success: function(response) {
                    if (response.id) {
                        menuItem.data('id', response.id);
                        alert('Item saved!');
                    }
                }
            });
        }
    });
});
</script>
<?php include 'footer.php'; ?>
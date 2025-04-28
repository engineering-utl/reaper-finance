<?php include('header.php') ?>

<!-- Inner Banner Section -->
<section class="inner-banner archivebanner">
    
        <img src="<?= base_url('uploads/blogs/' . $blog['image']) ?>" alt="Blog Image">
        <div class="overcontnt">
        <div class="container">
            <div class="d-flex flex-column align-items-start w-100">
                <h1><?= $blog['sub_header'] ?></h1>
            </div>
        </div>
        </div>
    
   
</section>

<!-- Blog Details Section -->
<section class="about-detailarea">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="pg-heading">
                    <h2><?= $blog['title'] ?></h2>
                </div>
                <article class="mb-3">
                    <p class="heading">
                        <?= $blog['description'] ?>
                    </p>
                </article>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 mb-5 pb-5">
                <div class="w-100 mt-3 archiveTableArea">
                    <!-- Blogger Image -->
                    <!-- <img src="<?= base_url('uploads/blogs/' . $blog['blogger_image']) ?>" alt="<?= $blog['blogger_name'] ?>" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;"> -->
                    <!-- Blogger Name and Publish Date -->
                    <!-- <div>
                        <span class="text-white"><?= $blog['blogger_name'] ?></span>
                        <span class="text-white mx-2">•</span>
                        <span class="text-white"><?= date('F j, Y', strtotime($blog['date'])) ?></span>
                    </div> -->
                    <div><?= $blog['header_description'] ?></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Explore NFTs Section -->
<section class="exploreBlock executive" style="background: #222224;">
    <div class="skewed" style="background: #222224;"></div>
    <div class="container position-relative">
        <h5>The Author</h5>
        <h2><?= $blog['blogger_name'] ?></h2>

        <!-- Blogger Details Section -->
        <section class="executive-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="executive-card">
                            <img src="<?= base_url('uploads/blogs/' . $blog['blogger_image']) ?>" alt="<?= $blog['blogger_name'] ?>">
                            <div class="executive-info">
                                <h5><?= $blog['blogger_name'] ?></h5>
                                <p>Author</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- Contact Form Section -->
<?php include('contactUs.php') ?>

<!-- Footer Section -->
<?php include('footer.php') ?>
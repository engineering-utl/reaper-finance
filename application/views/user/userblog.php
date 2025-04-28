<?php include('header.php') ?>
    <!-- Inner Banner Section -->
    <section class="inner-banner" style="background: #6D7E7A;">
      <div class="bannerposter"><img class="editable" id="cr_blog-img" contenteditable="true" src="<?php echo base_url('assets/images/blog.png')?>"></div>
    </section>

    <section class="searchBlogArea d-none d-sm-block">
      <div class="container">
          <div class="row">
            <!-- <div class="col-sm-10 mx-auto">
              <form class="form w-100">
                <div class="searchgrp">
                  <input type="text" name="" id="" class="form-control" placeholder="Search">
                  <button type="button" class="btn"><img src="<?php echo base_url('assets/images/searchicon.png')?>" alt=""></button>
                </div>
              </form>
            </div> -->
          </div>
      </div>
    </section>

    <section class="exploreBlock executive" style="background: #222224;">
      <div class="skewed" style="background: #222224;"></div>
      <div class="container position-relative">
      </div>
      <!-- <div class="skewed2"></div> -->
      <div class="reapingArea">
        <div class="container">
          <div class="row g-4">
            
            <!-- Card 1 -->
            <?php
              // Split blogs into groups of 2 for the carousel
              date_default_timezone_set('UTC');
              $blog_chunks = array_chunk($blogs, 2);
              foreach ($blog_chunks as $chunk): ?>
                <?php foreach ($chunk as $blog): ?>
                <div class="col-md-6 mb-4">
                  <div class="card blog-card h-100">
                    <div class="position-relative reapingposter">
                      <img src="<?= base_url('uploads/blogs/' . $blog['image']) ?>" class="card-img-top" alt="Debt Reaping" id="cr_reap_itm01_postr">
                      <!-- <span class="badge position-absolute m-2 editable" id="cr_reap_itm01_badge" contenteditable="true">DEBT REAPING</span> -->
                    </div>
                    <div class="card-body bg-black text-white">
                      <div class="d-flex align-items-center mb-2">
                        <img src="<?= base_url('uploads/blogs/' . $blog['blogger_image']) ?>" alt="Author" class="me-2 user-photo" id="cr_reap_itm01_userphoto">
                        <small class="text-heading"><?= $blog['blogger_name'] ?> .   <span><?= date('F j, Y', strtotime($blog['date'])) ?></span></small>
                      </div>
                      <h5 class="card-title fw-bold mt-4 "  id="cr_reap_itm01_headline"><?= $blog['title'] ?></h5>
                      <p class="card-text " id="cr_reap_itm01_para" ><?= substr($blog['description'], 0, 100) ?>...</p>
                      <a href="<?= base_url('archives/details/' . $blog['slug']) ?>" class="text-danger fw-bold text-decoration-none" target = "_blank" >READ MORE <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              <?php endforeach; ?>
          </div>

          <!-- <div class="paginationArea py-4 text-center">
            <div class="container">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mb-0">
          
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                      <i class="fas fa-chevron-left"></i>
                    </a>
                  </li>
          
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
          
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div> -->
          
        </div>
      </div>

    </section>

 <!-- Contact Form Section -->
    <?php include('contactUs.php') ?>

    <!-- Footer Section -->
   <?php include('footer.php') ?>
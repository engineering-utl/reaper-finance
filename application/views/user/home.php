<?php include('header.php') ?>
    <!-- Header Section -->
    
    <!-- Hero Section -->
    <section class="hero text-center">
      
    <img class="editable cr_hero_img" id="cr_hero-img" contenteditable="true" src="<?php echo base_url('assets/images/banner-person2.jpg')?>">
      <div class="container">
      
        <!-- <div class="graph">
          <img src="assets/images/banner-graph.png" alt="" />
        </div> -->
        <div class="row align-items-center">
          <div class="bannerContainer">
            <div class="charecter-block">
              <!-- <span class="bitcoin-01"
                ><img src="assets/images/banner-bitcoin01.png" alt=""
              /></span> -->
              <!-- <span class="charecter"
                ><img src="assets/images/banner-person.png" alt="" 
              /></span> -->
              <!-- <span class="bitcoin-02"
                ><img src="assets/images/banner-bitcoin02.png" alt=""
              /></span> -->
            </div>
            <div class="bnrtextBlock">
              <h1 class="editable" id="cr_hero-hd" contenteditable="true">
                Delivering On The Promise Of Blockchain
              </h1>
              <p class="editable" id="cr_hero-para" contenteditable="true">
                Reaper Financial and RPR Token serve the digital ecosystem as a
                natural market regulation tool for a decentralized economy. By
                unleashing the natural aspect of death upon an artificially
                created universe we serve to preserve the value of every entity
                within.
              </p>
              <a href="<?php echo base_url('whitepaper.html'); ?>" type="button" class="btn bnr-btn">RPR White Paper</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Debt Reaping Section -->

    <section class="debt-reaping">
      <div class="slanted-edge"></div>
      <!-- Popular Coins Section -->
      <section class="popcoinarea">
        <div class="container">
          <h2 class="editable" id="cr_popcoin-hd" contenteditable="true">Popular Coins</h2>
          <div class="row justify-content-center">
            <div
              class="col-12 d-flex justify-content-center justify-content-lg-between flex-wrap coin-icons"
            >
              <img src="assets/images/popcoin01.png" class="editable" id="bitcoin2" contenteditable="true" alt="Bitcoin" />
              <img src="assets/images/popcoin03.png" class="editable" id="ethereum2" contenteditable="true" alt="Ethereum" />
              <img src="assets/images/popcoin04.png" class="editable" id="cardano2" contenteditable="true" alt="Cardano" />
              <img src="assets/images/popcoin05.png" class="editable" id="chain2" contenteditable="true" alt="Chainlink" />
              <img src="assets/images/popcoin06.png" class="editable" id="ripple2" contenteditable="true" alt="Ripple" />
            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <h2 class="editable" id="cr_caprev-hd" contenteditable="true">Capital Revival Debt Reaping by the Numbers</h2>
        
        <div class="row text-center">
          <div class="col-md-3 debt-divider border-right">
              <div class="debt-stat stat editable" contenteditable="true" id="debt1">$4,228</div>
              <p>Total Debts Paid Year-To-Date</p>
          </div>
          <div class="col-md-3 debt-divider border-right">
              <div class="debt-stat stat editable" contenteditable="true" id="debt2">106</div>
              <p>Unique Debt Payments Year-To-Date</p>
          </div>
          <div class="col-md-3 debt-divider border-right">
              <div class="debt-stat stat editable" contenteditable="true" id="debt3">$15,962</div>
              <p>Total Debts Paid All-Time</p>
          </div>
          <div class="col-md-3">
              <div class="debt-stat stat editable" contenteditable="true" id="debt4">422</div>
              <p>Unique Debt Payments All-Time</p>
          </div>
      </div>
        <div class="row">
          <div class="col px-0">
            <p class="mt-5 uptext">**Updated as of 2/21/2025. Amounts in USD</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Roadmap Section -->
    <!--?php include('roadmap.php') ?-->
    <!-- Customer Reviews Section -->
    <!-- <section class="reviewBlock">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 mx-auto">
            <div class="section-hd mb-0"><h2 class="editable" id="cr_custrev_hd" contenteditable="true">Customer Reviews</h2></div>
          </div>
        </div>

        <div class="owl-carousel owl-theme mb-5">
          <?php foreach ($reviews as $review): ?>
            <div class="item">
                <div class="review-avatar">
                    <?php if (!empty($review['image'])): ?>
                        <img src="<?= base_url('uploads/reviews/' . $review['image']) ?>" alt="<?= $review['customer_name'] ?>" />
                    <?php else: ?>
                        <img src="<?= base_url('assets/images/user01.png') ?>" alt="Default User" />
                    <?php endif; ?>
                </div>
                <div class="review-content">
                    <div class="review-header">
                        <div class="review-name-box">
                            <h3><?= $review['customer_name'] ?></h3>
                            <span class="text-muted"><?= $review['designation'] ?></span>
                        </div>
                        <span class="text-muted"><?= date('h:i A', strtotime($review['time_of_comment'])) ?></span>
                    </div>

                    <div class="sub-header w-100 d-flex justify-content-start align-items-start flex-column">
                        <h4><?= $review['company_name'] ?></h4>
                        <p><?= $review['company_tagline'] ?></p>
                    </div>
                    <article>
                        <?= $review['comment'] ?>
                    </article>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
      </div>
    </section> -->

    <section class="reviewBlock">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 mx-auto">
            <div class="section-hd mb-0"><h2 class="editable" id="cr_custrev_hd" contenteditable="true">Customer Reviews</h2></div>
          </div>
        </div>
     
        <div class="owl-carousel owl-theme mb-5" id="review-carousel">
        <?php foreach ($reviews as $review): 

        ?>
          <!-- <div class="item">
            <div class="review-item">
              <div class="poster">
                <img src="<?= base_url('assets/images/rev-itempostr01.png') ?>" alt="">
              </div>
              <div class="revContntarea">
                <div class="ttlArea">
                  <div class="user-info">
                    <div class="phto">
                      <?php if (!empty($review['image'])): ?>
                          <img src="<?= base_url('uploads/reviews/' . $review['image']) ?>" alt="<?= $review['customer_name'] ?>" />
                      <?php else: ?>
                          <img src="<?= base_url('assets/images/user01.png') ?>" alt="Default User" />
                      <?php endif; ?>
                    </div>
                    <h3><strong><?= $review['customer_name'] ?></strong>   <?= $review['designation'] ?></h3>

                  </div>
                  <span class="time"><?= date('h:i A', strtotime($review['time_of_comment'])) ?></span>
                </div>
                <div class="parablock">
                  <h4>Swanner</h4>
                  <h2><a href="<?= $review['link'] ?>" style="text-decoration:none; cursor:pointer; color:#080c0d;" target="_blank"><?= $review['company_tagline'] ?></a></h2>
                  <p class="short-comment"><?= substr($review['comment'], 0, 90) . '...' ?></p>
                <div class="full-comment" style="display: none;">
                  <p><?= $review['comment'] ?></p>
                </div>
                <a href="javascript:void(0);" class="link-more" onclick="toggleContent(this)">Read more</a>
                </div>
                <div class="bottmrow">
                </div>

              </div>
            </div>
          </div> -->

          <blockquote class="twitter-tweet" data-theme="dark" align="center">
            <a href="<?= preg_replace('/https?:\/\/x\.com/i', 'https://twitter.com', $review['link']) ?>" data-dnt="true"></a>
          </blockquote>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Explore NFTs Section -->
    <section class="exploreBlock">
      <div class="skewed"></div>
      <div class="container position-relative">
        <h2>Explore NFT's</h2>
        <a href="#" class="view-all">View All</a>
        <div class="owl-carousel owl-theme" id="explore-carousel">
          
          <?php foreach ($nfts as $nft): ?>
                <div class="item">
                    <div class="nft-photo-block">
                        <span class="wishlist-line">
                            <img src="<?= base_url('assets/images/line-heart.png') ?>" alt="Wishlist" />
                        </span>
                        <img src="<?= base_url('uploads/nfts/' . $nft['image']) ?>" alt="NFT Image" />
                    </div>

                    <div class="nft-title"><?= $nft['title'] ?></div>
                    <div class="nft-user">
                        <span class="icon">
                            <img src="<?= base_url('uploads/nfts/' . $nft['handler_image']) ?>" alt="Handler Image" />
                        </span>
                        <?= $nft['handler_name'] ?>
                    </div>
                    <div class="w-100 d-flex justify-content-between align-items-center flex-row">
                        <div class="w-50 d-flex justify-content-start align-items-start flex-column">
                            <div class="nft-price-block">
                                <p>Price</p>
                            </div>
                            <div class="nft-price">
                                <img src="<?= base_url('assets/images/xrp-logo.png') ?>" alt="XRP Logo" class="nft-icon" />
                                <?= number_format($nft['price'], 2) ?> XRP
                            </div>
                        </div>
                        <a href="<?= $nft['external_link'] ?>" target="_blank" class="btn explore-itm-btn">
                            <img src="<?= base_url('assets/images/explore-arrow-btn.png') ?>" alt="Explore" />
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

         
        </div>

        <!-- Money Safe Block Section -->
        <section class="money-safe-block">
          <div class="container">
            <div class="money-safe-content">
              <div class="money-safe-text">
                <h2 class="editable" id="cr_money_hd" contenteditable="true">Your money’s safe space</h2>
                <p class="editable" id="cr_money_para" contenteditable="true">
                  Reaper Financial and RPR Token serve the digital ecosystem as
                  a natural market regulation tool for a decentralized economy.
                  By unleashing the natural aspect of death upon an artificially
                  created universe, we serve to preserve the value of every
                  entity within.
                </p>

                <a href="#" class="money-safe-btn">About Capital Revival</a>
              </div>
              <div>
                <img
                  src="assets/images/capital-large-logo.png"
                  alt="Capital Revival Logo"
                  class="money-safe-img"
                />
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- <div class="skewed2"></div> -->
    </section>

    <section class="capitalArea">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 mx-auto">
            <div class="section-hd mb-0"><h2 class="editable" contenteditable="true" id="cr_caprel_hd">Capital Revival Blog</h2></div>
          </div>
        </div>

        <div class="owl-carousel owl-theme mb-5" id="capial-carousel">

           <?php
            // Split blogs into groups of 2 for the carousel
            $blog_chunks = array_chunk($blogs, 2);
            foreach ($blog_chunks as $chunk): ?>
                <div class="item">
                    <?php foreach ($chunk as $blog): ?>
                        <div class="capitalItem">
                            <div class="capital-poster">
                                <?php if (!empty($blog['image'])): ?>
                                    <img src="<?= base_url('uploads/blogs/' . $blog['image']) ?>" alt="Blog Image">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/images/archive_posternoimg.png') ?>" alt="No Image Available">
                                <?php endif; ?>
                            </div>
                            <div class="capital-content">
                                <div class="user">
                                <?php if (!empty($blog['blogger_image'])): ?>
                                    <img src="<?= base_url('uploads/blogs/' . $blog['blogger_image']) ?>" alt="<?= $blog['blogger_name'] ?>">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/images/capital-user-no-img.png') ?>" alt="No Image Available">
                                <?php endif; ?>
                                </div>
                                <h3 class="userName"><?= $blog['blogger_name'] ?>    <?= date('F j, Y', strtotime($blog['date'])) ?></h3>
                                <h2><?= $blog['title'] ?></h2>
                                <p><?= substr($blog['description'], 0, 100) ?>...</p>
                                <a href="<?= base_url('archives/details/' . $blog['slug']) ?>" class="btn btn-link" target = "_blank" >Read more</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

        </div>
      </div>
      <!-- FAQ Section -->
      <?php include('faq.php') ?>
    </section>

    <!-- Contact Form Section -->
    <?php include('contactUs.php') ?>

    <script>
      $(document).ready(function () {
        $("#review-carousel").owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true,
          responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 2 },
          },
        });
      });

      function toggleContent(link) {
        const shortComment = link.previousElementSibling.previousElementSibling; // The short comment (p.short-comment)
        const fullComment = link.previousElementSibling; // The full comment div

        const isVisible = fullComment.style.display === "block";

        if (isVisible) {
          // Collapse the full comment and show the shortened one
          fullComment.style.display = "none";
          shortComment.style.display = "block";
          link.textContent = "Read more"; // Change the link text
        } else {
          // Show the full comment and hide the shortened one
          fullComment.style.display = "block";
          shortComment.style.display = "none";
          link.textContent = "Read less"; // Change the link text

          // Auto-collapse after 3 minutes (180,000 ms)
          setTimeout(() => {
            fullComment.style.display = "none";
            shortComment.style.display = "block";
            link.textContent = "Read more"; // Reset the link text
          }, 6000); // 3 minutes
        }
      }
    </script>
    

    <!-- Footer Section -->
    <?php $this->load->view('user/footer'); ?>
    

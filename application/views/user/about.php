<?php include('header.php') ?>
    <!-- Inner Banner Section -->
    <section class="inner-banner">
      <div class="bannerposter"><img  class="editable" id="cr_about-img" contenteditable="true" src="<?= base_url('assets/images/about.png') ?>" alt=""></div>
    </section>
    <section class="about-detailarea">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="pg-heading editable"  id="cr_about_pghd" contenteditable="true"><h2>About Us</h2></div>
            <article>
              <p class="heading editable"  id="cr_about_para" contenteditable="true">
                Reaper Financial and RPR Token serve the digital ecosystem as a
                natural market regulation tool for a decentralized economy. By
                unleashing the natural aspect of death upon an artificially
                created universe we serve to preserve the value of every entity
                within. While digital economies are known for their volatility,
                The Reaper seeks to remove the excess and unvalued assets in
                order to prevent violent market swings. Reaper Financial
                accomplishes this mission through a decentralized voting
                mechanism in which the value of RPR is used to purchase and
                destroy the undervalued assets. Because all assets destroyed are
                purchased at market value, no investors are damaged in the
                process of a Reaping; only those projects whose reputation and
                credibility warrants reaping are eligible as a means of
                protecting all parties involved. Reaper Financial is a
                responsible partner of the community of which we are a part and
                will at no time take action that is not for the betterment of
                the community at large. As members of the XRP Ledger, we are a
                carbon neutral and environmentally considerate solution to
                excess both in the digital universe and the tactile facsimile in
                which we live.
              </p>
              <p class="heading editable"  id="cr_about_para2" contenteditable="true">
                Reaper Financial and RPR Token serve the digital ecosystem as a
                natural market regulation tool for a decentralized economy. By
                unleashing the natural aspect of death upon an artificially
                created universe we serve to preserve the value of every entity
                within. While digital economies are known for their volatility,
                The Reaper seeks to remove the excess and unvalued assets in
                order to prevent violent market swings. Reaper Financial
                accomplishes this mission through a decentralized voting
                mechanism in which the value of RPR is used to purchase and
                destroy the undervalued assets. Because all assets destroyed are
                purchased at market value, no investors are damaged in the
                process of a Reaping; only those projects whose reputation and
                credibility warrants reaping are eligible as a means of
                protecting all parties involved. Reaper Financial is a
                responsible partner of the community of which we are a part and
                will at no time take action that is not for the betterment of
                the community at large. As members of the XRP Ledger, we are a
                carbon neutral and environmentally considerate solution to
                excess both in the digital universe and the tactile facsimile in
                which we live.
              </p>
            </article>
          </div>
        </div>
      </div>
    </section>



    <!-- Explore NFTs Section -->
    <section class="exploreBlock executive" style="background: #222224;">
      <div class="skewed" style="background: #222224;"></div>
      <div class="container position-relative">
        <h5>The Reaper Team</h5>
        <h2>The Executives</h2>
        
        <!-- Executive Team Section -->
    <section class="executive-area">
      <div class="container">
          <div class="row">
              <?php if (!empty($executives)): ?>
                <?php foreach ($executives as $executive): ?>
                    <div class="col-md-4 px-2">
                        <div class="executive-card">
                            <img src="<?= base_url('uploads/executives/' . $executive['image']) ?>" alt="<?= $executive['name'] ?>">
                            <div class="executive-info">
                                <h5><?= $executive['name'] ?></h5>
                                <p><?= $executive['position'] ?></p>
                                <div class="executive-social">
                                    <?php if (!empty($executive['facebook_link'])): ?>
                                        <a href="<?= $executive['facebook_link'] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <?php endif; ?>
                                    <?php if (!empty($executive['x_link'])): ?>
                                        <a href="<?= $executive['x_link'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if (!empty($executive['linkedin_link'])): ?>
                                        <a href="<?= $executive['linkedin_link'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No executives found.</p>
            <?php endif; ?>
              
          </div>
      </div>
  </section>

       
      </div>
      <!-- <div class="skewed2"></div> -->
    </section>



    <!-- Contact Form Section -->
     <?php include('contactUs.php') ?>

    <!-- Footer Section -->
   <?php include('footer.php') ?>
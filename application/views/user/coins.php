<?php include('header.php') ?>
    <!-- Inner Banner Section -->
    <section class="inner-banner" style="background: #AA3E3E;">
      <div class="bannerposter"><img class="editable" id="cr_coins-img" contenteditable="true" src="<?= base_url('assets/images/trustline.png') ?>"></div>
    </section>
    <section class="about-detailarea">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="pg-heading editable" id="cr_coins_pghd" contenteditable="true"><h2>Hard Slot & Passive Income Coins</h2></div>
            <article class="editable"  id="cr_coins_paragraph" contenteditable="true">
              
             <p>   
              The following is a list of coins that offer the opportunity to earn rewards through hard slots or passive income. Hard slot coins refer to those that are eligible for automatic DRIPs from the reaping rewards, while passive income coins allow you to earn rewards simply by holding the associated coins.
              </p>
              <p>In order to earn Utilitex, you need to hold Treasury; to earn SNX, you need to hold Xoge; and to earn ASH, you need to hold XQK. Holding each of these coins not only supports their respective networks, but also yields rewards. However, it is important to note that some of these passive income coins may require additional action beyond simply holding, and we strongly advise holders to conduct their own research in this constantly evolving field to maximize their potential rewards.</p>
              <p>
                It is important to set up TrustLines for all of the Hard Slots and Passive Income Coins in order to ensure that you don’t miss out on any rewards in the future. By doing so, you can benefit from the rewards offered by Ascension DRIPs. It is also recommended to visit the websites by clicking on the name of each coin to learn more about their ecosystems and the benefits of holding their associated tokens.
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
        
        <!-- TrustLine Area Section -->
    <section class="trustline-area">
      <div class="container">
        <?php
          if($trustlines){
            foreach($trustlines as $trustline) {
        ?>
          <div class="row d-flex justify-content-between align-items-center flex-row">
              <div class="slot-item">
                      <div class="trustline-item">
                          <span><a href="<?=$trustline['title_link']?>" target="_blank" style="text-decoration: none; color: #000;"><?=$trustline['title']?></a></span>
                          <!-- <span><i class="fas fa-star"></i> Current Vote, Hard Slot</span> -->
                      </div>
              </div>
              <div class="slot-item">
                      <a href="<?=$trustline['trustline_link']?>" target="_blank" class="trustline-btn" style="text-decoration: none; cursor: pointer;"><i class="fa-regular fa-circle-check"></i> Set TrustLine</a> <!-- class - trustline-active -->
              </div>
          </div>
        <?php }}?>
      </div>
  </section>

  <!-- Additional Coins Section -->
  <section class="add-coins-area">
    
  </section>

       
      </div>
      <!-- <div class="skewed2"></div> -->
    </section>

 <!-- Contact Form Section -->
     <?php include('contactUs.php') ?>

    <!-- Footer Section -->
   <?php include('footer.php') ?>
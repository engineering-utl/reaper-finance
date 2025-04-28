<footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center">
            <div class="footerleftblock">
              <img
                src="<?php echo base_url('assets/images/footer-logo.png')?>"
                alt="Capital Revival Logo"
                class="footer-logo"
              />
              <p class="editable" id="cr_footer_para3" contenteditable="true">
                Capital Revival and RPR Token function as a market regulation
                tool for the decentralized economy. They utilize the concept of
                natural death in a digital ecosystem to preserve the value of
                all entities within it. This approach endeavors to create a
                stable and natural market environment for financial
                participants.
              </p>
            </div>
          </div>
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-3">
                <h5>Ecosystem</h5>
                <ul>
                  <?php 
                  if($Ecosystem): foreach ($Ecosystem as $key => $value):?>
                  <li><a href="<?=$value['link']?>"> <?=$value['title']?></a></li>
                  <?php endforeach; endif;?>
                </ul>
                <h5 class="mt-5">QFS Family</h5>
                <ul>
                <?php 
                  if($ReaperFamily): foreach ($ReaperFamily as $key => $value):?>
                  <li><a href="<?=$value['link']?>"> <?=$value['title']?></a></li>
                  <?php endforeach; endif;?>
                </ul>
              </div>
              <div class="col-md-3">
                <h5>Social Media</h5>
                <ul>
                <?php 
                  if($SocialMedia): foreach ($SocialMedia as $key => $value):?>
                  <li><a href="<?=$value['link']?>"> <?=$value['title']?></a></li>
                  <?php endforeach; endif;?>
                </ul>
                <h5 class="mt-5">Legal</h5>
                <ul>
                <?php 
                  if($Legal): foreach ($Legal as $key => $value):?>
                  <li><a href="<?=$value['link']?>"> <?=$value['title']?></a></li>
                  <?php endforeach; endif;?>
                </ul>
              </div>
              <div class="col-md-3">
                <h5>Main Menu</h5>
                <ul>
                <?php 
                  if($MainMenu): foreach ($MainMenu as $key => $value):?>
                  <li><a href="<?=$value['link']?>"> <?=$value['title']?></a></li>
                  <?php endforeach; endif;?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="important-message">
            <p class="editable" id="cr_footer_para" contenteditable="true">
              Important information: Digital assets are exposed to various
              risks, such as price fluctuations. Investing in digital assets can
              lead to substantial losses and may not be suitable for all
              investors. Digital asset markets and exchanges are not subject to
              the same level of oversight and consumer protections as
              traditional financial products, and are susceptible to an
              ever-changing regulatory landscape. Digital assets are generally
              not considered legal tender and are not covered by deposit
              protection insurance. Historical performance of digital assets
              should not be used as an indicator of future results. For more
              information, please refer to our Privacy Policy and Terms and
              Conditions, which contain additional disclosures.
            </p>
          </div>
        </div>
        <div class="footer-bottom">
          <p>
            &copy; <span class="editable" id="cr_footer_para1" contenteditable="true">2022-2025 Reaper Financial LLC DBA Capital Revival (2021)</span>  <br />
            <span class="editable" id="cr_footer_para2" contenteditable="true">All Rights Reserved</span>
          </p>
        </div>
      </div>
    </footer>
     <!-- Scroll to Top Button -->
     <button class="scroll-top" id="scrollTopBtn"><i class="fas fa-arrow-up"></i></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/dist/js/custome.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
      $(document).ready(function () {
        $("#explore-carousel").owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true,
          responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 4 },
          },
        });
      });
    </script>

    <script>
      $(document).ready(function () {
        $("#capial-carousel").owlCarousel({
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
    </script>
    <script>
      $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true,
          responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 1 },
          },
        });
      });
    </script>

<script>

  // Scroll to Top Button
  const scrollTopBtn = document.getElementById("scrollTopBtn");

  window.addEventListener("scroll", function() {
      if (window.scrollY > 300) {
          scrollTopBtn.style.display = "block";
      } else {
          scrollTopBtn.style.display = "none";
      }
  });

  scrollTopBtn.addEventListener("click", function() {
      window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>

    <!-- mandetory -->
    <input type="file" id="imageUpload" class="hidden" accept="image/*" />
    <script src="<?php echo base_url('scripts.js'); ?>"></script>
    <!-- mandetory -->
  </body>
</html>
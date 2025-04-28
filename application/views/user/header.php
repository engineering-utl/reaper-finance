<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/footer-logo.ico') ?>">

    <title>Capital Revival - Financial Services</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />

    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/main.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/media.css')?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </head>
  <body id="content">
    <?php include('menu.php') ?>
    <script>
      $(document).ready(function () {
        setTimeout(() => {
          $(".inline-progress").hide();
          $(".inline-progress-label").hide();
          console.log("Scripts loaded");
        }, 2000);
      })
    </script>

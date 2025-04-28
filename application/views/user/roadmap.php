<section class="roadmap">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 mx-auto">
            <div class="section-hd"><h2 class="editable" id="cr_raper_hd">Reaper Financial Roadmap</h2></div>
          </div>
        </div>

        <div class="timeline">

          <?php $i=0; ?>

        <?php foreach ($roadmaps as $roadmap): ?>
          <?php $i++; ?>
          <div class="timeline-item  <?php echo ($i % 2 != 0) ? 'right' : 'left'; ?>">

            <div class="timeline-content">
              <h3><?= date('F d, Y', strtotime($roadmap['roadmap_date'])) ?></h3>
              <p>
                <?= $roadmap['description']?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </section>
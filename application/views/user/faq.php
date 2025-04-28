<section class="faq-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-7 mx-auto">
              <div class="section-hd mb-0">
                <h2 class="editable" contenteditable="true" id="cr_faq_hd">Frequently Asked Questions</h2>
              </div>
            </div>
          </div>

          <div class="accordion" id="faqAccordion">
            <?php if (!empty($faqs)): ?>
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq<?= $index + 1 ?>"
                            >
                                <?= $faq['question'] ?>
                            </button>
                        </h2>
                        <div
                            id="faq<?= $index + 1 ?>"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >
                            <div class="accordion-body">
                                <?= $faq['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No FAQs available.</p>
            <?php endif; ?>
            
          </div>
        </div>
      </section>
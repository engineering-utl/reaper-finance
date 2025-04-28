<!-- Include jQuery from a CDN -->
<!-- <section class="contact-form">
    <div class="container">
        <h2>Contact Us</h2>
        <p>
            We are here to assist you with any questions or concerns you may have.
            Our team is dedicated to providing you with the best service possible.
            Whether you need help, or just want to provide feedback, we are here
            to listen. Please use the form below to reach out to us and we will
            respond as soon as possible. If you have questions, please check our
            <a href="#">FAQs</a>  to see if your question has been answered there
            first.
        </p>
        <form id="contactForm">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">

            <div class="row">
                <div class="col-md-6">
                    <input
                        type="text"
                        name="first_name"
                        class="form-control mb-3"
                        placeholder="First Name"
                        required
                    />
                </div>
                <div class="col-md-6">
                    <input
                        type="text"
                        name="last_name"
                        class="form-control mb-3"
                        placeholder="Last Name"
                        required
                    />
                </div>
            </div>
            <input
                type="email"
                name="email"
                class="form-control mb-3"
                placeholder="Email Address"
                required
            />
            <textarea
                name="message"
                class="form-control mb-3"
                rows="5"
                placeholder="Message (max 500 words)"
                required
            ></textarea>
            <button type="submit" class="btn btn-submit">Send Message</button>
        </form>
        <div id="responseMessage" class="mt-3"></div>
    </div>
</section> -->

<section class="contact-form">
    <div class="container">
    <h2>Contact Us</h2>
    <p>
        We are here to assist you with any questions or concerns you may have.
        Our team is dedicated to providing you with the best service possible.
        Whether you need help, or just want to provide feedback, we are here
        to listen. Please use the form below to reach out to us and we will
        respond as soon as possible. If you have questions, please check our
        <a href="#">FAQs</a>  to see if your question has been answered there
        first.
    </p>
    <p class="mb-1">Contact us for support via these channels:</p>
    <div class="d-flex w100% justify-content-center align-items-center flex-row">
    <a href="https://x.com/Capital_Revival" target="_blank" class="me-2"><img src="<?= base_url('assets/images/twitter.png') ?>" alt=""></a>
    <a href="https://t.me/CapitalRevival" target="_blank" class="me-2"><img src="<?= base_url('assets/images/telegram.png') ?>" alt=""></a>
    <a href="https://discord.com/invite/Tq2zfxGmvC" target="_blank" class="me-2"><img src="<?= base_url('assets/images/discord.png') ?>" alt=""></a>
    </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#contactForm').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            // Serialize form data
            const formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: '<?= base_url('Contact/submit') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#contactForm')[0].reset(); // Reset the form
                    } else {
                        $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX errors
                    console.error(xhr.responseText);
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                }
            });
        });
    });

</script>
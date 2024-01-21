<div class="footer-contact-form">
  <h2 class="heading">
    Receive The Practical And Proactive Legal Guidance
    <span>You Deserve</span>
  </h2>
  <div class="divider center bg-light"></div>
  <form method="post" class="form" id="form">
    <p>
      Fields marked with an&nbsp;<span class="required">*</span>&nbsp;are required
    </p>
    <div class="form-field-group">
      <div class="form-field">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="form-field w-icon">
        <label for="email">Email Address<span class="required">*</span></label>
        <input type="email" id="email" name="email" required>
        <i class="fa fa-check-circle" id="email-icon" aria-hidden="true"></i>
      </div>
      <div class="form-field">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone">
      </div>
    </div>
    <div class="form-field">
      <label for="description">Brief description of your legal issue</label>
      <textarea name="description" id="description" rows="6"></textarea>
    </div>
    <div class="actions">
      <div class="links-container">
        <div class="links">
          <a href="/disclaimer/" id="showDisclaimer">Disclaimer</a>&nbsp;|&nbsp;<a href="/privacy/">Privacy Policy</a>
        </div>
        <div class="disclaimer">
          Disclaimer: The use of the internet or this form for communication with the firm or any individual member of the firm does not establish an attorney-client relationship. Confidential or time-sensitive information should not be sent through this form.
          <button type="button" id="disclaimer__close" class="disclaimer__button--close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="disclaimer-checkbox">
          <input type="checkbox" name="read-disclaimer" id="readDisclaimer" required>
          <label for="readDisclaimer">
            I have read the disclaimer. <span>*</span>
          </label>
        </div>
      </div>
      <button type="submit" name="submit" id="submitButton" class="button button--submit">Schedule Your Free Consultation Today</button>
    </div>
  </form>
  <?php
  if (isset($_GET['sent'])) {
  ?>
    <h5 style="text-align: center; font-style: italic; margin-top: 2em; color: white;">
      <?php
      if ($_GET['sent'] == 'true') {
        echo 'Thank you for your inquiry! We will get in touch with you soon.';
      } else {
        echo 'The message was not sent! Please try again.';
      }
      ?>
    </h5>
  <?php
  }
  ?>
</div>

<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];

  $to = SMTP_FROM;
  $subject = 'Eleff Law Clone Footer Form Submission';
  $message = "Name: $name";
  $message .= "\nEmail: $email";
  $message .= "\nPhone: $phone";
  $message .= "\nLegal Issue: $description";
  $headers[] = 'Content-type: text/plain; charset=utf-8';

  // send test message using wp_mail function.
  $sent = wp_mail($to, $subject, $message, $headers);

  //display message based on the result.
  if ($sent) {
?>
    <script>
      window.location.assign(`${window.location.origin}/${window.location.pathname}?sent=true`);
    </script>
  <?php
  } else {
  ?>
    <script>
      window.location.assign(`${window.location.origin}/${window.location.pathname}?sent=false`);
    </script>
<?php
  }
}
?>
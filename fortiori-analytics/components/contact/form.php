<?php
$image1 = "https://autoadmins.com/images/yootheme/contact-robot1.svg";
?>

<section class="contact-form">
  <div class="content">
    <div class="image">
      <img src="<?php echo $image1; ?>" alt="">
    </div>
    <form method="post" class="form" id="form">
      <h2>Send Us a Line</h2>
      <div class="form-field">
        <label for="name">Name *</label>
        <input type="text" id="name" name="name-input" required>
      </div>
      <div class="form-field">
        <label for="company">Company</label>
        <input type="text" id="company" name="company-input">
      </div>
      <div class="form-field">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email-input" required>
      </div>
      <div class="form-field">
        <label for="message">Message *</label>
        <textarea name="message-input" id="message" rows="10" required></textarea>
      </div>
      <button type="submit" class="button" name="submit">Submit</button>
    </form>
  </div>
  <?php
  if (isset($_GET['sent'])) {
  ?>
    <h5>
      <?php
      if ($_GET['sent'] == 'true') {
        echo 'Your message has been sent! We will get in touch with you soon.';
      } else {
        echo 'The message was not sent! Please try again.';
      }
      ?>
    </h5>
  <?php
  }
  ?>
</section>


<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name-input'];
  $company = $_POST['company-input'];
  $email = $_POST['email-input'];
  $messageInput = $_POST['message-input'];

  $to = SMTP_FROM;
  $subject = 'Fortiori Analytics Contact Form Submission';
  $message = "Name: $name";
  $message .= "\nCompany: $company";
  $message .= "\nEmail: $email";
  $message .= "\nMessage: $messageInput";
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
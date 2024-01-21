<?php
$websiteLogoImgUrl = get_template_directory_uri() . '/images/site-logo.png';
?>

</main>

<footer>
  <div class="logo">
    <a href="<?php echo site_url(); ?>">
      <img src="<?php echo $websiteLogoImgUrl; ?>" alt="<?php echo get_bloginfo('name'); ?>">
    </a>
  </div>
  <div class="text">
    <p>
      Fortiori Analytics, LLC. All rights reserved.
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
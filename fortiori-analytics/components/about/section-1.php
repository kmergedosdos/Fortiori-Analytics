<?php
$image1 = get_template_directory_uri() . '/images/about/about1.webp';
$image2 = get_template_directory_uri() . '/images/about/about2.webp';
$image3 = get_template_directory_uri() . '/images/about/about3.webp';
$image4 = get_template_directory_uri() . '/images/about/about4.webp';
?>

<section class="about-section-1">
  <div class="texts">
    <h1>Unlocking Insights, Empowering Decisions</h1>
    <p>
      At Fortiori Analytics, we believe in the power of data to transform businesses. Our cutting-edge analytics solutions are designed to empower you with actionable insights, enabling informed decision-making and driving your success in a rapidly evolving digital landscape.
    </p>
  </div>
  <div class="images">
    <div class="col">
      <img src="<?php echo $image1; ?>" alt="">
      <img src="<?php echo $image2; ?>" alt="">
    </div>
    <div class="col">
      <img src="<?php echo $image3; ?>" alt="">
      <img src="<?php echo $image4; ?>" alt="">
    </div>
  </div>
</section>
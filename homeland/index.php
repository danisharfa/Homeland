<?php
include 'headerWelcome.php';
?>
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label=""></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label=""></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label=""></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/carousel-1.jpg" class="d-block w-100 h-50" alt="Gambar1" />
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/carousel-2.jpg" class="d-block w-100" alt="Gambar2" />
      <div class="carousel-caption d-none d-md-block">

      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/carousel-3.jpg" class="d-block w-100" alt="Gambar3" />
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="tes">
  <div class="content">
    <div class="card" style="width: 15rem">
      <img src="assets/vincent-wachowiak-8gCmEBVl6aI-unsplash.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <p class="card-text" style="display: flex; justify-content: center">HomeLand Image</p>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="card" style="width: 15rem">
      <img src="assets/laura-davidson-ULP07chR5EQ-unsplash.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <p class="card-text" style="display: flex; justify-content: center">HomeLand Image</p>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="card" style="width: 15rem">
      <img src="assets/jean-philippe-delberghe-Ry9WBo3qmoc-unsplash.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <p class="card-text" style="display: flex; justify-content: center">HomeLand Image</p>
      </div>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>
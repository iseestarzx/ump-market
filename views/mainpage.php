<?php 
require_once('./includes/header.php'); 
?>
<style>
.carousel-img {
  height: 500px;
  object-fit: cover;
  object-position: center;
}
</style>
<!-- Баннер -->

<!-- Баннер end -->
<div class="container">
<section id="panel" class="mb-5 mt-5">
  <div class="row justify-content-center" data-aos="zoom-in">
    <div class="col-md-10 col-lg-8 col-xl-6">
      <div class="card shadow-lg rounded-4 p-5 text-center border-0">
        <h4 class="mb-4 fw-bold text-primary"><?= htmlspecialchars($data['message']) ?></h4>

        <?php if ($data['show_register_link']): ?>
          <div class="row row-cols-1 row-cols-md-2 g-3 justify-content-center">
            <div class="col">
              <a href="index.php?page=register" class="btn btn-success w-100 py-3 rounded-3 shadow-sm">
                <i class="bi bi-person-plus me-2"></i>Зарегистрироваться
              </a>
            </div>
            <div class="col">
              <a href="index.php?page=login" class="btn btn-primary w-100 py-3 rounded-3 shadow-sm">
                <i class="bi bi-box-arrow-in-right me-2"></i>Войти
              </a>
            </div>
          </div>

        <?php else: ?>
          <div class="row row-cols-1 row-cols-md-3 g-3 justify-content-center">
            <div class="col">
              <a href="index.php?page=cart" class="btn btn-outline-success w-100 py-3 rounded-3 shadow-sm">
                <i class="bi bi-cart me-2"></i>Корзина
              </a>
            </div>
            <div class="col">
              <a href="index.php?page=my_orders" class="btn btn-outline-primary w-100 py-3 rounded-3 shadow-sm">
                <i class="bi bi-justify me-2"></i>Мои заказы
              </a>
            </div>
            <div class="col">
              <a href="index.php?page=logout" class="btn btn-outline-danger w-100 py-3 rounded-3 shadow-sm">
                <i class="bi bi-box-arrow-in-left me-2"></i>Выйти
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


<!-- Категория: Еда -->
<section id="food" class="mb-5">
  <h2 class="mb-4 text-primary fw-bold" data-aos="fade-right">
    <i class="bi bi-egg-fried me-2"></i>Еда
  </h2>
  <div class="row g-4">
    <?php foreach ($products as $product): ?>
      <?php if ($product['category'] === 'еда'): ?>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card h-100 shadow-lg border-0 rounded-4">
        <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top rounded-top-4" alt="<?= htmlspecialchars($product['title']) ?>" style="height: 250px; object-fit: contain;" />   
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($product['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
              <span class="fw-bold text-success"><?= htmlspecialchars($product['price']) ?> ₽</span>
              <span class="fw-bold">В наличии: <?= htmlspecialchars($product['xqty']) ?> шт.</span>
              <?php if (isset($_SESSION['user_id']) && $product['xqty'] != 0): ?>
                <a href="index.php?page=addToCart&id=<?= $product['id'] ?>" class="btn btn-primary btn-sm">Купить</a>
              <?php elseif ($product['xqty'] == 0): ?>
                <button class="btn btn-outline-secondary btn-sm" disabled>Нет в наличии</button>
              <?php else: ?>
                <a href="index.php?page=login" class="btn btn-outline-primary btn-sm">Войти, чтобы купить</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>

<!-- Категория: Напитки -->
<section id="drinks" class="mb-5">
  <h2 class="mb-4 text-primary fw-bold" data-aos="fade-right">
    <i class="bi bi-cup-straw me-2"></i>Напитки
  </h2>
  <div class="row g-4">
    <?php foreach ($products as $product): ?>
      <?php if ($product['category'] === 'напитки'): ?>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="card h-100 shadow-lg border-0 rounded-4">
        <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top rounded-top-4" alt="<?= htmlspecialchars($product['title']) ?>" style="height: 250px; object-fit: contain;" />   
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($product['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
              <span class="fw-bold text-success"><?= htmlspecialchars($product['price']) ?> ₽</span>
              <span class="fw-bold">В наличии: <?= htmlspecialchars($product['xqty']) ?> шт.</span>
              <?php if (isset($_SESSION['user_id']) && $product['xqty'] != 0): ?>
                <a href="index.php?page=addToCart&id=<?= $product['id'] ?>" class="btn btn-primary btn-sm">Купить</a>
              <?php elseif ($product['xqty'] == 0): ?>
                <button class="btn btn-outline-secondary btn-sm" disabled>Нет в наличии</button>
              <?php else: ?>
                <a href="index.php?page=login" class="btn btn-outline-primary btn-sm">Войти, чтобы купить</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>

<!-- Категория: Услуги -->
<section id="services" class="mb-5">
  <h2 class="mb-4 text-primary fw-bold" data-aos="fade-right">
    <i class="bi bi-person-fill-up me-2"></i>Услуги
  </h2>
  <div class="row g-4">
    <?php foreach ($products as $product): ?>
      <?php if ($product['category'] === 'услуги'): ?>
        <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
          <div class="card h-100 shadow-lg border-0 rounded-4 text-center">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($product['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
              <a href="#" class="btn btn-primary btn-sm disabled" tabindex="-1" aria-disabled="true" onclick="return false;">Подробнее</a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>


  </div>

<?php require_once('./includes/footer.php'); ?>

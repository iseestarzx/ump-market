<?php require_once('./includes/header.php'); ?>
<div class="container py-5" style="min-height: 900px">
  <h1 class="mb-4">🛒 Ваша корзина</h1>

  <?php if (empty($cartItems)): ?>
    <div class="cart-wrapper d-flex justify-content-center align-items-center" style="min-height: 600px;">
    <div class="alert alert-info">Корзина пуста</div>
</div>
  <?php else: 
    $total = 0;
    foreach ($cartItems as $id => $item): 
      $product = $item['product'];
      $quantity = $item['quantity'];
      $total += $product['price'] * $quantity;
  ?>
    <div class="card mb-3 shadow-sm">
      <div class="row g-0 align-items-center">
        <div class="col-md-3">
          <img src="<?= htmlspecialchars($product['image']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($product['title']) ?>">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($product['title']) ?></h5>
            <p class="card-text text-muted"><?= htmlspecialchars($product['description']) ?></p>
            <p class="card-text">
              <strong><?= $product['price'] ?> ₽</strong> × <?= $quantity ?> = 
              <strong><?= $product['price'] * $quantity ?> ₽</strong>
            </p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="btn-group mb-2" role="group">
            <a href="index.php?page=updateQuantity&id=<?= $id ?>&action=decrease" class="btn btn-outline-danger">−</a>
            <span class="btn btn-outline-primary"><?= $quantity ?></span>
            <a href="index.php?page=updateQuantity&id=<?= $id ?>&action=increase" class="btn btn-outline-success">+</a>
          </div>
          <br>
          <a href="index.php?page=removeFromCart&id=<?= $id ?>" class="btn btn-outline-danger btn-sm">Удалить</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <div class="d-flex justify-content-between align-items-center mt-4 mb-5">
    <div>
      <a href="index.php?page=clearCart" class="btn btn-outline-danger">
        🗑 Очистить корзину
      </a>
    </div>

    <div class="text-end">
      <h4>Итого: <strong><?= $total ?> ₽</strong></h4>
    </div>
  </div>

  <!-- 🔽 Форма оформления заказа -->
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?=htmlspecialchars($error)?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<!-- Тут вывод корзины (твой текущий код) -->

<form method="POST" action="index.php?page=cart" class="mt-4">
  <div class="mb-3">
    <label for="name" class="form-label">Имя</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?=htmlspecialchars($formData['name'])?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Телефон</label>
    <input type="tel" class="form-control" id="phone" name="phone" required value="<?=htmlspecialchars($formData['phone'])?>">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Адрес доставки</label>
    <textarea class="form-control" id="address" name="address" required><?=htmlspecialchars($formData['address'])?></textarea>
  </div>
  <div class="mb-3">
    <label for="delivery_method" class="form-label">Способ доставки</label>
    <select class="form-select" id="delivery_method" name="delivery_method" required>
      <option value="">Выберите...</option>
      <option value="самовывоз" <?= ($formData['delivery_method'] === 'самовывоз') ? 'selected' : '' ?>>Самовывоз</option>
      <option value="курьер" <?= ($formData['delivery_method'] === 'курьер') ? 'selected' : '' ?>>Курьером</option>

    </select>
  </div>
  <div class="mb-3">
    <label for="payment_method" class="form-label">Способ оплаты</label>
    <select class="form-select" id="payment_method" name="payment_method" required>
      <option value="">Выберите...</option>
      <option value="наличные" <?= ($formData['payment_method'] === 'наличные') ? 'selected' : '' ?>>Наличными при получении</option>
      <option value="онлайн" <?= ($formData['payment_method'] === 'онлайн') ? 'selected' : '' ?>>Онлайн</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success btn-lg">✅ Оформить заказ</button>
</form>
<!-- форма оформления корзины end -->

  <?php endif; ?>
</div>

<?php require_once('./includes/footer.php'); ?>

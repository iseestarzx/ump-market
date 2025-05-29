<?php require_once('./includes/header.php'); ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card shadow-sm border-success">
        <div class="card-header bg-success text-white text-center">
          <h3 class="mb-0">🎉 Заказ успешно оформлен!</h3>
        </div>
        <div class="card-body">
          <p class="lead text-center mb-4">Спасибо за ваш заказ, <strong><?= htmlspecialchars($formData['name']) ?></strong>!</p>
          <p class="lead text-center mb-4">Для подтверждения заказа наш менеджер скоро свяжется с вами, по указанному номеру: <strong><?= htmlspecialchars($formData['phone']) ?></strong></p>

          <div class="mb-3">
            <h5>📦 Номер заказа: <span class="text-success">#<?= $order_id ?></span></h5>
          </div>

          <ul class="list-group mb-4">
            <li class="list-group-item">
              <strong>Телефон:</strong> <?= htmlspecialchars($formData['phone']) ?>
            </li>
            <li class="list-group-item">
              <strong>Адрес доставки:</strong> <?= htmlspecialchars($formData['address']) ?>
            </li>
            <li class="list-group-item">
              <strong>Способ доставки:</strong> <?= htmlspecialchars(mb_strtoupper(mb_substr($formData['delivery_method'], 0, 1)) . mb_substr($formData['delivery_method'], 1)) ?>
            </li>
            <li class="list-group-item">
              <strong>Способ оплаты:</strong> <?= htmlspecialchars(mb_strtoupper(mb_substr($formData['payment_method'], 0, 1)) . mb_substr($formData['payment_method'], 1)) ?>
            </li>
            <li class="list-group-item">
              <strong>Сумма заказа:</strong> <?= number_format($total, 2, ',', ' ') ?> ₽
            </li>
          </ul>

          <div class="text-center">
            <a href="index.php" class="btn btn-outline-primary btn-lg">
              ⬅ Вернуться на главную
            </a>
            <a href="#" class="btn btn-outline-success btn-lg disabled" tabindex="-1" aria-disabled="true" onclick="return false;">
              Оплатить
            </a>
            <a href="#" class="btn btn-outline-danger btn-lg disabled" tabindex="-1" aria-disabled="true" onclick="return false;">
              Отменить заказ
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('./includes/footer.php'); ?>

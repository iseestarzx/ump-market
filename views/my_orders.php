<?php 
require_once('./includes/header.php'); 
?>

<div class="container py-5" style="min-height: 900px">
    <h1 class="mb-4">Мои заказы</h1>
<?php if (!empty($errorMessage)): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
<?php endif; ?>

<?php if (!empty($successMessage)): ?>
  <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
<?php endif; ?>
    <?php if (empty($orders)): ?>
        <div class="alert alert-info">У вас ещё нет заказов.</div>
    <?php else: ?>
    <?php foreach ($orders as $order): ?>


        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <strong>Заказ #<?= htmlspecialchars($order['id']) ?></strong> — <?= htmlspecialchars($order['created_at']) ?>
            </div>
            <div class="card-body">
                <p><strong>Имя:</strong> <?= htmlspecialchars($order['name']) ?></p>
                <p><strong>Телефон:</strong> <?= htmlspecialchars($order['phone']) ?></p>
                <p><strong>Адрес:</strong> <?= htmlspecialchars($order['address']) ?></p>
                <p><strong>Доставка:</strong> <?= htmlspecialchars($order['delivery_method']) ?></p>
                <p><strong>Оплата:</strong> <?= htmlspecialchars($order['payment_method']) ?></p>
                <p><strong>Статус:</strong> 
                    <?php
                        $status = htmlspecialchars($order['status']);
                        $badgeClass = match($status) {
                            'новый' => 'badge bg-warning text-dark',
                            'оплачен' => 'badge bg-success',
                            'выполнен' => 'badge bg-success',
                            'отменен' => 'badge bg-danger',
                            default => 'badge bg-secondary'
                        };
                    ?>
                    <span class="<?= $badgeClass ?>"><?= $status ?></span>
                </p>
                <p><strong>Итог:</strong> <?= htmlspecialchars($order['total']) ?> ₽</p>

                <h5 class="mt-4">Товары:</h5>
                <ul class="list-group">
                    <?php foreach ($order['items'] as $item): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <?= htmlspecialchars($item['title']) ?> —
                                <?= htmlspecialchars($item['quantity']) ?> × <?= htmlspecialchars($item['price']) ?> ₽
                            </div>
                            <div><strong><?= htmlspecialchars($item['quantity'] * $item['price']) ?> ₽</strong></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php 
require_once('./includes/footer.php'); 
?>

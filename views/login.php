<?php require_once('./includes/header.php');?>

<div class="container" style="min-height: 800px">
  <section id="register" class="my-5">
    <h1 class="mb-4 fw-bold text-center" data-aos="fade-down">Вход</h1>
    <p class="lead text-center text-muted mb-5" data-aos="fade-up">
    Войти на сайт
    </p>

    <?php if ($message): ?>
      <div class="alert alert-info" role="alert">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form data-aos="fade-up" method="POST" action="index.php?page=login" class="mx-auto" style="max-width: 400px;" id="registerForm" onsubmit="return validatePasswords()">
      <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль" required>
      </div>


      <button type="submit" class="btn btn-primary w-100">Войти</button>
    </form>
  </section>
</div>

<?php require_once('./includes/footer.php');?>
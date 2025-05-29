<?php require_once('./includes/header.php');?>

<div class="container" style="min-height: 800px">
  <section id="register" class="my-5">
    <h1 class="mb-4 fw-bold text-center" data-aos="fade-down">Регистрация</h1>
    <p class="lead text-center text-muted mb-5" data-aos="fade-up">
    Регистрация для оформления заказов и услуг
    </p>

    <?php if ($message): ?>
      <div class="alert alert-info" role="alert">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form data-aos="fade-up" method="POST" action="index.php?page=register" class="mx-auto" style="max-width: 400px;" id="registerForm" onsubmit="return validatePasswords()">
      <div class="mb-3">
        <label for="name" class="form-label">Логин</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введите логин" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль" required>
      </div>

      <div class="mb-4">
        <label for="password_confirm" class="form-label">Повторите пароль</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Повторите пароль" required>
      </div>

      <button type="submit" class="btn btn-success w-100">Зарегистрироваться</button>
    </form>
  </section>
</div>

<script>
  function validatePasswords() {
    const pwd = document.getElementById('password').value;
    const pwdConfirm = document.getElementById('password_confirm').value;

    if (pwd !== pwdConfirm) {
      alert('Пароли не совпадают. Пожалуйста, попробуйте ещё раз.');
      return false; // Отменить отправку формы
    }
    return true; // Все ок, отправляем форму
  }
</script>

<?php require_once('./includes/footer.php');?>
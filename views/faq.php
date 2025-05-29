<?php require_once('./includes/header.php');?>

<!-- faq.php -->

<div class="container py-5" style="min-height: 900px">
  <h1 class="mb-4 fw-bold text-center" data-aos="fade-down">Часто задаваемые вопросы</h1>
  <p class="lead text-center text-muted mb-5" data-aos="fade-up">
    Ответы на вопросы
  </p>

  <div class="accordion" id="faqAccordion" data-aos="fade-up">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" 
          aria-expanded="true" aria-controls="collapseOne">
          Как оформить заказ?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Для оформления заказа выберите нужные товары, добавьте их в корзину и перейдите к оформлению.
        </div>
      </div>
    </div>
        <div class="accordion-item">
      <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" 
          aria-expanded="true" aria-controls="collapseFour">
          Способы доставки
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          На данный момент, мы работаем в организации ГБУ РС(Я) "ССМП" и в поле адрес при оформлении заказа вы можете указать № кабинета
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" 
          aria-expanded="false" aria-controls="collapseTwo">
          Какие способы оплаты доступны?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          На данный момент, мы принимаем оплату только вчерез ЮКасса и наличными при доставке.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" 
          aria-expanded="false" aria-controls="collapseThree">
          Как связаться со службой поддержки?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Вы можете написать WhatsApp / Telegram, написать на email. см. раздел "Контакты" на сайте.
        </div>
      </div>
    </div>
  </div>
</div>




<?php require_once('./includes/footer.php');?>

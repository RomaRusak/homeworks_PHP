<section class="get-cosultation appearance">
    <div class="get-consultation-inner-block">
        <h2 class="section-title get-consultation-title" id="contacts-title">
            заказать Консультацию специалиста
        </h2>
        <p class="get-consultation-description">
            Заполните форму и мы свяжемся с вами в ближайшее время!
        </p>
        <div class="get-consulatation-form-wrapper">
            <form action="../service/formHandler.php" method="POST">
                <input type="email" name="email" placeholder="Ваша почта" />
                <input type="tel" name="phone" placeholder="Номер вашего телефона" />
                <input type="text" name="question" placeholder="Ваш вопрос" />
                <div class="concert-wrapper">
                    <input name="confirm" type="checkbox" id="getConsultationCheckbox" />
                    <label for="getConsultationCheckbox">Я согласен с условиями обработки персональных данных
                    </label>
                </div>
                <div class="form-button-wrapper">
                    <button class="get-consultation-button">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</section>
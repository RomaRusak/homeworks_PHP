<?php require_once './data/servicesData.php'; ?>
<section class="our-services appearance">
    <h2 class="our-services-title section-title" id="services-title">
        Наши услуги
    </h2>
    <div class="our-services-inner-block">

        <?php
        if (!empty($services_data)) :
            foreach ($services_data as $item) :
        ?>

                <div class="our-services-item">
                    <header class="our-services-header"><?= $item['title'] ?></header>
                    <div class="our-services-list-wrapper">
                        <ul class="our-services-list">
                            <?php
                            if (!empty($item['description'])) :
                                foreach ($item['description'] as $li) :
                            ?>

                                    <li class="our-services-link">
                                        <?= $li ?>
                                    </li>

                            <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <footer class="our-services-footer">
                        <p>
                            от <span class="our-services-footer-bold"><?= $item['price'] ?> руб.</span>
                        </p>
                    </footer>
                    <button class="our-services-button">Подробнее</button>
                </div>


        <?php
            endforeach;
        endif;
        ?>

    </div>
</section>
<?php require_once './data/ourWorksData.php'; ?>
<section class="our-works appearance">
    <h2 class="our-works-title section-title" id="our-works-title">
        Наши работы
    </h2>
    <div class="our-works-inner-block">
        <?php
        if (!empty($out_works_data)) :
            foreach ($out_works_data as $workExample) :
        ?>

                <div class="our-works-example">
                    <div class="example-logo-wrapper">
                        <img src="<?= $workExample['logo']; ?>" />
                    </div>
                    <p class="example-description">
                        <?= $workExample['ourWorkText']; ?>
                    </p>
                    <div class="example-result">
                        <h3 class="example-title">Результат:</h3>
                        <ul class="example-list">
                            <?php
                            if (!empty($workExample['resultsLi'])) :
                                foreach ($workExample['resultsLi'] as $workLi) :
                            ?>
                                    <li>
                                        <p class="example-list-bold"><?= $workLi['liTitle']; ?> %</p>
                                        <p class="example-list-text">
                                            <?= $workLi['liDescription'] ?>
                                        </p>
                                    </li>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="systems-wrapper">
                        <h3 class="systems-title">Системы:</h3>
                        <div class="systems-logo-wrapper">
                            <?php
                            if (!empty($workExample['systemsLogo'])) :
                                foreach ($workExample['systemsLogo'] as $systems_logo) :
                            ?>
                                    <img src="<?= $systems_logo; ?>">
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>

        <?php
            endforeach;
        endif;
        ?>
    </div>
</section>
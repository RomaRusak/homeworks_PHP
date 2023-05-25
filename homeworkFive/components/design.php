<?php require_once './data/designData.php'; ?>

<section class="design appearance">
    <div class="design-inner-block">
        <h2 class="design-title">Мы знаем толк в дизайне!</h2>
        <div class="design-inner-bottom">
            <?php
            if (!empty($design_data)) :
                foreach ($design_data as $item) :
            ?>

                    <div class="desig-item">
                        <h3 class="design-subtitle"><?= $item['title'] ?></h3>
                        <p class="design-description"><?= $item['subtitle'] ?></p>
                    </div>

            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
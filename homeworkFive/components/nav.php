<?php require_once './data/navData.php' ?>
<nav class="nav">
    <ul class="nav-list">
        <?php
        if (!empty($nav_data)):
        foreach ($nav_data as $item) :
        ?>

            <li>
                <a href="<?= $item['path']; ?>" class="nav-link">
                    <?= $item['linkValue']; ?>
                </a>
            </li>

        <?php
        endforeach;
        endif;
        ?>
    </ul>
</nav>
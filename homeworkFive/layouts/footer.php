<?
require_once './data/footerData.php';

list($leftFooterColumn, $rightFooterColumn) = $footer_data;
?>

<footer class="footer">
    <div class="footer-top">
        <div class="footer-left-part">
            <div class="footer-logo-wrapper">
                <img src="./img/Logo.png" />
            </div>
            <a href="#"> Политика конфиденциальности </a>
            <div class="footer-button-wrapper">
                <button>Обратная связь</button>
            </div>
        </div>
        <div class="footer-right-part">
            <ul class="footer-list">
                <?php
                if (!empty($leftFooterColumn)):
                foreach ($leftFooterColumn as $item) :
                ?>

                    <li>
                        <a href="<?= $item['path']; ?>"><?= $item['linkValue'] ?></a>
                    </li>

                <?php
                 endforeach;
                 endif;
                 ?>
            </ul>
            <ul class="footer-list">
                <?php
                if (!empty($rightFooterColumn)):
                foreach ($rightFooterColumn as $item) :
                ?>

                    <li>
                        <a href="<?= $item['path']; ?>"><?= $item['linkValue'] ?></a>
                    </li>

                <?php 
                endforeach;
                endif;
                ?>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">&copy; 2021 Все права защиены</div>
</footer>

<script src="../scripts/script.js"></script>

</body>

</html>
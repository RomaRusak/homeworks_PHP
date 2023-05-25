<main class="main">
    <div class="container">

        <?php

        if (!empty($_REQUEST['page'])) require_once "./components/" . $_REQUEST['page'] . ".php";
        else {
            require_once "./components/home.php";
            require_once "./components/design.php";
        }
        ?>

    </div>
</main>>
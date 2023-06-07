<?php
require_once './fuctions.php'; 

require_once './session/index.php';
if (!isset($_SESSION['auth'])) header('Location: /admin/login');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .return_withoust_save {
            text-decoration: none;
            color: lightskyblue;
            font-weight: 700;
            cursor: pointer;
            padding: 10px;
            font-size: 2rem;
        }

        form {
            margin-top: 25px;
        }

        header {
            background-color: lavender;
            padding: 10px;
            display: flex;
            justify-content: flex-end;
        }

        header > a {
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            padding: 0 15px;
            letter-spacing: 1.1px;
            text-shadow: 1px 1px 1px black;
            transition: color .3 ease-in-out;
        }

        header >a:hover,
        header >a:focus {
            color: purple;
        }
    </style>

    <? require_once './logout/index.php'; ?>

    <div>
        <a class="return_withoust_save" href="/admin/">Вернуться назад без сохранения изменений</a>
    </div>

    <?php
    $fd = fopen('./path.txt', 'r');        
    $path = fread($fd, filesize('./path.txt'));
    fclose($fd);
    chdir($path);
    if (!empty($_GET['changeFileVal']) && empty($_GET['newContent'])) $content = readChangeableFile($_GET['changeFileVal']);
    if (!empty($_GET['newContent']) && !empty($_GET['changeFileVal'])) {
        editFile($_GET['changeFileVal'], $_GET['newContent']);
        header('Location: /admin/');
    }
    ?>
    <p>Текущий файл: <?= getcwd() . '/' . $_GET['changeFileVal'] ?></p>
    <p>Размер файла: <?= filesize("./{$_GET['changeFileVal']}")  ?> Кб</p>
    <p>Дата последнего изменения файла: <?= date("d.m.Y G:i:s" ,filemtime("./{$_GET['changeFileVal']}"))  ?></p>
    

   <form action="/admin/editFileForm.php">
       <textarea name="newContent" cols="120" rows="30" ><?= $content ?></textarea>
       <input type="hidden" name="changeFileVal" value="<?= $_GET['changeFileVal'] ?>">
       <div>
           <button>Сохранить</button>
       </div>
   </form>
</body>
</html>
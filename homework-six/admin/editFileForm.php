<?php require_once './fuctions.php'; ?>
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
    </style>
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
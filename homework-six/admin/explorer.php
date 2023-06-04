<?php
    if (!empty($_GET)) {
    header('location: ?');
} 

require_once './fuctions.php';
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
        input[type="text"] {
            width: 25%;
        }
    </style>
 
    <form action="/admin/">
        <fieldset>
            <legend style="text-align: center;">Изменить текущий каталог</legend>
            <?php
                if (!empty($_GET['dirVal'])) {
                    $currentPath = getCurrentPath($_GET['dirVal']);
                } else {
                    $currentPath = getCurrentPath('./');
                }
                
                chdir($currentPath);
                ?><p>в данный момент дискриптор находится: <?= getcwd() ?></p><?
                $currentDir = scandir('./');

                for ($i = 0; $i < count($currentDir); $i++) {
                    if ($currentDir[$i] == '.') continue;
                    ?>
                    <ul>
                        <?php
                                if (is_file($currentDir[$i])): echo "<li>$currentDir[$i]</li>";
                                else:
                                ?>
                                <li>
                                    <input type="radio" id="<?= $currentDir[$i] ?>" name="dirVal" value="<?= $currentDir[$i] ?>">
                                    <label for="<?= $currentDir[$i] ?>"><?= $currentDir[$i] ?></label>
                                </li>
                            <?php endif; ?>
                    </ul>
                    <?php
                    
                }
            ?>

            <button>Submit</button>
        </fieldset>

        <fieldset>
            <? 
                if (!empty($_GET['newCatalog']) && !file_exists("./{$_GET['newCatalog']}")) mkdir("./{$_GET['newCatalog']}");
               
            ?>
            <Legend style="text-align: center;">Добавить Каталог</Legend>
            <input type="text" name="newCatalog" placeholder="название нового каталога">
            <button>Submit</button>
        </fieldset>

        <fieldset>
            <? 
                if (!empty($_GET['removeCatalog']) && file_exists("./{$_GET['removeCatalog']}")) rmdir("./{$_GET['removeCatalog']}");
               
            ?>
            <Legend style="text-align: center;">Удалить Каталог</Legend>
            <input type="text" name="removeCatalog" placeholder="название каталога, который следует удалить">
            <button>Submit</button>
        </fieldset>

        
        <fieldset>
            <? 
                if (!empty($_GET['oldCatalogName']) 
                    && !empty($_GET['newCatalogName'])
                    && file_exists("./{$_GET['oldCatalogName']}")
                ) rename($_GET['oldCatalogName'], $_GET['newCatalogName']);
                
               
            ?>
            <Legend style="text-align: center;">Переименовать каталог/файл</Legend>
            <input type="text" name="oldCatalogName" placeholder="название каталога/файла, который следует переименовать">
            <input type="text" name="newCatalogName" placeholder="новое название для каталога/файла">
            <button>Submit</button>
        </fieldset>

        <fieldset>
            <?
                if (!empty($_GET['newFileName'])
                && !file_exists("./{$_GET['newFileName']}")) {
                    createFile($_GET['newFileName']);
                }
            ?>
            <legend style="text-align: center;">Создать файл</legend>
            <input type="text" name="newFileName" placeholder="название нового файла">
            <button>Submit</button>
        </fieldset>

        <fieldset>
            <?
                if (!empty($_GET['removeFile'])
                && file_exists("./{$_GET['removeFile']}")) {
                    removeFile($_GET['removeFile']);
                }
            ?>
            <legend style="text-align: center;">Удалить файл</legend>
            <input type="text" name="removeFile" placeholder="название файла, который следует удалить">
            <button>Submit</button>
        </fieldset>
    </form>

    <form action="/admin/editFileForm.php" method="GET">
        <fieldset>
                <legend style="text-align: center;">Редактировать файл</legend>
                <ul>
                <?
                    $dd = opendir('./');

                    while(($i = readdir($dd)) !== false) {
                        if ($i === '.' || $i === '..') continue;
                        if (is_file("./$i") && !is_dir("./$i")):?>
                            <li>
                                <div>
                                    <input type="radio" id="<?= $i ?>" name="changeFileVal" value="<?= $i ?>">
                                    <label for="<?= $i ?>"><?= $i ?></label>
                                </div>
                            </li>
                        <?
                        endif;
                    }
                    
                    closedir($dd);
                ?>
                </ul>
                <button>Submit</button>
            </fieldset>
    </form>
    
    <form action="/admin/" enctype="multipart/form-data" method="POST">
        <fieldset>
            <?
                if (!empty($_FILES)) {
                    uploadFile();
                } 
            ?>
            <legend style="text-align: center;">Загрузить файл</legend>
            <input type="file" name="upFile">
            <div>
                <button>Submit</button>
            </div>
        </fieldset>
    </form>
</body>
</html>


<?php
function getCurrentPath($newPath)
{

    $fd = fopen('./path.txt', 'r');
    if ($newPath !== './') $newPath .= '/';
    $path = fread($fd, filesize('./path.txt'));
    fclose($fd);

    $fd = fopen('./path.txt', 'w');
    $path .= $newPath;

    fwrite($fd, $path);
    fclose($fd);

    return $path;
}

function createFile($fName) {
    $fd = fopen("./$fName", 'w+');
    fclose($fd);
}

function removeFile($fName) {
    unlink("./$fName");
}

function readChangeableFile($fName) {
    $fd = fopen("./$fName", 'r+');
    $content = '';
    while(($i = fgetc($fd)) !== false) {
        $content .= $i;
    }

    fclose($fd);

    return $content;
}

function editFile($fName, $content) {
    $fd = fopen("./$fName", 'w+');
    fwrite($fd, $content);
    fclose($fd);
}

function uploadFile() {
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads')) mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads');

    function translitText($strIn) {
        $tr = array(
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
            "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
            "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
            "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
            "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
            "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
        );

        foreach($strIn as &$letter) {
            if (array_key_exists($letter, $tr)) $letter = $tr[$letter];
        }

        return implode('',$strIn);
    }

    $name = $_FILES['upFile']['name'];
    $name = preg_replace('/[^\w.]/mu', '', $name);
    $name = translitText(mb_str_split($name));

    $sandbox = $_FILES['upFile']['tmp_name'];
    $endPoint = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $name;
    move_uploaded_file($sandbox, $endPoint);
}
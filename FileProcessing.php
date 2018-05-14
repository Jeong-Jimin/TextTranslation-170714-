<?php

$textView = $_GET['textView']; //--- Text 가져옴

$Subvalue_Check = $_GET['submit']; //---html 값 받는 var
$changevalue = str_split($Subvalue_Check, 1); //--- 메뉴 판별


switch ($changevalue[0]) {

    case 1:
        //--- 문자 치환 (replace);
        $changevalue = $_GET['change'];
        $replacevalue = $_GET['replace'];

        $textView = str_replace("$changevalue", "$replacevalue", $textView);

        echo $textView;

        break;

    case 2:
        //---대문자 => 소문자
        echo strtolower($textView);

        break;

    case 3:
        //--- 소문자 => 대문자
        echo strtoupper($textView);

        break;

    case 4:

        //--- text파일로 저장하기

        $name = $_GET['filename'];

        $handle = fopen("$name.txt", "w");
        $String = $textView;
        fwrite($handle, $String);

        $handle = fopen("$name.txt", "r");

        $filesize = strlen($String); //---file 문자열의 길이

        if (is_file("$name.txt")) {
            echo "file save is successed!!";

        }

        else {
            echo "Do not saved"."$name.txt";
        }

        echo "length of file : ".$filesize;

        echo "contents of file : ".fread($handle, $filesize);

        break;
}



?>
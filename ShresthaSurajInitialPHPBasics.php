<?php
    $addOn="again";
    $addOn2='and again';
    $addOn3='and again';
    echo "First Attempt: Hello World $addOn $addOn2<br/>";
    echo "Second Attempt: Hello World $addOn $addOn2{$addOn3}";
    echo "Third Attempt: "."{$addOn}"."{$addOn2}"."{$addOn3} <br/><hr/>";
?>
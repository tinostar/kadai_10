<?php
//XSS対応（echoする場所で使用）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>

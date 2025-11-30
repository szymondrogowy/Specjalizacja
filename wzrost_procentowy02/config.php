<?php

function out($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
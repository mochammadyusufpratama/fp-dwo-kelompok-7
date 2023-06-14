<?php

$link = new mysqli('localhost', 'root', '', 'dwoadw2023');

if (!$link) {
    die(mysqli_error($link));
}

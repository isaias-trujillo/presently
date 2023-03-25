<?php
function connection()
{

    $testing = mysqli_connect('localhost', 'root', '', 'presently', '3306');
    $onCloud = mysqli_connect('localhost', 'id20497134_cq4a653xoq71xqz3e0ihzru2', 'CAJlvBmjI~A6H^v]', 'id20497134_presently', '3306');
    return $onCloud;
}
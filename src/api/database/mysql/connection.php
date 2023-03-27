<?php
function connection()
{
    return mysqli_connect('localhost', 'root', '', 'presently', '3306');
}
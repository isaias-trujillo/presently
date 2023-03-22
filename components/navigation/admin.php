<?php

const menus = [
    'Estudiantes' => '/presently/pages/admin/students'
];

function buildLinkItem(string $menu, string $link, string $active_menu): string {
    $style = $menu === $active_menu ? 'active' : '';
    $ref = $menu === $active_menu ? '#' : $link;
    return "<li class='$style'><a href='$ref'>$menu</a></li>";
}

function navBar(string $active_menu): string
{
    $items = "";
    foreach (menus as $menu => $link){
        $items .= buildLinkItem($menu, $link, $active_menu);
    }
    return "
    <nav id='navbar'>
        <header>
            <span>Robert Thomas</span>
            <br>
            <span>Admin</span>
        </header>
        <ul>
            $items
        </ul>
        <button class='large-button--dark' id='action' type='button' onclick='onLogout()'>
            Logout
        </button>
    </nav>
    ";
}
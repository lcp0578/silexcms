<?php
include "app/config.php";
include "app/detect.php";

if ($page_name == '') {
    include $browser_t . '/index.html';
} elseif ($page_name == 'index.html') {
    include $browser_t . '/index.html';
} elseif ($page_name == 'protfolio.html') {
    include $browser_t . '/protfolio.html';
} elseif ($page_name == 'contact.html') {
    include $browser_t . '/contact.html';
} elseif ($page_name == 'contact-post.html') {
    include $browser_t . '/contact.html';
    include 'app/contact.php';
} else if(strpos($page_name, '.css')){
    header('Content-Type: text/css');
    include 'public/css/' . $page_name;
}else if(strpos($page_name, '.js')){
    header('Content-Type: text/javascript');
    include 'public/js/' . $page_name;
}else if(strpos($page_name, '.woff')){
    header('Content-Type: application/x-font-woff');
    include 'public/font/' . $page_name;
}else {
    include $browser_t . '/404.html';
}

?>

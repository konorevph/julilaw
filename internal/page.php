<?php

include getenv("ROOTPATH") . "/internal/components/component.php";

$styles = [];
$scripts = [];
$uri = $_SERVER["REQUEST_URI"];

$json = json_decode(file_get_contents(getenv("ROOTPATH") . "/internal/pages.json"), true);

if (!isset($json[$uri])) {
    $uri = "/404/";
}

$page_data = $json[$uri];

foreach ($page_data['components'] as $component) {
    $style = Component::getStyle($component["name"]);
    $script = Component::getScript($component["name"]);
    if ($style !== "" && !in_array($style, $styles)) $styles[] = $style;     
    if ($script !== "" && !in_array($script, $scripts)) $scripts[] = $script;
}

// header
$data = Component::getData("header", 0);
$data['styles'] = $styles;
$data["title"] = $page_data["title"];
$data["current_uri"] = $_SERVER['REQUEST_URI'];
echo Component::parseTemplate("header", $data);

// body
foreach ($page_data['components'] as $component) {
    $data = Component::getData($component["name"], $component["id"]);
    if ($data === null) $data = array();
    echo Component::parseTemplate($component["name"], $data);
}

// footer

$scripts[] = "/scripts/header.js";

$data = Component::getData("footer", 0);
$data2 = Component::getData("header", 0);
$data['links'] = $data2['links'];
$data["current_uri"] = $_SERVER['REQUEST_URI'];
$data["scripts"] = $scripts;
echo Component::parseTemplate("footer", $data);

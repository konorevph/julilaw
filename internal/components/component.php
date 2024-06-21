<?php

class Component {
    private static $templatesPath = "/internal/components/templates/";
    private static $dataPath = "/internal/components/data/";

    public static function getStyle(string $name): string {
        if (!file_exists(getenv("ROOTPATH") . self::$dataPath . "$name.json")) return "";
        $json = json_decode(file_get_contents(getenv("ROOTPATH") . self::$dataPath . "$name.json"), true);
        return isset($json["style"]) ? $json["style"] : "";
    }

    public static function getScript(string $name): string {
        if (!file_exists(getenv("ROOTPATH") . self::$dataPath . "$name.json")) return "";
        $json = json_decode(file_get_contents(getenv("ROOTPATH") . self::$dataPath . "$name.json"), true);
        return isset($json["script"]) ? $json["script"] : "";
    }

    public static function getData(string $name, int $id): array
    {
        if (!file_exists(getenv("ROOTPATH") . self::$dataPath . "$name.json")) return array();
        $json = json_decode(file_get_contents(getenv("ROOTPATH") . self::$dataPath . "$name.json"), true);
        return isset($json["data"]) && isset($json["data"][$id]) ? $json["data"][$id] : array();
    }

    public static function parseTemplate(string $name, array $data): string {
        ob_start();
        extract($data);
        include getenv("ROOTPATH") . self::$templatesPath . "$name.php";
        $content = ob_get_clean();
        return $content;
    }
}

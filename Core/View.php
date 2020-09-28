<?php

namespace Core;

class View
{
    public static function render(string $path, array $data = [])
    {
        try {
            $fullPath = __DIR__ . '/../Views/' . $path . '.php';

            if (!file_exists($fullPath)) {
                throw new \Exception('view cannot be found');
            }

            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $$key = $value;
                }
            }

            include($fullPath);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
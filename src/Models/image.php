<?php

namespace App\Models;

use function App\Utils\absolute_url;

class Image {
    public static function fetchImages($url): array
    {
        // Получаем содержимое HTML страницы по указанному URL
        $html = file_get_contents($url);

        // Проверяем, что удалось получить содержимое HTML
        if ($html === false) {
            // Если не удалось, возвращаем пустой массив
            return [];
        }

        // Ищем все теги <img> и извлекаем значения атрибута src
        preg_match_all('/<img[^>]+src=["\']?([^"\'>]+)["\']?/i', $html, $matches);

        // Создаем массив абсолютных URL изображений
        $images = array_map(function($src) use ($url) {
            // Преобразуем относительный URL изображения в абсолютный с учетом основной страницы
            return absolute_url($src, $url);
        }, $matches[1]);

        // Возвращаем массив абсолютных URL изображений
        return $images;
    }

    public static function calculateTotalSize($images): int
    {
        // Инициализация переменной для хранения общего размера изображений
        $totalSize = 0;

        // Перебор каждого URL изображения в предоставленном массиве
        foreach ($images as $image) {
            // Получение заголовков HTTP ответа для изображения
            $headers = get_headers($image, 1);

            // Проверка, существует ли заголовок Content-Length
            if (isset($headers['Content-Length'])) {
                // Добавление значения заголовка Content-Length к общему размеру
                $totalSize += (int)$headers['Content-Length'];
            }
        }

        // Возврат общего размера всех изображений
        return $totalSize;
    }
}

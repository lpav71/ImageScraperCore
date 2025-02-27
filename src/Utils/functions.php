<?php

namespace App\Utils;

function absolute_url($relative, $base) {
    // Если относительный URL уже имеет указание схемы (например, http:// или https://), то он уже абсолютный
    if (parse_url($relative, PHP_URL_SCHEME) != '') return $relative;

    // Если относительный URL начинается с '#' или '?', это добавляет или изменяет часть фрагмента или параметра в базовом URL
    if ($relative[0] == '#' || $relative[0] == '?') return $base.$relative;

    // Разбираем базовый URL на его компоненты, например, схему, хост, путь и т.д.
    extract(parse_url($base));

    // Удаляем последний сегмент пути (обычно, это имя файла), чтобы получить базовый путь директории
    $path = preg_replace('#/[^/]*$#', '', $path);

    // Если путь начинается с '/', то это абсолютный путь, поэтому обнуляем переменную $path
    if ($relative[0] == '/') $path = '';

    // Собираем новый абсолютный путь
    $abs = "$host$path/$relative";

    // Возвращаем абсолютный URL, составленный из схемы и очищенного пути
    return $scheme.'://'.$abs;
}



<?php
/**
 * @param $str
 * @param $filterValue
 *
 * @return string
 */
function rebuildUrlAndFilter($str, $filterValue)
{
    /** @var string $parsed */
    $parsed = parse_url($str);

    /** @var array $params */
    parse_str($parsed['query'], $params);

    $params = array_diff($params, array($filterValue)); // удаляем все ненужные значения

    asort($params); // сортируем массив

    $params['url'] = $parsed['path']; // добавляем параметр url

    return $parsed['scheme'] . '://' . $parsed['host'] . '/?' . http_build_query($params);
}

echo rebuildUrlAndFilter('https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3', 3);
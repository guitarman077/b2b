<?php

/**
 * Interface IAuthor
 */
interface IAuthor
{
    /**
     * Создает статью
     *
     * @param array $params
     * @param string $class
     * @return IArticle
     */
    public function createArticle(array $params, $class);

    /**
     * Получает все статьи текущего автора
     *
     * @return IArticle[]
     */
    public function getAllArticles();
}
<?php

/**
 * Interface IArticle
 */
interface IArticle
{
    /**
     * Получает автора статьи
     *
     * @return IAuthor
     */
    public function getAuthor();

    /**
     * @param IAuthor $iAuthor
     */
    public function setAuthor(IAuthor $iAuthor);
}
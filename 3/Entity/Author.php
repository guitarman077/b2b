<?php

/**
 * Class Author
 *
 * @property IArticle[] $Articles
 */
class Author extends AbstractAuthor implements IAuthor
{
    /**
     * @return array
     */
    public function relations()
    {
        return array_merge(parent::relations(), array(
            'Articles' => array(
                'HasMany',
                'Article',
                'id_author',
            ),
        ));

    }

    /**
     * Создает статью
     *
     * @param array $params
     * @param string $class Название класса
     *
     * @return IArticle
     */
    public function createArticle(array $params, $class)
    {

    }

    /**
     * Получает все статьи текущего автора
     *
     * @return IArticle[]
     */
    public function getAllArticles()
    {

    }
}
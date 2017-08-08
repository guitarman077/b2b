<?php

/**
 * Class Article
 */
class Article extends AbstractArticle implements IArticle
{
    /**
     * @return array
     */
    public function relations()
    {
        return array_merge(parent::relations(), array(
            'Author' => array(
                'BelongsTo',
                'Author',
                'id_author',
            ),
        ));

    }

    /**
     * Получает автора статьи
     *
     * @return IAuthor
     */
    public function getAuthor()
    {

    }

    /**
     * Устанавливает автора статьи
     *
     * @param IAuthor $iAuthor
     */
    public function setAuthor(IAuthor $iAuthor)
    {

    }
}
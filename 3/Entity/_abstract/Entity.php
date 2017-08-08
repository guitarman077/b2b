<?php

/**
 * Class Entity
 */
abstract class Entity
{
    /**
     * @param $params
     */
    public function __construct($params)
    {

    }

    /**
     * @return array
     */
    public function relations()
    {
        return array();
    }
}
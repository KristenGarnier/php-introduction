<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-19
 * Time: 10:19
 */
namespace Model\Finder;


interface FinderInterface
{
    public function findAll();
    public function findOneById(int $id);
}
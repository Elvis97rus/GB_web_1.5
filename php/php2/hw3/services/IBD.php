<?php
namespace App\services;

interface IBD
{
    public function find(string $sql, array $params = [], string $class);
    public function findAll(string $sql, array $params = [],string $class);
}
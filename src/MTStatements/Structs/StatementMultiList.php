<?php
namespace MTStatements;


class StatementMultiList
{
    private $list = [];

    public function add(StatementList $list)
    {
        $this->list[] = $list;
    }

    public function get()
    {
        return $this->list;
    }
}
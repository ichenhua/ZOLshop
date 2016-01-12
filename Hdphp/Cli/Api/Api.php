<?php namespace {{MODULE}}\Api;

class {{API}}
{
    protected $error = '未知错误';

    protected $db;

    public function __construct()
    {
        $this->db = new \{{MODULE}}\Model\{{API}};
    }

    //返回错误
    public function getError()
    {
        return $this->db->getError() ?: $this->error;
    }
}
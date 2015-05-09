<?php

namespace MVC\Models;

class Robot extends \MVC\Core\Model
{
    public function get($id)
    {
        $pdo = $this->mapper;
        $res = $pdo->query('SELECT * FROM robot WHERE id=' . $id);
        $this->__construct($res->fetch(\PDO::FETCH_ASSOC));
    }
}

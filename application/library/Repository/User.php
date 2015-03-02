<?php

namespace JWTJP\Repository;

use Doctrine\DBAL\Connection;

class User
{
    protected $connection;

    const TABLE = 'user';

    const SELECT_ALL = 'SELECT * FROM user';

    public function __construct( Connection $connection )
    {
        $this->connection = $connection;
    }

    public function fetch( Array $criteria )
    {
        $qb = $this->connection->createQueryBuilder();
        $where = [];

        foreach ($criteria as $k => $field) {
            $where[] = $qb->expr()->eq($k, "'$field'");
        }

        $stmt = $qb
            ->select('*')
            ->from(self::TABLE, self::TABLE)
            ->where(implode($where, ' AND '));

        return $stmt->execute()->fetch();
    }
}
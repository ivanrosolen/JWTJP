<?php

namespace JWTJP\Repository;

use Doctrine\DBAL\Connection;

class Book
{
    protected $connection;

    const TABLE = 'book';

    const SELECT_ALL = 'SELECT * FROM book';

    public function __construct( Connection $connection )
    {
        $this->connection = $connection;
    }

    public function insert(Array $fields)
    {
        $fields['uri'] = \URLify::filter($fields['name']);

        return $this->connection->insert(self::TABLE, $fields);
    }

    public function update($id, Array $fields)
    {
        $fields['uri'] = \URLify::filter($fields['name']);

        return $this->connection->update(self::TABLE, $fields, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->connection->delete(self::TABLE, ['id' => $id]);
    }

    public function fetch(Array $criteria)
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

    public function fetchAll()
    {
        return $this->connection->fetchAll(self::SELECT_ALL);
    }

    public function fetchAllBy(Array $criteria = null)
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

        return $stmt->execute()->fetchAll();
    }
}
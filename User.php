<?php

namespace User\Model;

use Doctrine\DBAL\Connection;
use Application\Components\Security;

class User
{
    protected $connection;

    protected $security;

    const SELECT_ALL = 'SELECT * FROM user';

    const TABLE = 'user';

    public function __construct(
        Connection $connection,
        Security $security
    ) {
        $this->connection = $connection;
        $this->security = $security;
    }

    public function insert($name, $email, $password)
    {
        $password = $this->security->hash($password);

        return $this->connection->insert(
            self::TABLE,
            ['name' => $name, 'email' => $email, 'password' => $password]
        );
    }

    public function update($id, Array $fields)
    {
        foreach ($fields as $k => $v)
            if ($k == 'password')
                $v = $this->security->hash($v);

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
}

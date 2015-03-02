<?php

namespace JWTJP\Business;

use JWTJP\Repository\User as UserRepository;

class User
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fetch(Array $criteria)
    {
        return $this->repository->fetch($criteria);
    }

    public function fetchAll()
    {
        return $this->repository->fetchAll();
    }

    public function fetchAllBy(Array $criteria)
    {
        return $this->repository->fetchAll($criteria);
    }

    public function insert($name, $email, $password)
    {
        return $this->repository->insert($name, $email, $password);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function update($id, Array $fields)
    {
        return $this->repository->update($id, $fields);
    }
}

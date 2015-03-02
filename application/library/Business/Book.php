<?php

namespace JWTJP\Business;

use JWTJP\Repository\Book as BookRepository;

class Book
{
    protected $repository;

    public function __construct(BookRepository $repository)
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
        return $this->repository->fetchAllBy($criteria);
    }

    public function insert(Array $fields)
    {
        return $this->repository->insert($fields);
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

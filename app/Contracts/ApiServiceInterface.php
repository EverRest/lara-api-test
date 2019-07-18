<?php


namespace App\Contracts;

/**
 * Interface PeopleServiceInterface
 * @package App\Library\Contracts
 */
interface ApiServiceInterface
{
    /**
     * @param string $entity
     * @param int $id
     * @return mixed
     */
    public function get( string $entity = '', int $id = 0);

    /**
     * @param string $entity
     * @param int $page
     * @return mixed
     */
    public function getAll( string $entity = '', int $page = 1);
}
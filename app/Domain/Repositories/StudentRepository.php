<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Student;
use App\Domain\Contracts\StudentInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class StudentRepository
 * @package App\Domain\Repositories
 */
class StudentRepository extends AbstractRepository implements StudentInterface, Crudable
{

    /**
     * @var Student
     */
    protected $model;

    /**
     * StudentRepository constructor.
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param int $limit
     * @param int $page
     * @param array $column
     * @param string $field
     * @param string $search
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginate($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
        return parent::paginate($limit, $page, $column, 'class', $search);
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'name'    => e($data['name']),
            'class'    => e($data['class']),
            'email'   => e($data['email']),
            'phone'   => e($data['phone']),
            'users_id' => e($data['users_id'])
        ]);

    }

    /**
     * @param $id
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, [
            'name'    => e($data['name']),
            'class'    => e($data['class']),
            'email'   => e($data['email']),
            'phone'   => e($data['phone']),
            'users_id' => e($data['users_id'])
        ]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }


    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findById($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

}
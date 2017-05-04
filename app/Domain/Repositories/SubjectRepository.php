<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Subject;
use App\Domain\Contracts\SubjectInterface;
use App\Domain\Contracts\Crudable;


/**
 * Subject SubjectRepository
 * @package App\Domain\Repositories
 */
class  SubjectRepository extends AbstractRepository implements SubjectInterface, Crudable
{

    /**
     * @var Subject
     */
    protected $model;

    /**
     * SubjectRepository constructor.
     * @param Subject $subject
     */
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
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
        return parent::paginate($limit, $page, $column, 'name', $search);
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
            'guru_id'    => e($data['guru_id']),
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
            'guru_id'    => e($data['guru_id']),
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
public function getList()
    {
        // query to aql
        $akun = $this->model->all();
        // if data null
        if (null == $akun) {
            // set response header not found
            return $this->errorNotFound('Data belum tersedia');
        }

        return $akun;

    }
}

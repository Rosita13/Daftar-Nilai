<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Kelas;
use App\Domain\Contracts\KelasInterface;
use App\Domain\Contracts\Crudable;


/**
 * Kelas KelasRepository
 * @package App\Domain\Repositories
 */
class KelasRepository extends AbstractRepository implements KelasInterface, Crudable
{

    /**
     * @var Kelas
     */
    protected $model;

    /**
     * KelasRepository constructor.
     * @param Kelas $kelas
     */
    public function __construct(Kelas $kelas)
    {
        $this->model = $kelas;
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
            'guru_id'    => e($data['guru_id']),
            'class'    => e($data['class']),
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
            'guru_id'    => e($data['guru_id']),
            'class'    => e($data['class']),

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
<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Value;
use App\Domain\Contracts\ValueInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class ValueRepository
 * @package App\Domain\Repositories
 */
class ValueRepository extends AbstractRepository implements ValueInterface, Crudable
{

    /**
     * @var Value
     */
    protected $model;

    /**
     * ValueRepository constructor.
     * @param Value $value
     */
    public function __construct(Value $value)
    {
        $this->model = $value;
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
        return parent::paginate($limit, $page, $column, 'status', $search);
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'siswa_id'=> e($data['siswa_id']),
            'type'    => e($data['type']),
            'status'  => e($data['status']),
            'nilai'   => e($data['nilai']),
            'semester'=> e($data['semester']),
            'mapel_id'=> e($data['mapel_id']),
            'class_id'   => e($data['class_id'])
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
           'siswa_id' => e($data['siswa_id']),
            'type'    => e($data['type']),
            'status'  => e($data['status']),
            'nilai'   => e($data['nilai']),
            'semester'=> e($data['semester']),
            'mapel_id'=> e($data['mapel_id']),
            'class_id'=> e($data['class_id'])
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
    public function getByPagecetak()
    {

        // query to aql
        $AsalUsul = $this->model
            ->join('students', 'values.siswa_id', '=', 'students.id')
            ->join('subjects', 'values.mapel_id', '=', 'subjects.id')
            ->join('classes', 'values.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.guru_id', '=', 'teachers.id')
//            ->where('asal_usul.desa_id', session('desa'))
//            ->where('asal_usul.is_lock', 2)
//            ->whereMonth('asal_usul.created_at', $id)
            ->orderBy('values.id', 'asc')
            ->select(
                'students.nis',
                'students.name',
                'classes.class',
                'subjects.name as mata_pelajaran',
                'values.type',
                'values.nilai',
                'values.status',
                'teachers.nip',
                'teachers.name as name_guru',
                'values.semester')
            ->get();

        return $AsalUsul;
    }


}
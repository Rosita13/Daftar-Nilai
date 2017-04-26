<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\TeacherCreateRequest;
use App\Http\Requests\Teacher\TeacherEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\TeacherInterface;

class TeacherController extends Controller
{

    /**
     * @var TeacherInterface
     */
    protected $teacher;

    /**
     * SeacherController constructor.
     * @param TeacherInterface $teacher
     */
    public function __construct(TeacherInterface $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @api {get} api/teachers Request Seacher with Paginate
     * @apiName GetSeacherWithPaginate
     * @apiGroup Seacher
     *
     * @apiParam {Number} page Paginate teacher lists
     */
    public function index(Request $request)
    {
        return $this->teacher->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * @api {get} api/teachers/id Request Get Seacher
     * @apiName GetSeacher
     * @apiGroup Seacher
     *
     * @apiParam {Number} id id_teacher
     * @apiSuccess {Number} id id_teacher
     * @apiSuccess {Varchar} name name of teacher
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of teacher
     * @apiSuccess {Number} phone phone of teacher
     */
    public function show($id)
    {
        return $this->teacher->findById($id);
    }

    /**
     * @api {post} api/teachers/ Request Post Seacher
     * @apiName PostSeacher
     * @apiGroup Seacher
     *
     *
     * @apiParam {Varchar} name name of teacher
     * @apiParam {Varchar} email email of teacher
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of teacher
     * @apiSuccess {Number} id id of teacher
     */
    public function store(TeacherCreateRequest $request)
    {
        return $this->teacher->create($request->all());
    }

    /**
     * @api {put} api/teachers/id Request Update Seacher by ID
     * @apiName UpdateSeacherByID
     * @apiGroup Seacher
     *
     *
     * @apiParam {Varchar} name name of teacher
     * @apiParam {Varchar} email email of teacher
     * @apiParam {Varchar} address address of teacher
     * @apiParam {Float} phone phone of teacher
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(SeacherEditRequest $request, $id)
    {
        return $this->teacher->update($id, $request->all());
    }

    /**
     * @api {delete} api/teachers/id Request Delete Seacher by ID
     * @apiName DeleteSeacherByID
     * @apiGroup Seacher
     *
     * @apiParam {Number} id id of teacher
     *
     *
     * @apiError SeacherNotFound The <code>id</code> of the Seacher was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->teacher->delete($id);
    }

}
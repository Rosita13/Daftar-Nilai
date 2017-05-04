<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentCreateRequest;
use App\Http\Requests\Student\StudentEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\StudentInterface;

class StudentController extends Controller
{

    /**
     * @var StudentInterface
     */
    protected $student;

    /**
     * StudentController constructor.
     * @param StudentInterface $student
     */
    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    /**
     * @api {get} api/students Request Student with Paginate
     * @apiName GetStudentWithPaginate
     * @apiGroup Student
     *
     * @apiParam {Number} page Paginate student lists
     */
    public function index(Request $request)
    {
        return $this->student->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * @api {get} api/students/id Request Get Student
     * @apiName GetStudent
     * @apiGroup Student
     *
     * @apiParam {Number} id id_student
     * @apiSuccess {Number} id id_student
     * @apiSuccess {Varchar} name name of student
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of student
     * @apiSuccess {Number} phone phone of student
     */
    public function show($id)
    {
        return $this->student->findById($id);
    }

    /**
     * @api {post} api/students/ Request Post Student
     * @apiName PostStudent
     * @apiGroup Student
     *
     *
     * @apiParam {Varchar} name name of student
     * @apiParam {Varchar} email email of student
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of student
     * @apiSuccess {Number} id id of student
     */
    public function store(StudentCreateRequest $request)
    {
        return $this->student->create($request->all());
    }

    /**
     * @api {put} api/students/id Request Update Student by ID
     * @apiName UpdateStudentByID
     * @apiGroup Student
     *
     *
     * @apiParam {Varchar} name name of student
     * @apiParam {Varchar} email email of student
     * @apiParam {Varchar} address address of student
     * @apiParam {Float} phone phone of student
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(StudentEditRequest $request, $id)
    {
        return $this->student->update($id, $request->all());
    }

    /**
     * @api {delete} api/students/id Request Delete Student by ID
     * @apiName DeleteStudentByID
     * @apiGroup Student
     *
     * @apiParam {Number} id id of student
     *
     *
     * @apiError StudentNotFound The <code>id</code> of the Student was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->student->delete($id);
    }
 public function getList()
    {
        return $this->student->getList();
    }
}
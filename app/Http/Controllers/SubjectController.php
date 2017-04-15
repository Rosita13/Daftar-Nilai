<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\SubjectCreateRequest;
use App\Http\Requests\Subject\SubjectEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\SubjectInterface;

class SubjectController extends Controller
{

    /**
     * @var SubjectInterface
     */
    protected $subject;

    /**
     * SubjectController constructor.
     * @param SubjectInterface $subject
     */
    public function __construct(SubjectInterface $subject)
    {
        $this->subject = $subject;
    }

    /**
     * @api {get} api/subjects Request Subject with Paginate
     * @apiName GetSubjectWithPaginate
     * @apiGroup Subject
     *
     * @apiParam {Number} page Paginate subject lists
     */
    public function index(Request $request)
    {
        return $this->subject->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * @api {get} api/subjects/id Request Get Subject
     * @apiName GetSubject
     * @apiGroup Subject
     *
     * @apiParam {Number} id id_subject
     * @apiSuccess {Number} id id_subject
     * @apiSuccess {Varchar} name name of subject
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of subject
     * @apiSuccess {Number} phone phone of subject
     */
    public function show($id)
    {
        return $this->subject->findById($id);
    }

    /**
     * @api {post} api/subjects/ Request Post Subject
     * @apiName PostSubject
     * @apiGroup Subject
     *
     *
     * @apiParam {Varchar} name name of subject
     * @apiParam {Varchar} email email of subject
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of subject
     * @apiSuccess {Number} id id of subject
     */
    public function store(SubjectCreateRequest $request)
    {
        return $this->subject->create($request->all());
    }

    /**
     * @api {put} api/subjects/id Request Update Subject by ID
     * @apiName UpdateSubjectByID
     * @apiGroup Subject
     *
     *
     * @apiParam {Varchar} name name of subject
     * @apiParam {Varchar} email email of subject
     * @apiParam {Varchar} address address of subject
     * @apiParam {Float} phone phone of subject
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(SubjectEditRequest $request, $id)
    {
        return $this->subject->update($id, $request->all());
    }

    /**
     * @api {delete} api/subjects/id Request Delete Subject by ID
     * @apiName DeleteSubjectByID
     * @apiGroup Subject
     *
     * @apiParam {Number} id id of subject
     *
     *
     * @apiError SubjectNotFound The <code>id</code> of the Subject was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->subject->delete($id);
    }

}
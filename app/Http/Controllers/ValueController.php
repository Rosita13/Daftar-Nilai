<?php

namespace App\Http\Controllers;

use App\Http\Requests\Value\ValueCreateRequest;
use App\Http\Requests\Value\ValueEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\ValueInterface;

class ValueController extends Controller
{

    /**
     * @var ValueInterface
     */
    protected $value;

    /**
     * ValueController constructor.
     * @param ValueInterface $value
     */
    public function __construct(ValueInterface $value)
    {
        $this->value = $value;
    }

    /**
     * @api {get} api/values Request Value with Paginate
     * @apiName GetValueWithPaginate
     * @apiGroup Value
     *
     * @apiParam {Number} page Paginate value lists
     */
    public function index(Request $request)
    {
        return $this->value->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * @api {get} api/values/id Request Get Value
     * @apiName GetValue
     * @apiGroup Value
     *
     * @apiParam {Number} id id_value
     * @apiSuccess {Number} id id_value
     * @apiSuccess {Varchar} name name of value
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of value
     * @apiSuccess {Number} phone phone of value
     */
    public function show($id)
    {
        return $this->value->findById($id);
    }

    /**
     * @api {post} api/values/ Request Post Value
     * @apiName PostValue
     * @apiGroup Value
     *
     *
     * @apiParam {Varchar} name name of value
     * @apiParam {Varchar} email email of value
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of value
     * @apiSuccess {Number} id id of value
     */
    public function store(ValueCreateRequest $request)
    {
        return $this->value->create($request->all());
    }

    /**
     * @api {put} api/values/id Request Update Value by ID
     * @apiName UpdateValueByID
     * @apiGroup Value
     *
     *
     * @apiParam {Varchar} name name of value
     * @apiParam {Varchar} email email of value
     * @apiParam {Varchar} address address of value
     * @apiParam {Float} phone phone of value
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(ValueEditRequest $request, $id)
    {
        return $this->value->update($id, $request->all());
    }

    /**
     * @api {delete} api/values/id Request Delete Value by ID
     * @apiName DeleteValueByID
     * @apiGroup Value
     *
     * @apiParam {Number} id id of value
     *
     *
     * @apiError ValueNotFound The <code>id</code> of the Value was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->value->delete($id);
    }

}
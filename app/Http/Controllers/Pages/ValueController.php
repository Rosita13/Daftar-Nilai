<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Value\ValueCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\ValueRepository;
use App\Http\Controllers\Controller;
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
    public function __construct(ValueRepository $value)
    {
        $this->value = $value;
    }
    public function index(Request $request)
    {
        $values = $this->value->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-nilai', ['values' => $values]); 
    }
    public function create()
    {
        return view('pages.create-nilai'); 
    }
    public function edit($id)
    {
        return view('pages.edit-nilai'); 
    }
}
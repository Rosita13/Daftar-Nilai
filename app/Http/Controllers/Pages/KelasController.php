<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\lass\KelasCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\KelasRepository;
use App\Http\Controllers\Controller;
class KelasController extends Controller
{
    /**
     * @var KelasInterface
     */
    protected $kelas;
    /**
     * KelasController constructor.
     * @param KelasInterface $kelas
     */
    public function __construct(KelasRepository $kelas)
    {
        $this->kelas = $kelas;
    }
    public function index(Request $request)
    {
        $classes = $this->kelas->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-class', ['classes' => $classes]); 
    }
    public function create()
    {
        return view('pages.create-class'); 
    }
    public function edit($id)
    {
        return view('pages.edit-class'); 
    }
}
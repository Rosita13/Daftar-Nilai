<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\lass\KelasCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\KelasRepository;
use App\Domain\Repositories\TeacherRepository;
use App\Http\Controllers\Controller;
class KelasController extends Controller
{
    /**
     * @var KelasInterface
     */
    protected $kelas;
    protected $teacher;

    /**
     * KelasController constructor.
     * @param KelasInterface $kelas
     */
    public function __construct(KelasRepository $kelas,TeacherRepository $teacher)
    {
        $this->kelas = $kelas;
        $this->teacher = $teacher;
    }
    public function index(Request $request)
    {
        $classes = $this->kelas->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-class', ['classes' => $classes]); 
    }
    public function create()
    {
        $teachers = $this->teacher->getList();
        return view('pages.create-class',compact('teachers'));
    }
    public function edit($id)
    {
       $teachers = $this->teacher->getList();
        return view('pages.create-class',compact('teachers'));
    }
}
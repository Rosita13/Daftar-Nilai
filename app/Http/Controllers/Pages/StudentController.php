<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Student\StudentCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\StudentRepository;
use App\Domain\Repositories\KelasRepository;
use App\Http\Controllers\Controller;
class StudentController extends Controller
{
    /**
     * @var StudentInterface
     */
    protected $student;
    protected $class;
    /**
     * StudentController constructor.
     * @param StudentInterface $student
     */
    public function __construct(StudentRepository $student,kelasRepository $class)
    {
        $this->student = $student;
        $this->class = $class;
    }
    public function index(Request $request)
    {
        $students = $this->student->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-siswa',['students' => $students]);
    }
    public function create()
    {
        $classes = $this->class->getList();
        $arr= [$classes];
        return view('pages.create-siswa',compact('classes',$arr)); 
    }
    public function edit($id)
    {
        $classes = $this->class->getList();
        $arr= [$classes];
        $student = $this->student->findById($id);
        return view('pages.edit-siswa',compact('classes',$arr));  
    }
}
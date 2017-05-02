<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Student\StudentCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\StudentRepository;
use App\Http\Controllers\Controller;
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
    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }
    public function index(Request $request)
    {
        $students = $this->student->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-siswa', ['students' => $students]); 
    }
    public function create()
    {
        return view('pages.create-siswa'); 
    }
    public function edit($id)
    {
        return view('pages.edit-siswa'); 
    }
}
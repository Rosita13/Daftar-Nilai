<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Teacher\TeacherCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\TeacherRepository;
use App\Http\Controllers\Controller;
class TeacherController extends Controller
{
    /**
     * @var TeacherInterface
     */
    protected $teacher;
    /**
     * TeacherController constructor.
     * @param TeacherInterface $teacher
     */
    public function __construct(TeacherRepository $teacher)
    {
        $this->teacher = $teacher;
    }
    public function index(Request $request)
    {
        $teachers = $this->teacher->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-guru',compact('teachers')); 
    }
    public function create()
    {
        return view('pages.create-guru'); 
    }
    public function edit($id)
    {
       $teacher = $this->teacher->findById($id);
        return view('pages.edit-guru',compact('teacher'));  
    }
}
<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Subject\SubjectCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\SubjectRepository;
use App\Domain\Repositories\TeacherRepository;
use App\Http\Controllers\Controller;
class SubjectController extends Controller
{
    /**
     * @var SubjectInterface
     */
    protected $subject;
    protected $teacher;
    /**
     * SubjectController constructor.
     * @param SubjectInterface $subject
     */
    public function __construct(SubjectRepository $subject,TeacherRepository $teacher)
    {
        $this->subject = $subject;
        $this->teacher = $teacher;
    }
    public function index(Request $request)
    {
        $subjects = $this->subject->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-mapel',['subjects' => $subjects]);  
    }
    public function create()
    {
         $teachers = $this->teacher->getList();
        return view('pages.create-mapel',compact('teachers'));
    }
    public function edit($id)
    {
         $teachers = $this->teacher->getList();
         $subject = $this->subject->findById($id);
        return view('pages.edit-mapel',compact('teachers','subject'));
    }
}
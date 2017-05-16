<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Value\ValueCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\ValueRepository;
use App\Domain\Repositories\StudentRepository;
use App\Domain\Repositories\KelasRepository;
use App\Domain\Repositories\SubjectRepository;
use App\Http\Controllers\Controller;
class ValueController extends Controller
{
    /**
     * @var ValueInterface
     */
    protected $value;
    protected $student;
    protected $class;
    protected $subject;

    /**
     * ValueController constructor.
     * @param ValueInterface $value
     */
    public function __construct(ValueRepository $value, StudentRepository $student,kelasRepository $class,subjectRepository $subject )
    {
        $this->middleware('auth');  
        $this->value = $value;
        $this->student = $student;
        $this->class = $class;
        $this->subject = $subject;
    }
    public function index(Request $request)
    {
        $values = $this->value->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-nilai',  ['values' => $values]); 
    }
    public function create()
    {
      $students = $this->student->getList();
      $classes = $this->class->getList();
      $subjects = $this->subject->getList();
      $arr= [$students,$classes,$subjects];
        return view('pages.create-nilai',compact('students','classes','subjects',$arr));
    }
    public function edit($id)
    {
      $students = $this->student->getList();
      $classes = $this->class->getList();
      $subjects = $this->subject->getList();
      $value = $this->value->findById($id);
      $status = ['Remidi','Lulus'];
      $semester = [1,2];
      $arr= [$students,$classes,$subjects,$status,$semester];
    return view('pages.edit-nilai',compact('students','classes','subjects','value','status','semester',$arr));
    }
}
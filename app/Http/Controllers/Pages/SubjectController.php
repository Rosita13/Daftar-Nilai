<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Subject\SubjectCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\SubjectRepository;
use App\Http\Controllers\Controller;
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
    public function __construct(SubjectRepository $subject)
    {
        $this->subject = $subject;
    }
    public function index(Request $request)
    {
        $subjects = $this->subject->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
        return view('pages.list-mapel', ['subjects' => $subjects]); 
    }
    public function create()
    {
        return view('pages.create-mapel'); 
    }
    public function edit($id)
    {
        return view('pages.edit-mapel'); 
    }
}
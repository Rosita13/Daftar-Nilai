<?php
namespace App\Http\Controllers\Pages;
use App\Http\Requests\Register\RegisterCreateRequest;
use Illuminate\Http\Request;
use App\Domain\Repositories\RegisterRepository;
use App\Http\Controllers\Controller;
class RegisterController extends Controller
{
    /**
     * @var UserInterface
     */
    protected $user;
    /**
     * RegisterController constructor.
     * @param UserInterface $user
     */
    public function __construct(RegisterRepository $user)
    {
        $this->user = $user;
    }
    // public function index(Request $request)
    // {
    //     $users = $this->user->paginate(10, $request->input('name'), $column = ['*'], '', $request->input('search'));
    //     return view('pages.list-user',compact('users'));  
    // }
    public function create()
    {
        return view('pages.register'); 
    }
    // public function edit($id)
    // {
    //    $user = $this->user->findById($id);
    //     return view('pages.edit-user',compact('user'));  
    // }
}
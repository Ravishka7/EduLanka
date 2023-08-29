<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Lesson;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function uploadpage()
    {
        return view('lesson');
    }

    public function store(Request $request)
    {

        $data=new lesson();


        
        $file=$request->file('file');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $data->file=$filename;

        $data->name=$request->name;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }

    public function show()
    {
        $data=Lesson::all();
        return view('showproduct',compact('data'));
    }

    public function download(Request $request,$file)
    {
        return response()->download('assets/'.$file);
    }

    public function view($id)
    {
        $data=Lesson::find($id);
        return view('viewlesson',compact('data'));
    }
}

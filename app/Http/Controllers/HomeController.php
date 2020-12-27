<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\emp_model;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('emp.create');
    }
    public function store(Request $request)
    {
      request()->validate([
        'name' => 'required',
        'email' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         $imageName = md5(time()).'.'.request()->image->getClientOriginalExtension();
      //emp_model::create($request->all());
        $student= new \App\emp_model;
        $student->name=$request->get('name');
        $student->email=$request->get('email');
        $student->image=$imageName;
     $student->save();
      request()->image->move(public_path('upload'), $imageName);


      return redirect()->route('home')
      ->with('success','Details Added successfully.') ->with('image',$imageName);


    }
    public function list()
    {
      $employ=emp_model::latest()->paginate(5);


      return view('emp.index',compact('employ'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function destroy($id)
    {
      $employeeremove=emp_model::find($id);
      $employeeremove ->delete(); 
      return redirect()->route('formlist')
      ->with('success','Deleted successfully'); 
    }
    public function show($id)
    {
      return view('emp.show',['user' =>emp_model::find($id)]);
    }
    public function edit($id)
    {
      $getdetails =emp_model::find($id);
      return view('emp.edit',compact('getdetails'));
    }
    public function update(Request $request,$id)
    {
       
       
   
    
         $student= \App\emp_model::find($id);
       
         if(!empty(request()->image))
       {
           request()->validate([
        'name' => 'required',
        'email' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

      $imageName = md5(time()).'.'.request()->image->getClientOriginalExtension();
 
         
        $student->name=$request->get('name');
        $student->email=$request->get('email');
        $student->image=$imageName;
        request()->image->move(public_path('upload'), $imageName);
    }
    else{
       request()->validate([
        'name' => 'required',
        'email' => 'required',
        ]);
       $student->name=$request->get('name');
        $student->email=$request->get('email');
        
    }
         $student->save();
      

      return redirect()->route('formlist')
      ->with('success','Updated successfully');
    }

  }

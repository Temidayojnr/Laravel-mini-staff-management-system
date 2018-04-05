<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

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
    
     //home controller
    public function index()
    {
        $staffs = Staff::all();
        return view('home', ['staffs' => $staffs]);
    }

    //new Staff controller
    public function employee()
    {
        return view('.new');
    }

    public function store(Request $request)
    {
                $validData = $request->validate([
                    'name' => 'required|min:3',
                    'phone' => 'required|max:11|min:11',
                    'address' => 'required',
                    'job' => 'required',
                    'gender' => 'required'
                ]);
                $staff = new staff;
                $staff->name = $request->name;
                $staff->phone = $request->phone;
                $staff->address = $request->address;
                $staff->job = $request->job;
                $staff->gender = $request->gender;
                $staff->save();

                $staffs = staff::all();

                return view('home', ['staffs'=>$staffs]);


    }

    public function show($id)
    {
        $staff = Staff::find($id);

           // dd($staff);
        return view('sfaffer')->with('staff', $staff);
    }

    public function update(Request $request, $id)
            {
                $validData = $request->validate([
                    'name' => 'required|min:3',
                    'phone' => 'required|max:11|min:11',
                    'address' => 'required',
                    'job' => 'required',
                    'gender' => 'required'
                ]);

                $staff = Staff::find($id);
                $staff->name = $request->name;
                $staff->phone = $request->phone;
                $staff->address = $request->address;
                $staff->job = $request->job;
                $staff->gender = $request->gender;
                $staff->save();

                $staffs = Staff::all();

                return redirect()->route('home')->with('msg','Staff updated');
            }


            public function ender($id)
            {
                $staff = Staff::find($id);
                Staff::destroy($id);
                $staffs = Staff::all();
         
                return view('home')->with('staffs',$staffs);
                //return view('home', ['staffs'=>'$staffs']);
            }

}

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
        //get all staff in the DB
        $staffs = Staff::all();

        //
        return view('home', ['staffs' => $staffs]);
    }

    //new Staff controller
    public function employee()
    {
        //go to page new
        return view('.new');
    }

    public function store(Request $request)
    {           
                //validate function for the staff details so that no form will be empty or short of requirements
                $validData = $request->validate([
                    'name' => 'required|min:3',
                    'phone' => 'required|numeric|max:11|min:11',
                    'address' => 'required',
                    'job' => 'required',
                    'gender' => 'required'
                ]);

                //add new staff details
                $staff = new staff;
                $staff->name = $request->name;
                $staff->phone = $request->phone;
                $staff->address = $request->address;
                $staff->job = $request->job;
                $staff->gender = $request->gender;
                $staff->save();
                
                //get staff in the DB
                $staffs = staff::all();

                return view('home', ['staffs'=>$staffs]);


    }

    public function show($id)
    {
        
        //find the staff with the provided $id
        $staff = Staff::find($id);

           //go to page staffer after clicking on the view button
        return view('sfaffer')->with('staff', $staff);
    }

    public function update(Request $request, $id)
            {
                $validData = $request->validate([
                    'name' => 'required|min:3',
                    'phone' => 'required|numeric|max:11|min:11',
                    'address' => 'required',
                    'job' => 'required',
                    'gender' => 'required'
                ]);
                //find staff with the provided id $id
                $staff = Staff::find($id);

                //get staff name 
                $staff->name = $request->name;

                //get staff phone number
                $staff->phone = $request->phone;

                //get staff address
                $staff->address = $request->address;

                //get staff job description
                $staff->job = $request->job;

                //get staff gender
                $staff->gender = $request->gender;
                
                //save staff
                $staff->save();
                

                //get all the staff from the DB to be sure there is no input repetition
                $staffs = Staff::all();

                return redirect()->route('home')->with('msg','Staff updated');
            }

            public function ender($id)
            {
                //find staff with the provided id $id
                $staff = Staff::find($id);

                //delete staff with the provided id $id  
                Staff::destroy($id);

                //Get all the staff left in the DB after deleting the one specified above
                $staffs = Staff::all();
         
                //Go to the home page with the list of all the remaining staff
                return view('home')->with('staffs',$staffs);
                //return view('home', ['staffs'=>'$staffs']);
            }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
    {
            protected $fillable = ['name'=> 'name', 'phone'=>'Phone Number', 'address'=> 'Address', 'job'=> 'Job Description', 'gender'=> 'Gender'];
            
            public function staff()
                {
                    $staff = App\staff::create(['name'=>'Full Name', 'phone'=>'Phone Number', 'address'=> 'Address', 'job'=> 'Job Description', 'gender'=> 'Gender']);
                }
    }

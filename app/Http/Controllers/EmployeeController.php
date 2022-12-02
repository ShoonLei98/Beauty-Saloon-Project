<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::where('remove_status', 1)->get();
        if(count($data) == 0){
            $emptyStatus = 0;
        }
        else{
            $emptyStatus = 1;
        }
        return view('employees.index')->with(['employee' => $data,'emptyStatus' => $emptyStatus]);
        // return redirect()->route('#employeeList')->with(['employee' => $data]);
    }

    public function addEmployee(Request $request)
    {
        $file = $request->file('image');
        $imageName = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/uploads/',$imageName);

        $data = [
            'employee_name' => $request->name,
            'photo' => $imageName,
            'phone' => $request->phone,
            'address' => $request->address,
            'salary' => $request->salary,
            'remove_status' => 1
        ];        
        Employee::create($data);
        return redirect()->route('#employeeList')->with(['createSuccess' => 'Employee added successfully.']);
    }

    public function editEmployee($id)
    {
        $data = Employee::where('employee_id', $id)->first();
        return view('employees.edit')->with(['employee' => $data]);
    }

    public function updateEmployee(Request $request)
    {
        $employeeData = [
            'employee_id' => $request->employeeId,
            'employee_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'salary' => $request->salary,
            'remove_status' => 1
        ];
        if(isset($request->image))
        {
            // get old image from database
            $data = Employee::select('photo')->where('employee_id', $request->employeeId)->first();
            $image = $data['photo'];

            // delete old image from public path
            if(File::exists(public_path().'/uploads/'.$image)){
                File::delete(public_path().'/uploads/'.$image);
            }

            // update new image to public path
            $imageFile = $request->file('image');
            $imageName = uniqid().'_'.$imageFile->getClientOriginalName();
            $imageFile->move(public_path().'/uploads/',$imageName);

            // overwrite image file with image name to update in database
            $employeeData['photo'] = $imageName;
            // dd($employeeData);
            // update pizza data to database
            Employee::where('employee_id', $request->employeeId)->update($employeeData);
            return redirect()->route('#employeeList')->with(['updateSuccess' => 'Updated Successfully']);
        }
        Employee::where('employee_id', $request->employeeId)->update($employeeData);
        return redirect()->route('#employeeList')->with(['updateSuccess' => 'Updated Successfully']);     
    }

    public function deleteEmployee($id)
    {
        // $data = Employee::select('photo')->where('employee_id', $id)->first();
        // $imageName = $data['photo'];
        // Employee::where('employee_id', $id)->delete($id);

        // // delete image from public file
        // if(File::exists(public_path().'/uploads/'.$imageName))
        // {
        //     File::delete(public_path().'/uploads/'.$imageName);
        // }
        // // Employee::where('employee_id', $id)->delete($id);

        $data = Employee::where('employee_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

}

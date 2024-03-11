<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',compact('departments'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('departments.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Added!');
    }
    public function deactivate(Department $department)
    {
        $department->status = '0';
        $department->save();

        return redirect()->route('departments.index');
    }

    public function activate(Department $department)
    {
        $department->status = '1';
        $department->save();

        return redirect()->route('departments.index');
    }
}

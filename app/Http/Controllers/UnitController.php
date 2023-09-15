<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function store(Request $request)
    {
        $unit = Unit::storeUnit($request);
        return back()->with('msg','Unit is creatred succuessfully');
    }

    public function manage()
    {
        return view('admin.unit.manage',['units' => Unit::all()]);
    }

    public function edit($id)
    {
        return view('admin.unit.edit',['unit'=>Unit::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::updateUnit($request, $id);
        return redirect(route('unit.manage'))->with('msg', 'Unit is updated Successfully');
    }

    public function delete($id)
    {
        $unit = Unit::deleteUnit($id);
        return back()->with('noti','Unit is deleted Successfully');
    }
}

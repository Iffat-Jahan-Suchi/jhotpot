<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public $unit;
    public $units;
    private $notofication;
    public function index()
    {
        return view('admin.unit.add');
    }

    public function create(Request $request)
    {
        $this->unit=new Unit();
        $this->unit->name = $request->name;
        $this->unit->description = $request->description;
        $this->unit->save();
        return redirect('/add-unit')->with('message','Unit create successfully');

    }
    public function manage()
    {
        $this->units =Unit::all();
        return view('admin.unit.manage',['units'=>$this->units]);
    }

    public function edit($id)
    {
        $this->unit=Unit::find($id);
        return view('admin.unit.edit',['unit'=>$this->unit]);
    }
    public function update(Request $request,$id)
    {
        $this->unit=Unit::find($id);
        $this->unit->name =$request->name;
        $this->unit->description =$request->description;
        $this->unit->save();

        $this->notofication=[
            'message'=>'Unit Update Successfully',
            'alert-type'=>'success'


        ];
        return redirect('/manage-unit')->with($this->notofication);

    }
    public function delete($id)
    {
        $this->unit=Unit::find($id);
        $this->unit->delete();
        return redirect('manage-unit')->with('message','Unit delete successfully');

    }
}

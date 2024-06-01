<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index()
    {
        $Report = Report::all();
        return view('Report.index', [
            'Report' => $Report
        ]);
    }

    public function create()
    {
        return view('Report.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'report_no' => 'required',
            'transaction_id' => 'required',
            'report_text' => 'required'
        ])->validate();

        $Report = Report::create($validator);
        $Report->save();

        return redirect('/Report');
    }

    public function edit($id)
    {
        $Report = Report::find($id);
        return view('Report.edit', [
            'Report' => $Report
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'report_no' => 'required',
            'transaction_id' => 'required',
            'report_text' => 'required'
        ])->validate();

        $Report = Report::find($id);
        $Report->update($validator);

        return redirect('/Report');
    }

    public function destroy($id)
    {
        $Report = Report::find($id);
        $Report->delete();
        
        return redirect('/Report');
    }
}
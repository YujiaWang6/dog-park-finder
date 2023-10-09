<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Park;

class ReportsController extends Controller
{
    public function list()
    {
        return view('reports.list', [
            'reports'=>Report::all()
        ]);
    }

    public function deleteConfirm(Report $report)
    {
        return view('reports.delete', [
            'report' => $report,
            'users' => User::all(),
            'parks' => Park::all(),
        ]);
    }

    public function deleted(Report $report)
    {
        $report->delete();

        return redirect('/console/reports/list')
            ->with('message', 'report for ' . $report->park->park_name . ' has been deleted');
    }

    public function addForm()
    {
        return view('reports.add',[
            'users' => User::all(),
            'parks' => Park::all(),
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'user_id' => 'required',
            'park_id' => 'required',
            'report' => 'required',
        ]);

        $report = new Report();
        $report->user_id = $attributes['user_id'];
        $report->park_id = $attributes['park_id'];
        $report->report = $attributes['report'];
        $report->save();

        return redirect('/console/reports/list')
            ->with('message', 'report for ' . $report->park->park_name . ' has been created');
    }

    public function editForm(Report $report)
    {
        return view('reports.edit',[
            'report' => $report,
            'users' => User::all(),
            'parks' => Park::all(),
        ]);
    }

    public function edit(Report $report)
    {
        $attributes = request()->validate([
            'user_id' => 'required',
            'park_id' => 'required',
            'report' => 'required',
        ]);

        $report->user_id = $attributes['user_id'];
        $report->park_id = $attributes['park_id'];
        $report->report = $attributes['report'];
        $report->save();

        return redirect('/console/reports/list')
            ->with('message', 'report for ' . $report->park->park_name . ' has been updated');
    }
}

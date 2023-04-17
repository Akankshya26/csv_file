<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;

class UserController extends Controller
{
    public function importView(Request $request)
    {
        return view('view');
    }

    public function import(Request $request)
    {
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        return redirect()->back()->with('success', 'Import Successfully');
    }

    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller {

    public function getReports(Request $request) {
        $post = $request->all();
        $where = [];


        foreach ($post as $key => $value) {
            if ($value) {
                $where[] = [$key, 'like' . ' %' . $value . '%'];
            }
        }

        $reports = Reports::where($where)->get();

        return response()->json([
            'reports' => $reports
        ]);
    }
}

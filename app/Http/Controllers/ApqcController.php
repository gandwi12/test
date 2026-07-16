<?php

namespace App\Http\Controllers;
use App\Models\ApqcProcess;


use Illuminate\Http\Request;

class ApqcController extends Controller
{
    public function app()
    {
        // $processes = ApqcProcess::with('metrics')->paginate(50);
        // return view('apqc.apqc', compact('processes'));

        $processes = ApqcProcess::where('level', 1)->with([
            'metrics',
            'children.metrics',
            'children.children.metrics',
            'children.children.children.metrics',
        ])->get();
        return view('apqc.apqc', compact('processes'));
    }
}

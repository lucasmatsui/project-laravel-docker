<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $data = array();

    $series = [
      'Grey',
      'Good Doctor',
      'Friends'
    ];

    $data['series'] = $series;

    return view('series.index', $data);
  }
  
  public function create()
  {
    return view('series.create');
  }


}
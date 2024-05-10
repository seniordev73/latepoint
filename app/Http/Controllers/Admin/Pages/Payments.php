<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class Payments extends Controller
{
  public function index()
  {
    $payments = Transaction::all();

    $jsonData = json_encode(['data' => $payments]);
    $filePath = public_path('assets/json/table-datatable1.json');
    file_put_contents($filePath, $jsonData);

    return view('content.tables.tables-payments');
  }
}
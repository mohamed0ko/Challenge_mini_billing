<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('Invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('Invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'date' => 'date',
            'lines' => 'required|array|min:1',
            'lines.*.description' => 'required|string',
            'lines.*.quantity' => 'required|numeric|min:1',
            'lines.*.unit_price' => 'required|numeric|min:0',
            'lines.*.tva_rate' => 'required|in:0,5.5,10,20'
        ]);

        $lines = $request->lines;
        $total_ht = 0;
        $total_tva = 0;

        foreach ($lines as $line) {
            $line_total = $line['quantity'] * $line['unit_price'];
            $total_ht += $line_total;
            $total_tva += $total_ht * ($line['tva_rate'] / 100);
        }
        $total_ttc = $total_ht + $total_tva;

        $invoice = Invoice::create([
            'customer_id' => $request->customer_id,
            'date' => \Carbon\Carbon::now(),
            'lines' => $lines,
            'total_ht' => $total_ht,
            'total_tva' => $total_tva,
            'total_ttc' => $total_ttc

        ]);
        return response()->json([
            'message' => 'create invoice sucssefully',
            'invioce' => $invoice
        ]);
    }

    public function show($id)
    {
        $invoices = Invoice::find($id);
        $customers =  Customer::find($invoices->customer_id);

        return view('Invoices.show', compact('invoices', 'customers'));
    }



    public function destroy($id)
    {
        $invoices = Invoice::find($id);
        $invoices->delete();

        return redirect()->route('Invoices.index')->with('success', 'Invoices deleted successfully.');
    }
}

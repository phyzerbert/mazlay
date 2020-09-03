<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Bank;
use App\Models\Payment;
use App\Models\Customer;

use App\Exports\SalesExport;
use Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        config(['site.page' => 'sale']);
        $banks = Bank::all();

        $keyword = $bank_id = $name_as_ic = '';
        $mod = new Sale();
        if($request->get('bank_id') != '') {
            $bank_id = $request->get('bank_id');
            $payment_array = Payment::where('bank_id', $bank_id)->pluck('id');
            $mod = $mod->whereIn('payment_id', $payment_array);
        }
        if($request->get('name_as_ic') != '') {
            $name_as_ic = $request->get('name_as_ic');
            $customer_array = Customer::where('name_as_ic', 'like', "%$name_as_ic%")->pluck('id');
            $mod = $mod->whereIn('customer_id', $customer_array);
        }
        $data = $mod->orderBy('created_at')->paginate(15);
        return view('backend.index', compact('data', 'keyword', 'banks', 'bank_id', 'name_as_ic'));
    }

    public function delete_sale($id) {
        $sale = Sale::find($id);
        $sale->payment->delete();
        $sale->customer->delete();
        ProductSale::where('sale_id', $id)->delete();
        $sale->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function get_sale_products(Request $request) {
        $data = [
            'status' => 200,
            'result' => ProductSale::with('product')->where('sale_id', $request->get('sale_id'))->get(),
        ];
        return response()->json($data);
    }

    public function export(Request $request) {
        return Excel::download(new SalesExport, 'sales.xlsx');
    }
}

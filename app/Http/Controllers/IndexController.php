<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

use App\Models\Product;
use App\Models\Customer;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\Payment;

class IndexController extends Controller
{
    public function index(Request $request) {
        return view('index');
    }

    public function add_to_cart(Request $request) {
        if (!$request->session()->exists('cart')) {
            $request->session()->put('cart', []);
        }

        $cart = $request->session()->get('cart');
        $product = Product::find($request->get('product_id'));

        if(!array_key_exists($product->id, $cart)) {
            $cart[strval($product->id)] = 0;
        }

        $request->session()->put('cart', $cart);
        $data = [
            'status' => 200,
            'count' => count($cart),
            'data' => $cart,
        ];
        return response()->json($data);
    }

    public function cart(Request $request) {
        return view('frontend.cart');
    }

    public function get_cart(Request $request) {

        $products = Product::all();
        $initial_cart = [];
        foreach ($products as $item) {
            $initial_cart[$item->id] = 0;
        }

        $request->session()->put('cart', $initial_cart);

        $cart = $request->session()->get('cart');

        $cart_data = array();
        foreach ($cart as $key => $value) {
            $item = [
                'product' => Product::find($key),
                'quantity' => $value,
            ];
            array_push($cart_data, $item);
        }

        return response()->json(['status' => 200, 'data' => $cart_data]);
    }

    public function save_cart(Request $request) {
        $cart_data = $request->get('cart');
        $cart = array();
        foreach ($cart_data as $item) {
            $product = $item['product'];
            $cart[$product['id']] = $item['quantity'];
        }
        $request->session()->put('cart', $cart);
        $data = [
            'status' => 200,
            'count' => count($cart),
            'data' => $cart,
        ];
        return response()->json($data);
    }

    public function remove_cart_item(Request $request, $id) {
        $cart = $request->session()->get('cart');
        $cart_data = array();
        foreach ($cart as $key => $value) {
            if($key != $id) {
                $cart_data[$key] = $value;
            }
        }
        $request->session()->put('cart', $cart_data);

        return response()->json(['status' => 200]);
    }

    public function input_customer(Request $request) {
        if (!$request->session()->exists('cart')) {
            return redirect(route('index'));
        }
        return view('frontend.customer');
    }

    public function save_customer(Request $request) {
        $request->validate([
            'name_as_ic' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'postcode' => 'required|string',
        ]);

        $request->session()->put('customer', $request->all());

        return redirect(route('checkout'));
    }

    public function checkout(Request $request) {
        if (!$request->session()->exists('customer')) {
            return redirect(route('input_customer'));
        }
        return view('frontend.checkout');
    }

    public function place_order(Request $request) {
        if ($request->session()->exists('customer')) {
            $session_customer = $request->session()->get('customer');
            $customer = Customer::create([
                            'name_as_ic' => $session_customer['name_as_ic'],
                            'country_id' => $session_customer['country'],
                            'phone_number' => $session_customer['phone_number'],
                            'address' => $session_customer['address'],
                            'postcode' => $session_customer['postcode'],
                        ]);
        } else {
            return response()->json(['status' => 400, 'result' => 'customer_error']);
        }
        if ($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            return response()->json(['status' => 400, 'result' => 'cart_error']);
        }

        $sale = Sale::create([
            'reference_no' => $request->get('reference_no'),
            'customer_id' => $customer->id,
            'status' => 1,
        ]);
        foreach ($cart as $key => $value) {
            $product = Product::find($key);
            $product->decrement('quantity', $value);
            ProductSale::create([
                        'product_id' => $key,
                        'sale_id' => $sale->id,
                        'quantity' => $value,
                        'amount' => $product->price * $value,
                    ]);
        }

        $payment = Payment::create([
            'bank_id' => $request->get('bank_id'),
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'sale_id' => $sale->id,
            'status' => 1,
            'amount' => $sale->products()->sum('amount'),
        ]);

        $sale->update([
                'payment_id' => $payment->id,
                'total_amount' => $sale->products()->sum('amount'),
            ]);

        $request->session()->forget(['cart', 'customer']);

        return response()->json(['status' => 200]);

    }

    public function lang($locale) {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}

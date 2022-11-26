<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Role;
use PDF;
use Mail;
use App\Mail\RequestMail;
use App\Mail\ApproveMail;

use Illuminate\Http\Request;
use Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        $totalSales = '';
        $loggedInUser = Auth::user();
        $roleId = (int) $loggedInUser->role_id;
        $role = Role::find($roleId);
        $totalRequestedSales = '';
        $totalDeliveredSales = '';
        $totalApprovedSales = '';

        if ($role->name == 'admin' || $role->name == 'inventory') {
            $totalSales = $sales->count();
            //total requested sales
            $totalRequestedSales = $this->salesCount('Requested');
            //total delivered sales
            $totalDeliveredSales = $this->salesCount('Delivered');
            //total aproved sales
            $totalApprovedSales = $this->salesCount('Approved');
        } elseif ($role->name == 'staff') {
            $sales = $sales->where('user_id', $loggedInUser->id);
            $totalSales = $this->totalSales($loggedInUser->id);
            //total requested sales
            $totalRequestedSales = $this->salesCountWithStatus('Requested', $loggedInUser->id);
            //total delivered sales
            $totalDeliveredSales = $this->salesCountWithStatus('Delivered', $loggedInUser->id);
            //total aproved sales
            $totalApprovedSales = $this->salesCountWithStatus('Approved', $loggedInUser->id);
        }

        return view('sales.index', compact('sales', 'totalSales', 'totalRequestedSales', 'totalDeliveredSales', 'totalApprovedSales'));
    }

    private function salesCountWithStatus($status, $userId)
    {
        $totalSalesWithStatus = Sale::where('status', $status)
            ->where('user_id', $userId)
            ->count();
        return $totalSalesWithStatus;
    }
    private function salesCount($status)
    {
        $totalSalesWithStatus = Sale::where('status', $status)->count();
        return $totalSalesWithStatus;
    }

    private function totalSales($userId)
    {
        $totalSales = Sale::where('user_id', $userId)->count();
        return $totalSales;
    }
    private function saleQueryWthStatus($status)
    {
        $query = Sale::where('status', $status)->get();
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('sales.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'product_id' => 'required',
            'location' => 'required',
            'payment_method' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
            'total_paid' => 'required',
            'total_dues' => 'required',
        ]);

        $loggedInUser = Auth::user()->id;
        $sale = Sale::create(array_merge($request->all(), ['payment_status' => 1, 'status' => 'Requested', 'user_id' => $loggedInUser]));

        // Request Mail from Staff to Manager
        $product_name = $sale->product->name;
        $request_from = auth()->user()->name;
        $to = 'halix90530@sopulit.com';
        $title = 'Sale Request';
        $body = 'Hey Manger, '. $product_name.' is requested from '.$request_from;
        $this->approve_mail($to, $title, $body);

        return redirect()
            ->route('sales.create')
            ->with('success', 'Sale created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function requestedView()
    {
        $sales = $this->saleQueryWthStatus('Requested');
        $totalSales = Sale::all();
        $loggedInUser = Auth::user();
        $roleId = (int) $loggedInUser->role_id;
        $role = Role::find($roleId);
        $totalRequestedSales = '';
        $totalDeliveredSales = '';
        $totalApprovedSales = '';

        if ($role->name == 'admin' || $role->name == 'inventory') {
            $totalSales = $totalSales->count();
            //total requested sales
            $totalRequestedSales = $this->salesCount('Requested');
            //total delivered sales
            $totalDeliveredSales = $this->salesCount('Delivered');
            //total aproved sales
            $totalApprovedSales = $this->salesCount('Approved');
        } elseif ($role->name == 'staff') {
            $sales = $sales->where('user_id', $loggedInUser->id);
            $totalSales = $this->totalSales($loggedInUser->id);
            //total requested sales
            $totalRequestedSales = $this->salesCountWithStatus('Requested', $loggedInUser->id);
            //total delivered sales
            $totalDeliveredSales = $this->salesCountWithStatus('Delivered', $loggedInUser->id);
            //total aproved sales
            $totalApprovedSales = $this->salesCountWithStatus('Approved', $loggedInUser->id);
        }

        return view('sales.requested', compact('sales', 'totalSales', 'totalRequestedSales', 'totalDeliveredSales', 'totalApprovedSales'));
    }

    public function deliveredView()
    {
        $sales = $this->saleQueryWthStatus('Delivered');
        $totalSales = Sale::all();
        $loggedInUser = Auth::user();
        $roleId = (int) $loggedInUser->role_id;
        $role = Role::find($roleId);
        $totalRequestedSales = '';
        $totalDeliveredSales = '';
        $totalApprovedSales = '';

        if ($role->name == 'admin' || $role->name == 'inventory') {
            $totalSales = $totalSales->count();

            //total requested sales
            $totalRequestedSales = $this->salesCount('Requested');
            //total delivered sales
            $totalDeliveredSales = $this->salesCount('Delivered');
            //total aproved sales
            $totalApprovedSales = $this->salesCount('Approved');
        } elseif ($role->name == 'staff') {
            $sales = $sales->where('user_id', $loggedInUser->id);
            $totalSales = $this->totalSales($loggedInUser->id);
            //total requested sales
            $totalRequestedSales = $this->salesCountWithStatus('Requested', $loggedInUser->id);
            //total delivered sales
            $totalDeliveredSales = $this->salesCountWithStatus('Delivered', $loggedInUser->id);
            //total aproved sales
            $totalApprovedSales = $this->salesCountWithStatus('Approved', $loggedInUser->id);
        }

        return view('sales.delivered', compact('sales', 'totalSales', 'totalRequestedSales', 'totalDeliveredSales', 'totalApprovedSales'));
    }
    public function approvedView()
    {
        $sales = $this->saleQueryWthStatus('Approved');
        $totalSales = Sale::all();
        $loggedInUser = Auth::user();
        $roleId = (int) $loggedInUser->role_id;
        $role = Role::find($roleId);
        $totalRequestedSales = '';
        $totalDeliveredSales = '';
        $totalApprovedSales = '';

        if ($role->name == 'admin' || $role->name == 'inventory') {
            $totalSales = $totalSales->count();
            //total requested sales
            $totalRequestedSales = $this->salesCount('Requested');
            //total delivered sales
            $totalDeliveredSales = $this->salesCount('Delivered');
            //total aproved sales
            $totalApprovedSales = $this->salesCount('Approved');
        } elseif ($role->name == 'staff') {
            $sales = $sales->where('user_id', $loggedInUser->id);
            $totalSales = $this->totalSales($loggedInUser->id);
            //total requested sales
            $totalRequestedSales = $this->salesCountWithStatus('Requested', $loggedInUser->id);
            //total delivered sales
            $totalDeliveredSales = $this->salesCountWithStatus('Delivered', $loggedInUser->id);
            //total aproved sales
            $totalApprovedSales = $this->salesCountWithStatus('Approved', $loggedInUser->id);
        }

        return view('sales.approved', compact('sales', 'totalSales', 'totalRequestedSales', 'totalDeliveredSales', 'totalApprovedSales'));
    }

    public function statusUpdateApproved($id)
    {
        $sales = Sale::where('id', $id)
            ->where('status', 'Requested')
            ->first();
        $sales->update(['status' => 'Approved']);
        return redirect()
            ->back()
            ->with('success', 'Requested status updated sucessfully.');
    }
    public function edit_sale($id)
    {
        $sale = Sale::find($id);
        // return $sale;
        return response()->json([
            'status' => 200,
            'sale' => $sale,
        ]);
    }
    public function update_sale(Request $request)
    {
        $sale_id = $request->approve_sale_id;
        $sale = Sale::find($sale_id);
        $product = Product::find($sale->product_id);
        // return $product;
        if ($product->current_stock > 0) {
            $product->current_stock = $product->current_stock - 1;
            $product->update();
            // $product->update(['current_stock' => $product->current_stock - 1]);
            $sale->update(['status' => 'Approved']);
            $sale->touch();

            // Approve Mail from Manager to Staff
            $receiver_name = $sale->user->name;
            $to = 'halix90530@sopulit.com';
            $title = 'Request Approved';
            $body = 'Hey ' . $receiver_name . ', Your request for the sale id ' . $sale_id . ' has been approved';
            $this->approve_mail($to, $title, $body);

            // Session::flash('message', 'Requested status updated sucessfully.');
            // Session::flash('alert-class', 'alert-success');
            $message = 'Requested status updated successfully. ' . $product->current_stock . ' stock remaining.';
            $alert_class = 'alert-success';
        } else {
            $message = 'Failed! Product is out of order.';
            $alert_class = 'alert-danger';
        }
        return redirect()
            ->back()
            ->with('message', $message)
            ->with('alert-class', $alert_class);
    }

    public function imageUploadDelivered(Request $request, $id)
    {
        $this->validate($request, [
            'delivery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasfile('delivery_image')) {
            $imageName = time() . '.' . $request->delivery_image->extension();
            $request->delivery_image->move(public_path('recipts'), $imageName);
        }

        $sales = Sale::find($id);
        $sales->update(['delivery_image' => $imageName, 'status' => 'Delivered']);
        return redirect()
            ->back()
            ->with('success', 'Approved status updated sucessfully.');
    }

    public function generatePDF($id)
    {
        // retreive all records from db
        // $sale = Sale::where('id',$id)->get()->first();
        // $sale = Sale::where('id',$id)
        //     ->join('customers', 'customers.id', '=', 'sales.customer_id')
        //     ->select('sales.*', 'customers.*')
        //     ->get()->first();

        $sale = Sale::where('sales.id', $id)
            ->join('customers', 'customers.id', '=', 'sales.customer_id')
            ->join('products', 'products.id', '=', 'sales.product_id')
            ->select('sales.*', 'customers.name as customer_name', 'customers.mobile as customer_mobile', 'customers.address as   customer_address', 'products.name as product_name')
            ->get()
            ->first();
        //     $sale = [
        //         'sale' => $sale
        // ];
        return view('sales.delivery_note', compact('sale'));

        // share data to view
        // view()->share('delivery-note', $sale);
        // $pdf = PDF::loadView('sales.delivery_note', $sale);
        // return $pdf->download('sales.delivery_note');
    }

    // Mail Functions

    public function approve_mail($to, $title, $body)
    {
        $mailData = [
            'title' => $title,
            'body' => $body,
        ];

        if(auth()->user()->role->name = 'inventory'){
            Mail::to($to)->send(new ApproveMail($mailData));
        }

        if(auth()->user()->role->name = 'staff'){
            Mail::to($to)->send(new RequestMail($mailData));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\{Customer,Supplier,Product};
use App\Models\User;
use App\Models\Role;
use App\Models\Sale;
use Carbon\Carbon;
use Auth;
use DB;

use Illuminate\Http\Request;

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
    public function index()
    {
        $loggedInUser = Auth::user();
        $roleId = (int)$loggedInUser->role_id;
        $role = Role::find($roleId);
        $totalDeliveredOrders = 0;
        $totalPendingOrders = 0;

        if ($role->name == "admin" || $role->name == "inventory") {
            $totalSales = Sale::all()->count();
            $totalPendingOrders = Sale::where('status', 'Requested')->count();
            $totalApprovedOrders = Sale::where('status', 'Approved')->count();
            $totalDeliveredOrders = Sale::where('status', 'Delivered')->count();
        } else if ($role->name == "staff") {
            $totalSales = Sale::where('user_id',$loggedInUser->id)->count();
            $totalPendingOrders = Sale::where('user_id', $loggedInUser->id)->where('status', 'Requested')->count();
            $totalApprovedOrders = Sale::where('user_id', $loggedInUser->id)->where('status', 'Approved')->count();
            $totalDeliveredOrders = Sale::where('user_id', $loggedInUser->id)->where('status', 'Delivered')->count();
        }
        // Counting
        $total_customers = Customer::all()->count();
        $total_suppliers = Supplier::all()->count();
        $total_products = Product::all()->count();

        // Bar Chart (Current Month Deliveries)
        $barChartData = Sale::select(DB::raw("(COUNT(*)) as count"),DB::raw("DATE(updated_at) as days"))
        ->where('status','Delivered')
        ->whereMonth('updated_at', date('m'))
        ->whereYear('updated_at', date('Y'))
        ->groupBy('days')
        ->get();

        // return $barChartData;

        // Pie Chart Data
        $currentMonthRequestedSales = Sale::where('status','Requested')->whereMonth('updated_at', Carbon::now()->month)->count();
        $currentMonthApprovedSales = Sale::where('status','Approved')->whereMonth('updated_at', Carbon::now()->month)->count();
        $currentMonthDeliveredSales = Sale::where('status','Delivered')->whereMonth('updated_at', Carbon::now()->month)->count();

        $pieChartData = [$currentMonthRequestedSales,$currentMonthApprovedSales,$currentMonthDeliveredSales];
        // return $pieChartData;

        return view('dashboard', compact(
            // Boxes
            'totalSales','totalDeliveredOrders','totalApprovedOrders','totalPendingOrders',
            'total_customers','total_suppliers','total_products',
            // Chart
            'pieChartData','barChartData'
        ));
    }

    private function salesByMonth($userId = null)
    {
        if ($userId == null) {
            $sales = Sale::select('id', 'created_at')
                ->get()
                ->groupBy(function ($date) {
                    //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return Carbon::parse($date->created_at)->format('m'); // grouping by months
                });
        } else {
            $sales = Sale::select('id', 'created_at')->where('user_id', $userId)
                ->get()
                ->groupBy(function ($date) {
                    //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return Carbon::parse($date->created_at)->format('m'); // grouping by months
                });
        }
        $salesmcount = [];
        $salesArr = [];
        foreach ($sales as $key => $value) {
            $salesmcount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($salesmcount[$i])) {
                $salesArr[$i] = $salesmcount[$i];
            } else {
                $salesArr[$i] = 0;
            }
        }
        return $salesArr;
    }
}

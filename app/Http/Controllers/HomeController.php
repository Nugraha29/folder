<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pelaporan;
use App\Pengaduan;
use App\Charts\DashboardChart;

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
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $api = url('/chart-ajax');
        
        $chart = new DashboardChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);

        return view('dashboard', compact('chart'));
    }

    public function chartAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');

        $pengaduan = Pengaduan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $pelaporan = Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $chart = new DashboardChart;
  
        $chart->dataset('Grafik Pengaduan Baru', 'line', $pengaduan)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);
        $chart->dataset('Grafik Pelaporan Baru', 'line', $pelaporan)->options([
                    'fill' => 'true',
                    'borderColor' => '#c15151'
                ]);
  
        return $chart->api();
    }
}

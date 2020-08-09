<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pelaporan;
use App\Review;
use App\Pengaduan;
use App\Charts\DashboardChart;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $countpelaporan = Pelaporan::count();
        $countreview = Review::count();
        $countpengaduan = Pengaduan::count();


        $pelaporanapi = url('/pelaporan-chart-ajax');
        $pengaduanapi = url('/pengaduan-chart-ajax');

        $pelaporanchart = new DashboardChart;
        $pelaporanchart->labels(['Periode 1', 'Periode 2', 'Periode 3', 'Periode 4'])->load($pelaporanapi);

        $pengaduanchart = new DashboardChart;
        $pengaduanchart->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'OKtober', 'November', 'Desember'])->load($pengaduanapi);

        return view('dashboard', compact('pelaporanchart', 'pengaduanchart', 'countpelaporan', 'countreview', 'countpengaduan'));
    }

    public function pelaporanchartAjax(Request $request)
    {
        $pelaporanyear = $request->has('pelaporanyear') ? $request->pelaporanyear : date('Y');

        $pelaporan = Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $pelaporanyear)
                    ->groupBy(\DB::raw("periode"))
                    ->pluck('count');

        $pelaporanchart = new DashboardChart;
  
        $pelaporanchart->dataset('Grafik Pelaporan Baru', 'line', $pelaporan)
                        ->color("#ffa726")
                        ->backgroundcolor("#ffa726")
                        ->fill(false);
  
        return $pelaporanchart->api();
    }

    public function pengaduanchartAjax(Request $request)
    {
        $pengaduanyear = $request->has('pengaduanyear') ? $request->pengaduanyear : date('Y');

        $pengaduan = Pengaduan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $pengaduanyear)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $pengaduanchart = new DashboardChart;
  
        $pengaduanchart->dataset('Grafik Pengaduan Baru', 'line', $pengaduan)
                    ->color("#ef5350")
                    ->backgroundcolor("#ef5350")
                    ->fill(false);
  
        return $pengaduanchart->api();
    }

    public function waiting()
    {
        //
        return view('waiting');
    }
}

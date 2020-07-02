<?php

namespace App\Http\Controllers;

use App\User;

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
        //total
        $countpelaporan = \App\Pelaporan::count();
        $countpengaduan = \App\Pengaduan::count();
        //chart
        $chartpelaporan = \App\Pelaporan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
        $chartpengaduan = \App\Pengaduan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
        //dd($chartpengaduan);

        return view('dashboard', ['users' => $model, 
                                  'countpelaporan' => $countpelaporan, 
                                  'countpengaduan' => $countpengaduan,
                                  'chartpelaporan' => $chartpelaporan,
                                  'chartpengaduan' => $chartpengaduan
                                  ]);
    }
}

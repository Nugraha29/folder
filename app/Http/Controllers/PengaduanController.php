<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Http\Requests\PengaduanRequest;
use Illuminate\Http\Request;
use App\Exports\PengaduanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    public function json(){
        $pengaduan = Pengaduan::all();
        return Datatables::of($pengaduan)
        ->addColumn('action', function($data){
            $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-icon p-2 text-white" href="/pengaduan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
            $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->editColumn('created_at', function ($pengaduan) {
            return $pengaduan->created_at ? with(new Carbon($pengaduan->created_at))->format('m F Y') : '';
        })
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengaduan = Pengaduan::paginate(10);
        return view('pengaduan.index', ['pengaduan' => $pengaduan]);

    }

    public function export()
    {
        return Excel::download(new PengaduanExport, 'pengaduan.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengaduan.guest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pengaduan $model)
    {
        
        $this->validate($request, [
                'nik' => 'required|min:3',
                'nama' => 'required|min:3',
                'telp' => 'required|min:6',
                'email' => 'required|min:3',
                'lat'=>'required|min:3',
                'lng'=>'required|min:3',
                'jenis'=>'required|min:3',
                'deskripsi' => 'required|min:3',
                'img1' => 'required|mimes:jpg,jpeg,png',
                'img2' => 'required|mimes:jpg,jpeg,png',
                'img3' => 'required|mimes:jpg,jpeg,png',
                'img4' => 'required|mimes:jpg,jpeg,png',
                'g-recaptcha-response' => 'required|captcha'
            ],
            [
                'img1.mimes' => 'Inputan Bukti Foto harus berupa file bertipe: jpg, jpeg, png.',    
                'img2.mimes' => 'Inputan Bukti Foto harus berupa file bertipe: jpg, jpeg, png.',    
                'img3.mimes' => 'Inputan Bukti Foto harus berupa file bertipe: jpg, jpeg, png.',                      
                'img4.mimes' => 'Inputan Foto KTP harus berupa file bertipe: jpg, jpeg, png.',  
                'img1.required' => 'Inputan Bukti Foto wajib diisi.',    
                'img2.required' => 'Inputan Bukti Foto wajib diisi.',    
                'img3.required' => 'Inputan Bukti Foto wajib diisi.',                      
                'img4.required' => 'Inputan Bukti Foto wajib diisi.',                   
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',                  
                'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',                     
            ]

        );
        
        $model = new Pengaduan;
        $model->nik= $request->get('nik');
        $model->nama= $request->get('nama');
        $model->telp= $request->get('telp');
        $model->email= $request->get('email');
        $model->lat = $request->get('lat');
        $model->long = $request->get('lng');
        $model->jenis = $request->get('jenis');
        $model->deskripsi = $request->get('deskripsi');
        $model->img1 = $request->file('img1')->store('FotoPengaduan', 'public');
        if ($request->file('img2'))
        {
            $model->img2 = $request->file('img2')->store('FotoPengaduan', 'public');
        }
        if ($request->file('img3'))
        {
            $model->img3 = $request->file('img3')->store('FotoPengaduan', 'public');
        }
        if ($request->file('img4'))
        {
            $model->img4 = $request->file('img4')->store('FotoKTP', 'public');
        }

        $model->save();

        Alert::success('Berhasil', 'Pengaduan berhasil dikirim!');

        return redirect()->route('pengaduan.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.show', ['pengaduan' => $pengaduan]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pengaduan = Pengaduan::findOrFail($id);
        if(file_exists(storage_path('app/public/' . $pengaduan->img1))){
            \Storage::delete('public/' . $pengaduan->img1); 
        }
        if(file_exists(storage_path('app/public/' . $pengaduan->img2))){
            \Storage::delete('public/' . $pengaduan->img2); 
        }
        if(file_exists(storage_path('app/public/' . $pengaduan->img3))){
            \Storage::delete('public/' . $pengaduan->img3); 
        }
        if(file_exists(storage_path('app/public/' . $pengaduan->img4))){
            \Storage::delete('public/' . $pengaduan->img4); 
        }
        $pengaduan->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return redirect()->route('pengaduan.index');
    }
}

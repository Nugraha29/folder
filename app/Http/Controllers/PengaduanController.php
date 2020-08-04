<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Http\Requests\PengaduanRequest;
use Illuminate\Http\Request;
use App\Exports\PengaduanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class PengaduanController extends Controller
{
    public function json(){
        return Datatables::of(Pengaduan::all())->addColumn('action', function($data){
            $button = '<a class="btn btn-sm btn-info" href="/pengaduan/'.$data->id.'">Lihat Detail</a>';
            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Hapus</button>';
            return $button;
        })
        ->rawColumns(['action'])->make(true);
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
                'long'=>'required|min:3',
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
        $model->long = $request->get('long');
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

        return redirect()->route('pengaduan.create')->withStatus(__('Pengaduan berhasil dikirim.'));

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

        return redirect()->route('pengaduan.index')->withStatus(__('Pengaduan berhasil dihapus.'));
    }
}

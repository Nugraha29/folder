<?php

namespace App\Http\Controllers;

use App\Pelaporan;
use App\Review;
use App\Mail\ReviewEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PelaporanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Exports\PelaporanExport;
use App\Exports\ReviewExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class PelaporanController extends Controller
{
    public function json(){
        return Datatables::of(Pelaporan::all())->addColumn('action', function($data){
            $button = '<a class="btn btn-sm btn-warning" href="/pelaporan/tanggapi/'.$data->id.'">Tanggapi</a>';
            $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-info" href="/pelaporan/'.$data->id.'">Lihat Detail</a>';
            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
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
        if (Gate::allows('isAdmin')) {
            $pelaporan = Pelaporan::paginate(10);
            return view('pelaporan.index', ['pelaporan' => $pelaporan]);
        } elseif (Gate::allows('isUser')) {
            $pelaporan = Pelaporan::where('user_id', '=', auth()->user()->id)->paginate(10);
            //$kecamatan = Kecamatan::where('id')->get();
            return view('pelaporan.index', ['pelaporan' => $pelaporan]);
        }  else {
            abort(404, 'Anda tidak memiliki cukup hak akses');
        }
    }

    public function menu()
    {
        return view('pelaporan.menu');
    }

    public function export()
    {
        return Excel::download(new PelaporanExport, 'pelaporan.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function form_air()
    {
        //
        return view('pelaporan.form-air');
    }

    public function form_udara()
    {
        //
        return view('pelaporan.form-udara');
    }

    public function form_limbah()
    {
        //
        return view('pelaporan.form-limbah');
    }

    public function form_lingkungan()
    {
        //
        return view('pelaporan.form-lingkungan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelaporanRequest $request, Pelaporan $model)
    {
        //

        $model = new Pelaporan;
        $model->nama= $request->get('nama');
        $model->telp= $request->get('telp');
        $model->nama_perusahaan = $request->get('nama_perusahaan');
        $model->email = $request->get('email');
        $model->bidang_usaha = $request->get('bidang_usaha');
        $model->jenis = $request->get('jenis');
        $model->periode = $request->get('periode');  
        $model->dok_pelaporan = $request->file('dok_pelaporan')->store('DokumenPelaporan', 'public');
        $model->dok_izin = $request->file('dok_izin')->store('DokumenIzin', 'public');
        if ($request->get('jenis') == 'Air') {
            $model->dok_lab = $request->file('dok_lab')->store('DokumenLab', 'public');
        } elseif ($request->get('jenis') == 'Udara') {
            $model->dok_lab = $request->file('dok_lab')->store('DokumenLab', 'public');
        } else {

        }
        
        $model->user_id = auth()->user()->id;


        $model->save();

        return back()->withStatus(__('Pelaporan berhasil dikirim.'));

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
        $pelaporan = Pelaporan::find($id);
        return view('pelaporan.show', ['pelaporan' => $pelaporan]);
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

    public function jsonreview(){
        return Datatables::of(Review::all())->addColumn('action', function($data){
            $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-info" href="/tanggapan/'.$data->id.'">Lihat Detail</a>';
            return $button;
        })
        ->rawColumns(['action'])->make(true);
    }

    public function indexreview()
    {  
        $review = Review::all();
        return view('review.index', ['review' => $review]);
    }

    public function pelaporanreview($id)
    {  
        $pelaporan = Pelaporan::find($id);
        $review = Review::all();
        return view('pelaporan.review', ['pelaporan' => $pelaporan, 'review' => $review]);
    }

    public function review(Request $request, Review $model)
    {  
        $model = new Review;
        $model->nama = auth()->user()->name;
        $model->nama_pelapor = $request->get('nama_pelapor');
        $model->email = $request->get('email');
        $model->nama_perusahaan = $request->get('nama_perusahaan');
        $model->bidang_usaha = $request->get('bidang_usaha');
        $model->periode = $request->get('periode');  
        $model->review_dok_pelaporan_air = $request->get('review_dok_pelaporan_air');
        $model->review_dok_izin_air = $request->get('review_dok_izin_air');
        $model->review_dok_lab_air = $request->get('review_dok_lab_air');
        $model->review_dok_pelaporan_limbah = $request->get('review_dok_pelaporan_limbah');
        $model->review_dok_izin_limbah = $request->get('review_dok_izin_limbah');
        $model->review_dok_lab_limbah = $request->get('review_dok_lab_limbah');
        $model->review_dok_pelaporan_udara = $request->get('review_dok_pelaporan_udara');
        $model->review_dok_izin_udara = $request->get('review_dok_izin_udara');
        $model->review_dok_lab_udara = $request->get('review_dok_lab_udara');
        $model->kesimpulan = $request->get('kesimpulan');
        $model->pelaporan_id = $request->get('pelaporan_id');  
        $model->user_id = auth()->user()->id;

        $model->save();

        \Mail::raw('Halo '.$model->nama_pelapor.', terimakasih telah melakukan pelaporan. 
Hasil dari penilaian pelaporan Perusahaan '.$model->nama_perusahaan.' memperoleh nilai '.$model->kesimpulan, function ($message) use($model) {
            $message->from('admin@himagrib.co.id', 'Admin');
            $message->to($model->email, $model->nama_pelapor);
            $message->subject('Hasil Penilaian Pelaporan');
        });
        return redirect()->route('pelaporan.index')->withStatus(__('Pelaporan berhasil dikirim.'));

    }

    public function exportreview()
    {
        return Excel::download(new ReviewExport, 'tanggapan.xlsx');
    }

    public function showreview($id)
    {  
        $review = Review::find($id);
        return view('review.show', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PelaporanRequest $request, $id)
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
        $pelaporan = Pelaporan::findOrFail($id);
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_pelaporan))){
            \Storage::delete('public/' . $pelaporan->dok_pelaporan); 
        }
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_izin))){
            \Storage::delete('public/' . $pelaporan->dok_izin); 
        }
        if(file_exists(storage_path('app/public/' . $pelaporan->dok_lab))){
            \Storage::delete('public/' . $pelaporan->dok_lab); 
        }
        $pelaporan->delete();

        return redirect()->route('pelaporan.index')->withStatus(__('Pelaporan successfully deleted.'));
    }
}

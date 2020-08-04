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
use PDF;

class PelaporanController extends Controller
{
    public function json(){
        return Datatables::of(Pelaporan::where('status', '=', 'Reviewing'))->addColumn('action', function($data){
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
            return view('pelaporan.index');
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
        $model->jenis = $request->get('jenis');  
        $model->periode = $request->get('periode');  
        $model->review_dok_pelaporan = $request->get('review_dok_pelaporan');
        $model->review_dok_izin = $request->get('review_dok_izin');
        $model->review_dok_lab = $request->get('review_dok_lab');
        $model->kesimpulan = $request->get('kesimpulan');
        $model->pelaporan_id = $request->get('pelaporan_id');  
        $model->user_id = auth()->user()->id;
        $update = Pelaporan::findOrFail($request->get('pelaporan_id'));
        $update->status ='Reviewed';
        $update->save();
        $model->save();

        $data["email"]=$request->get("email");
        $data["client_name"]=$request->get("nama_pelapor");
        $data["subject"]='Hasil Pelaporan '.$request->get('jenis');

        //$review = Review::where('pelaporan_id', '=', $request->get('pelaporan_id'))->get();
        $pdf = PDF::loadView('pelaporan.mail', ['model' => $model])->setPaper('a4');
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        try{
            Mail::raw('Halo '.$model->nama_pelapor.', terimakasih telah melakukan pelaporan.
Berikut kami lampirkan dokumen hasil dari pelaporan yang telah direview.', function($message)use($data,$pdf,$model) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "Pelaporan ".$model->jenis." ".$model->nama_perusahaan.".pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }

        return redirect()->route('pelaporan.index')->withStatus(__('Pelaporan berhasil dikirim.'));

    }

    public function exportreview()
    {
        return Excel::download(new ReviewExport, 'tanggapan.xlsx');
    }

    public function mail()
    {
        return view('pelaporan.mail');
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

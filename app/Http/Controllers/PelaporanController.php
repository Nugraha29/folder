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
use App\Exports\PelaporanUsersExport;
use App\Exports\ReviewExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PelaporanController extends Controller
{
    public function json(){
        if (Gate::allows('isAdmin')) {
            $pelaporan = Pelaporan::where('status', '=', 'Reviewing');
            return Datatables::of($pelaporan)
            ->addColumn('action', function($data){
                $button = '<a class="btn btn-warning btn-icon p-2 text-white" role="button" href="/pelaporan/tanggapi/'.$data->id.'" title="Tanggapi"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-icon p-2 text-white" href="/pelaporan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($pelaporan) {
                return $pelaporan->created_at ? with(new Carbon($pelaporan->created_at))->format('m F Y') : '';
            })
            ->make(true);
        } elseif (Gate::allows('isUser')) {

            $pelaporan = Pelaporan::where('user_id', '=', auth()->user()->id);
            return Datatables::of($pelaporan)
            ->addColumn('action', function($data){
                $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-icon p-2 text-white" href="/pelaporan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($pelaporan) {
                return $pelaporan->created_at ? with(new Carbon($pelaporan->created_at))->format('m F Y') : '';
            })
            ->make(true);            
        }  else {
            abort(404, 'Anda tidak memiliki cukup hak akses!');
        }
        
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

    public function menu(Request $request)
    { 
        $periode = $request->has('periode') ? $request->periode: '5';
        $tahun = $request->get('tahun') ? $request->get('tahun'): '2025';


        $existairperiode = Pelaporan::where('periode', '5')
                            ->where('user_id', auth()->user()->id )
                            ->where('jenis', 'Air' );

        
        
        if($existairperiode === null){
            $echo = "belum";

        } else {
            $echo = "sudah";

        }
        

        return view('pelaporan.menu', [ 'echo' => $echo,  ]);
    }

    public function pelaporanexport()
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
        $review = Review::all();
        return Datatables::of($review)
        ->addColumn('action', function($data){
            $button = '<a class="btn btn-info btn-icon p-2 text-white" href="/tanggapan/'.$data->id.'" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info link-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->editColumn('created_at', function ($review) {
            return $review->created_at ? with(new Carbon($review->created_at))->format('m F Y') : '';
        })
        ->make(true);
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
        $nextId = DB::table('review')->max('id') + 1;
        $model->no_surat = 'XXX/XXX/XXX/00'.$nextId;
        $model->id_verifikasi = Str::random(20);
        $model->pelaporan_id = $request->get('pelaporan_id');  
        $model->user_id = auth()->user()->id;
        $update = Pelaporan::findOrFail($request->get('pelaporan_id'));
        $update->status ='Reviewed';
        $update->save();

        $date = Carbon::now()->format('d F Y');

        $data["email"]=$request->get("email");
        $data["client_name"]=$request->get("nama_pelapor");
        $data["subject"]='Hasil Pelaporan '.$request->get('jenis');

        $pdf = PDF::loadView('pelaporan.mail', ['model' => $model, 'date' => $date])->setPaper('a4');
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
        \Storage::disk('local')->put('public/PDF Pelaporan/'.date('Y').'/Triwulan '.$model->periode.'/Pelaporan '.$model->jenis.' '.$model->nama_perusahaan.'.pdf', $pdf->output());
        $model->pdf = 'PDF Pelaporan/'.date('Y').'/Triwulan '.$model->periode.'/Pelaporan '.$model->jenis.' '.$model->nama_perusahaan.'.pdf';
        $model->save();
        return redirect()->route('pelaporan.index')->withStatus(__('Pelaporan berhasil ditanggapi.'));

    }

    public function exportreview()
    {
        return Excel::download(new ReviewExport, 'tanggapan.xlsx');
    }

    public function mail()
    {
        $model = Pelaporan::findOrFail(5);
        $date = Carbon::now()->format('d F Y');
        return view('pelaporan.mail', compact('date','model'));
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

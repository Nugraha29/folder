<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    * {
    font-size: medium;
    font-family: 'Times New Roman', Times, serif;
}

.kop {
    text-align: center;
}

.divTableCell,
.divTableHead {
    padding: 0px !important;
    border: 0px !important;
}

</style>
<body>
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="bordered width-100pc" width="100%">
                        <tr class="kop">
                            <td width="10%">
                                <img src="/assets/images/logo-garut.png" width="70">
                            </td>
                            <td width="80%">
                                <font size="4">KABUPATEN GARUT</font><br>     
                                <font size="3"><b>DINAS LINGKUNGAN HIDUP</b></font><br>  
                                <font size="2"><i>Jl. Terusan Pahlawan, Sukagalih, Kec. Tarogong Kidul</i></font><br>  
                                <font size="2"><i>Kabupaten Garut, Jawa Barat 44151</i></font> 
                            </td>
                            <td width="10%">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><hr>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="divTableCell">
                    <table class="bordered width-100pc">
                        <tr>
                            <td>Kepada </td>
                            <td>:</td>
                            <td>Yth. Bapak {{ $model->nama_pelapor }}</td>
                        </tr>
                        <tr>
                            <td>ID Verifikasi </td>
                            <td>:</td>
                            <td>{{ $model->id_verifikasi }}</td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>:</td>
                            <td>Pelaporan {{ $model->jenis }}</td>
                        </tr>
                        <tr>
                            <td>Lampiran</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td colspan="3" height="15px"></td>
                        </tr>
                    </table>
                </div>
                <div class="divTableCell">
                    <table class="bordered width-100pc" width="100%">
                        <tr>
                            <td width="100%" style="text-align: justify">
                                <div style="text-align: center">
                                    PENGUMUMAN
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align: center">
                                    Nomor : {{ $model->no_surat }} 
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="10px"></td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align: center">
                                    <b style="text-transform: uppercase">PENERBITAN BUKTI PELAPORAN {{ $model->jenis }} {{ $model->nama_perusahaan }}</b>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="10px"></td>
                        </tr>
                        <tr>
                            <td>
                                Memperhatikan pasal XX Peraturan Pemerintah Indonesia No XX tahun XXX tentang pelaporan linkungan secara berkala, maka dengan ini kami sampaikan bahwa :
                            </td>
                        </tr>
                        <tr>
                            <td height="20px"></td>
                        </tr>
                    </table>
                </div>
                <div class="divTableCell">
                    <table class="bordered width-100pc">
                        <tr>
                            <td width="25%">Nama Lembaga</td>
                            <td width="1%">:</td>
                            <td style="text-transform: uppercase">{{ $model->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Nama Penanggung Jawab </td>
                            <td>:</td>
                            <td>{{ $model->nama_pelapor }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" height="10px"></td>
                        </tr>
                        <tr>
                            <td>Periode Pelaporan</td>
                            <td>:</td>
                            <td>Triwulan {{ $model->periode }}</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>:</td>
                            <td>{{ date('Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" height="25px"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: justify">
                                dinyatakan <b>{{ $model->kesimpulan }}</b>, berdasarkan keputusan Kepala Dinas Lingkungan Hidup Kabupaten Garut 
                                dengan Nomor {{ $model->no_surat }} tanggal {{ $date }} tentang Izin Lingkungan Hidup 
                                {{ $model->nama_perusahaan }}. Demikian surat ini kami sampaikan untuk dipergunakan sebagaimana mestinya.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" height="25px"></td>
                        </tr>
                    </table>
                </div>
                <div class="divTableCell">
                    <table class="bordered width-100pc" width="100%" style="border-collapse: collapse; border: 1px solid black;">
                        <tr class="kop" style="border: 1px solid black;">
                            <td width="25%" style="border: 1px solid black;">
                               {!! QrCode::format('png')
                                ->merge('assets/images/logo.png', 0.5, true)
                                ->size(500)->errorCorrection('H')
                                ->generate('A simple example of QR code!'); !!} 
                            </td>
                            <td width="75%" style="border: 1px solid black; padding: 5px">
                                Dokumen pelaporan ini secara elektronik sudah diterima oleh
                                <br/>
                                Dinas Lingkungan Hidup Kabupaten Garut, sehingga tanda
                                <br/>
                                terima tidak memerlukan cap dan tandatangan basah. 
                                <br/>
                                <br/>
                                Terimakasih telah menyampaikan laporan pengelolaan dan pemantauan lingkungan
                                <br/>
                                <br/>
                                <b>TIM SISTEM INFORMASI LINGKUNGAN (S I L)</b>
                                <br/>
                                <b>DINAS LINGKUNGAN HIDUP KABUPATEN GARUT</b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

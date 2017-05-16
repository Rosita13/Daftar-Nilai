<?php
/**
 * Created by PhpStorm.
 * User: - INDIEGLO -
 * Date: 27/10/2015
 * Time: 8:45
 */

namespace App\Http\Controllers\Cetak;


use App\Domain\Repositories\ValueRepository;

use App\Http\Controllers\Controller;

class CetakPendaftaran extends Controller
{
    protected $crud;
    protected $paginate;
    protected $akun;
    protected $kelompok;
    protected $jenis;
    protected $objek;
    protected $rincian;
//330 210
    public $kertas_pjg = 297; // portrait
    public $kertas_lbr = 210; // landscape
    public $kertas_pjg1 = 320; // portrait khusus refrensi

    public $font = 'Tahoma';
    public $field_font_size = 9;
    public $row_font_size = 8;

    public $butuh = false; // jika perlu fungsi AddPage()
    protected $padding_column = 5;
    protected $default_font_size = 8;
    protected $line = 0;

    public function __construct(
        ValueRepository $valueRepository

    )
    {
        $this->nilai = $valueRepository;


    }


    function Column($pdf)
    {
        $pdf->AddFont('Tahoma', '', 'tahoma.php');
        $pdf->AddFont('Tahoma', 'B', 'tahomabd.php');
        $set = $this->butuh;
        if ($set == true) {
            $pdf->AddPage();
        }
        $pdf->SetFont($this->font, 'B', $this->field_font_size);
        $pdf->Ln(10);
        $pdf->Cell(25, 20, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(20, 19, 'Nomor', 'TLR', 0, 'C');
        $pdf->Cell(40, 17, 'NIK', 'TLR', 0, 'C');
        $pdf->Cell(25, 20, 'L/P', 1, 0, 'C');
        $pdf->Cell(70, 20, 'Alamat', 1, 0, 'C');
        $pdf->Cell(45, 20, 'Jenis Dokumen', 1, 0, 'C');
        $pdf->Cell(45, 20, 'Kronologi', 1, 0, 'C');
        $pdf->Cell(30, 20, 'Penggunaan', 1, 0, 'C');
        $pdf->Cell(30, 20, 'Penandatangan', 1, 0, 'C');
        $pdf->Cell(30, 20, 'Operator', 1, 0, 'C');
        $pdf->Cell(30, 20, 'Keterangan', 1, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(25);
        $pdf->Cell(20, 10, 'Register', 'BLR', 0, 'C');
        $pdf->Cell(40, 10, 'Nama Pemohon', 'BLR', 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont($this->font, '', 10);
        $pdf->Cell(25, 5, '(1)', 1, 0, 'C');
        $pdf->Cell(20, 5, '(2)', 1, 0, 'C');
        $pdf->Cell(40, 5, '(3)', 1, 0, 'C');
        $pdf->Cell(25, 5, '(4)', 1, 0, 'C');
        $pdf->Cell(70, 5, '(5)', 1, 0, 'C');
        $pdf->Cell(45, 5, '(6)', 1, 0, 'C');
        $pdf->Cell(45, 5, '(7)', 1, 0, 'C');
        $pdf->Cell(30, 5, '(8)', 1, 0, 'C');
        $pdf->Cell(30, 5, '(9)', 1, 0, 'C');
        $pdf->Cell(30, 5, '(10)', 1, 0, 'C');
        $pdf->Cell(30, 5, '(11)', 1, 0, 'C');
        $pdf->Ln(5);

    }

    function repeatColumn($pdf, $orientasi = '', $column = '', $height = 29.7)
    {

        $height_of_cell = $height; // mm
        if ($orientasi == 'P') {
            $page_height = $this->kertas_pjg; // orientasi kertas Potrait
        } else if ($orientasi == 'K') {
            $page_height = $this->kertas_pjg1; // orientasi kertas Portait
        } else if ($orientasi == 'L') {
            $page_height = $this->kertas_lbr; // orientasi kertas Landscape
        }
        $space_bottom = $page_height - $pdf->GetY(); // space bottom on page
        if ($height_of_cell > $space_bottom) {
            $this->$column($pdf);
        }

        $this->line = $space_bottom;

//        echo $space_bottom . ' + ';
    }

    public function Nilai()
    {
//        array(215, 330)

        $pdf = new PdfClass('p', 'mm', 'A4');
        $pdf->is_header = false;
        $pdf->set_widths = 80;
        $pdf->set_footer = 29;
        $pdf->orientasi = 'p';
        $pdf->AddFont('Arial', '', 'arial.php');

        //Disable automatic page break
        $pdf->SetAutoPageBreak(false);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(0, 20);
        $pdf->SetTitle('Surat pendaftaran');
        $this->Column($pdf);

        $pdf->SetY(51);
        $nilai = $this->nilai->getByPagecetak();
        $pdf->SetAligns(['C', 'C', 'C', 'C', 'JC', 'C', 'C', 'C', 'C', 'C']);
        $pdf->SetWidths([25, 20, 40, 25, 70, 45, 45, 30, 30, 30, 30]);

        if ($nilai == null) {

        } else {
            foreach ($nilai as $row) {

            }
        }
//==============================================================================================================================================================================

        // Biodata
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(185, 46, '', 1, '', 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 0, 'BIODATA SISWA', 0, '', 'L');
        // nama
        $pdf->Ln(0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('1.   Nama                                             '), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->formulirs->biodatas->nama_lengkap);

        $kurangnama = 26;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper($pendaftaran->formulirs->biodatas->nama_lengkap), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }


        if ($pendaftaran->formulirs->biodatas->jk == 'Laki-laki') {
            $jeniskelamin = '1';
        }
        if ($pendaftaran->formulirs->biodatas->jk == 'Perempuan') {
            $jeniskelamin = '2';
        }
        $pdf->Ln(6);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 0, strtoupper('2.   Jenis Kelamin                            '), 0, '', 'L');
        $pdf->Ln(-2);
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);
        $pdf->Cell(5, 4, $jeniskelamin, 1, '', 'L');
        $pdf->SetX(60);
        $pdf->Cell(5, 5, strtoupper('1. Laki-Laki'), 0, '', 'L');
        $pdf->SetX(85);
        $pdf->Cell(5, 5, strtoupper('2. Perempuan'), 0, '', 'L');
        // tempat lahir bayi
        if ($pendaftaran->formulirs->biodatas->agama == 'Islam') {
            $agama = '1';
        }
        if ($pendaftaran->formulirs->biodatas->agama == 'Kristen') {
            $agama = '2';
        }
        if ($pendaftaran->formulirs->biodatas->agama == 'Katholik') {
            $agama = '3';
        }
        if ($pendaftaran->formulirs->biodatas->agama == 'Hindu') {
            $agama = '4';
        }
        if ($pendaftaran->formulirs->biodatas->agama == 'Budha') {
            $agama = '5';
        }
        if ($pendaftaran->formulirs->biodatas->agama == 'Khonghucu') {
            $agama = '6';
        }
        $pdf->Ln(6);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 0, strtoupper('3.   Agama                  '), 0, '', 'L');
        $pdf->Ln(-2);
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);
        $pdf->Cell(5, 4, $agama, 1, '', 'L');
        $pdf->SetX(60);
        $pdf->Cell(4, 4, strtoupper('1. Islam'), 0, '', 'L');
        $pdf->SetX(80);
        $pdf->Cell(4, 4, strtoupper('2. Kristen'), 0, '', 'L');
        $pdf->SetX(105);
        $pdf->Cell(4, 4, strtoupper('3. Katholik'), 0, '', 'L');
        $pdf->SetX(125);
        $pdf->Cell(4, 4, strtoupper('4. Hindu'), 0, '', 'L');
        $pdf->SetX(150);
        $pdf->Cell(4, 4, strtoupper('5. Budha'), 0, '', 'L');
        $pdf->SetX(170);
        $pdf->Cell(4, 4, strtoupper('6. Khonghucu'), 0, '', 'L');
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(34, 4, strtoupper('4.   Tempat Lahir                   '), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatatempatlahir = strlen($pendaftaran->formulirs->biodatas->tempat_lahir);

        $kurangtempatlahir = 15;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangtempatlahir; $i++) {
            $hasil1 = substr($pendaftaran->formulirs->biodatas->tempat_lahir, $i, $totalkatatempatlahir);
            $tampil1 = substr($hasil1, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array(strtoupper($tampil1));
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        //hari dan tanngal lahir
        $datetime = \DateTime::createFromFormat('d/m/Y', $pendaftaran->formulirs->biodatas->tanggal_lahir);
        $dayForDate = $datetime->format('D');
        if ($dayForDate == 'Sun') {
            $hariindo = strtoupper('Minggu');
        }
        if ($dayForDate == 'Mon') {
            $hariindo = strtoupper('Senin');
        }
        if ($dayForDate == 'Tue') {
            $hariindo = strtoupper('Selasa');
        }
        if ($dayForDate == 'Wed') {
            $hariindo = strtoupper('Rabu');
        }
        if ($dayForDate == 'Thu') {
            $hariindo = strtoupper('Kamis');
        }
        if ($dayForDate == 'Fri') {
            $hariindo = strtoupper('Jum`at');
        }
        if ($dayForDate == 'Sat') {
            $hariindo = strtoupper('Sabtu');
        }
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(34, 4, strtoupper('5.   Hari dan Tanggal lahir        '), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatahari = strlen($hariindo);

        $kuranghari = 5;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);
        $pdf->Cell(0, 5, 'HARI', 0, '', '');
        $pdf->SetX(63);
        for ($i = 0; $i <= $kuranghari; $i++) {
            $hasil2 = substr($hariindo, $i, $totalkatahari);
            $tampil2 = substr($hasil2, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array(strtoupper($tampil2));
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->SetX(95);
        $pdf->Cell(0, 5, 'TGL', 0, '', '');
        $pdf->SetX(103);
        $tgl1 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 0, 1);
        $tgl2 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 1, 1);
        $pdf->Cell(4, 4, $tgl1, 1, '', 'L');
        $pdf->Cell(4, 4, $tgl2, 1, '', 'L');
        $pdf->SetX(115);
        $pdf->Cell(0, 5, 'BLN', 0, '', '');
        $pdf->SetX(123);
        $bln1 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 3, 1);
        $bln2 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 4, 1);
        $pdf->Cell(4, 4, $bln1, 1, '', 'L');
        $pdf->Cell(4, 4, $bln2, 1, '', 'L');
        $pdf->SetX(135);
        $pdf->Cell(0, 5, 'THN', 0, '', '');
        $pdf->SetX(143);
        $thn1 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 6, 1);
        $thn2 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 7, 1);
        $thn3 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 8, 1);
        $thn4 = substr($pendaftaran->formulirs->biodatas->tanggal_lahir, 9, 1);
        $pdf->Cell(4, 4, $thn1, 1, '', 'L');
        $pdf->Cell(4, 4, $thn2, 1, '', 'L');
        $pdf->Cell(4, 4, $thn3, 1, '', 'L');
        $pdf->Cell(4, 4, $thn4, 1, '', 'L');


//        // ALamat Pendaftaran
//
        $pdf->Ln(7);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 0, '6.   ALAMAT             ', 0, '', 'L');
        $pdf->Ln(-3);
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);
        $pdf->Cell(135, 4, strtoupper($pendaftaran->formulirs->biodatas->alamat), 1, '', 'L');
        $pdf->Ln(6);
        $pdf->SetX(53);
        $pdf->SetFont('Arial', '', 6);
        $pdf->Cell(0, 0, 'A. DESA/KELURAHAN     :', 0, '', '');

        $pdf->Ln(-2);
        $pdf->SetX(80);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(40, 4, strtoupper($pendaftaran->formulirs->biodatas->desa), 1, '', '');
        $pdf->Ln(6);
        $pdf->SetX(53);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 3, 'B. KECAMATAN         :', 0, '', '');
        $pdf->Ln(-1);
        $pdf->SetX(80);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(40, 5, strtoupper($pendaftaran->formulirs->biodatas->kecamatan), 1, '', '');
        $pdf->SetX(120);
        $pdf->Cell(0, -5, 'C. KAB/KOTA               :', 0, '', '');
        $pdf->Ln(-5);
        $pdf->SetX(148);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(40, 4, strtoupper($pendaftaran->formulirs->biodatas->kabupaten), 1, '', '');
        $pdf->Ln(10);
        $pdf->SetX(120);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, -6, 'D. PROVINSI                :', 0, '', '');
        $pdf->Ln(-5);
        $pdf->SetX(148);
        $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(40, 4, strtoupper($pendaftaran->formulirs->biodatas->provinsi), 1, '', '');


        $pdf->Ln(6);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(34, 4, strtoupper('7.   EMAIL'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);

        $totalkatatempatlahir = strlen($pendaftaran->formulirs->biodatas->email);

        $kurangtempatlahir = 26;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangtempatlahir; $i++) {
            $hasil1 = substr($pendaftaran->formulirs->biodatas->email, $i, $totalkatatempatlahir);
            $tampil1 = substr($hasil1, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array(strtoupper($tampil1));
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(34, 4, strtoupper('8.   TELEPON'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);

        $totalkatatempatlahir = strlen($pendaftaran->formulirs->biodatas->telepon);

        $kurangtempatlahir = 26;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangtempatlahir; $i++) {
            $hasil1 = substr($pendaftaran->formulirs->biodatas->telepon, $i, $totalkatatempatlahir);
            $tampil1 = substr($hasil1, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array(strtoupper($tampil1));
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(185, 45, '', 1, '', 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 0, 'ASAL SEKOLAH', 0, '', 'L');
        // Asal
        $pdf->Ln(2);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('1.   ASAL SEKOLAH'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->formulirs->asal_sekolah);

        $kurangnama = 26;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper($pendaftaran->formulirs->asal_sekolah), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        // Asal
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('2.   NUN B.INDONESIA'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->formulirs->n_bi);

        $kurangnama = 4;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper($pendaftaran->formulirs->n_bi), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('3.   NUN MATEMATIKA'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->formulirs->n_mtk);

        $kurangnama = 4;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper($pendaftaran->formulirs->n_mtk), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('4.   NUN IPA'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->formulirs->n_ipa);

        $kurangnama = 4;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper($pendaftaran->formulirs->n_ipa), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('4.   NUN Bahasa Inggris'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->formulirs->n_ing);

        $kurangnama = 4;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper($pendaftaran->formulirs->n_ing), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(185, 16, '', 1, '', 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 0, 'SEKOLAH & JURUSAN YANG DI PILIH', 0, '', 'L');
        // Sekolah pilihan
        $pdf->Ln(2);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('1.   SEKOLAH PILIHAN'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen('SMK Negeri 1 Kepanjen');

        $kurangnama = 26;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        for ($i = 0; $i <= $kurangnama; $i++) {
            $hasil = substr(strtoupper('SMK Negeri 1 Kepanjen'), $i, $totalkatanama);
            $tampil = substr($hasil, 0, 1);
            $widd = 5;
            $pdf->SetFont('Arial', '', 7);
            $widths = array($widd);
            $caption = array($tampil);
            $pdf->SetWidths($widths);
            $pdf->FancyRow2($caption);

        }
        // Sekolah pilihan
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(35, 5, strtoupper('2.   JURUSAN PILIHAN'), 0, '', 'L');
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 7);
        $totalkatanama = strlen($pendaftaran->jurusans->nama);

        $kurangnama = 26;
        $pdf->SetX(50);
        $pdf->Cell(5, 4, ':', 0, '', 'L');
        $pdf->SetX(53);

        $pdf->Cell(135, 5, strtoupper($pendaftaran->jurusans->nama), 1, '', 'L');



////        =====================================================================================================================================================================================?
//        if ($kodeadministrasikearsipan == null) {
//            $indo = array("", "I", "II", "III", "IV", "V", "VI", "VI", "VII", "IX", "X", "XI", "XII");
//            if (substr($pendaftaran->tanggal, 3, 2) <= 9) {
//                $kodeadministrasikearsipanhasil = $indo[substr($pendaftaran->tanggal, 4, 1)];
//            } else {
//                $kodeadministrasikearsipanhasil = $indo[substr($pendaftaran->tanggal, 3, 2)];
//            }
//
//        } else {
//            $kodeadministrasikearsipanhasil = $kodeadministrasikearsipan->kode;
//        }
//        //mengetahui kepala desa/kelurahan
//
//        $pdf->Cell(85, 0, 'Mengetahui,', 0, 0, 'C');
//        $pdf->Ln(3);
//        $pdf->Cell(85, 0, ' Nomor: ' . $jeniskodeadministrasi . '/' . $pendaftaran->no_reg . '/' . $kodeadministrasikearsipanhasil . '/' . $pendaftaran->tahun, 0, '', 'C');
//
//        $pdf->Ln(-2);
//        if ($pendaftaran->penandatangan == 'Atasnama Pimpinan' || $pendaftaran->penandatangan == 'Jabatan Struktural') {
//            $pejabatpimpinan = $this->pejabat->cekjabatan('Pimpinan Organisasi');
//            $an = 'an.';
//            $pdf->SetFont('Arial', 'B', 8);
//            if ($pejabatpimpinan != null) {
//                $pdf->Cell(85, 10, $an . ' ' . strtoupper($pejabatpimpinan->jabatan) . ' ' . strtoupper($desa->desa) . ',', 0, '', 'C');
//
//            } else {
//                $pdf->Cell(85, 10, $an . ' ' . strtoupper($desa->desa), 0, '', 'C');
//
//            }
//            $pdf->Ln(3);
//            $pdf->SetFont('Arial', '', 8);
//            if ($pejabat != null) {
//                $idpejabat = 'Sekretaris Organisasi';
//                $pejabatsekre = $this->pejabat->cekjabatan($idpejabat);
//                $pdf->Cell(85, 10, $pejabatsekre->jabatan . ',', 0, '', 'C');
//            }
//
//        }
//        if ($pendaftaran->penandatangan == 'Jabatan Struktural') {
//
//            $pejabatstruktural = $this->pejabat->find($pendaftaran->jabatan_lainnya);
//            $pdf->Ln(3);
//            $pdf->Cell(85, 10, 'u.b.', 0, '', 'C');
//            $pdf->Ln(3);
//            if ($pejabatstruktural != null) {
//                $pdf->Cell(85, 10, $pejabat->jabatan . ',', 0, '', 'C');
//            }
//        }
//        if ($pendaftaran->penandatangan != 'Atasnama Pimpinan' && $pendaftaran->penandatangan != 'Jabatan Struktural') {
//            $pdf->SetFont('Arial', 'B', 8);
//            if ($pendaftaran->penandatangan == 'Sekretaris Organisasi') {
//                $pejabatsekretaris = $this->pejabat->cekjabatan($pendaftaran->penandatangan);
//                if ($pejabatsekretaris != null) {
//                    $pdf->Cell(85, 10, strtoupper($pejabatsekretaris->jabatan . ','), 0, '', 'C');
//                }
//            }
//            if ($pendaftaran->penandatangan == 'Pimpinan Organisasi' && $pendaftaran->penandatangan != 'Sekretaris Organisasi') {
//                $pejabatsekretaris = $this->pejabat->cekjabatan($pendaftaran->penandatangan);
//                if ($pejabatsekretaris != null) {
//                    $pdf->Cell(85, 10, strtoupper($pejabatsekretaris->jabatan . ' ' . $desa->desa . ','), 0, '', 'C');
//                }
//            }
//
//        }
//        if ($pendaftaran->penandatangan != 'Jabatan Struktural') {
//            $pdf->Ln(20);
//        }
//        if ($pendaftaran->penandatangan == 'Jabatan Struktural') {
//            $pdf->Ln(17);
//        }
//
//        if ($pejabat != null) {
//            if ($pejabat->titel_belakang != '') {
//                $pdf->SetFont('Arial', 'BU', 8);
//                if ($pejabat->titel_depan != '') {
//                    $pdf->Cell(85, 10, $pejabat->titel_depan . ' ' . $pejabat->nama . ', ' . $pejabat->titel_belakang, 0, '', 'C');
//                } else {
//                    $pdf->Cell(85, 10, $pejabat->nama . ', ' . $pejabat->titel_belakang, 0, '', 'C');
//                }
//            } else {
//                if ($pejabat->titel_depan != '') {
//                    $pdf->Cell(85, 10, $pejabat->titel_depan . ' ' . $pejabat->nama . ' ' . $pejabat->titel_belakang, 0, '', 'C');
//                } else {
//                    $pdf->Cell(85, 10, $pejabat->nama . ' ' . $pejabat->titel_belakang, 0, '', 'C');
//                }
//            }
//            $pdf->SetFont('Arial', '', 8);
//            $pdf->Ln(3);
//            $pdf->Cell(85, 10, $pejabat->pangkat, 0, '', 'C');
//            $pdf->Ln(3);
//
//            if ($pejabat->nip != '') {
//                $pdf->Cell(85, 10, 'NIP.' . $pejabat->nip, 0, '', 'C');
//            }
//        }
//        if ($pendaftaran->penandatangan == 'Jabatan Struktural') {
//            $pdf->Ln(-43);
//        }
//        if ($pendaftaran->penandatangan == 'Pimpinan Organisasi') {
//            $pdf->Ln(-37);
//        }
//        if ($pendaftaran->penandatangan == 'Sekretaris Organisasi') {
//            $pdf->Ln(-37);
//        }
//        if ($pendaftaran->penandatangan == 'Atasnama Pimpinan') {
//            $pdf->Ln(-40);
//        }
//        // pelapor pendaftaran
//        $hari = substr($pendaftaran->tanggal, 0, 2);
//        $indo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
//        if (substr($pendaftaran->tanggal, 3, 2) <= 9) {
//            $bulan = $indo[substr($pendaftaran->tanggal, 4, 1)];
//        } else {
//            $bulan = $indo[substr($pendaftaran->tanggal, 3, 2)];
//        }
//        $tahun = substr($pendaftaran->tanggal, 6, 4);
//
//        $tanggalcetak = $hari . ' ' . $bulan . ' ' . $tahun;
//        $pdf->Ln(20);
//        $pdf->SetFont('Arial', '', 8);
//        $pdf->Ln(-45);
//        $pdf->SetX(150);
//        $pdf->Cell(10, 70, $desa->desa . ', ' . $tanggalcetak, 0, '', 'C');
//        $pdf->Ln(4);
//        $pdf->SetX(150);
//        $pdf->SetFont('Arial', 'B', 8);
//        $pdf->Cell(10, 70, 'PELAPOR,', 0, '', 'C');
//
//        if ($pendaftaran->penandatangan == 'Jabatan Struktural') {
//            $pdf->Ln(28);
//            $pdf->SetX(150);
//        }
//        if ($pendaftaran->penandatangan == 'Pimpinan Organisasi') {
//            $pdf->Ln(20);
//            $pdf->SetX(150);
//        }
//        if ($pendaftaran->penandatangan == 'Sekretaris Organisasi') {
//            $pdf->Ln(20);
//            $pdf->SetX(150);
//        }
//        if ($pendaftaran->penandatangan == 'Atasnama Pimpinan') {
//            $pdf->Ln(25);
//            $pdf->SetX(150);
//        }
//        $pdf->SetFont('Arial', 'BU', 8);
//        $pdf->Cell(10, 70, '' . $namapelaporpenduduk . '', 0, '', 'C');
        $tanggal = date('d/m/y');
//        $organisasi = $this->organisasi->find(session('organisasi'));
//
//        if ($organisasi->is_lock == 0) {
//            $this->Headers($pdf);
//        }

        $pdf->Output('cetak-data-pendaftaran-' . $tanggal . '.pdf', 'I');
        exit;
    }
}
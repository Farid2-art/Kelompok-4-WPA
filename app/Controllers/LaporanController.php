<?php

namespace App\Controllers;
use App\Models\LaporanModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    public function index()
    {
        $model = new LaporanModel();
        $tanggal = $this->request->getGet('tanggal');
        $id_transaksi = $this->request->getGet('id_transaksi');
        
        $data['penjualan'] = $model->getPenjualan($tanggal, $id_transaksi);
        $data['tanggal'] = $tanggal;
        $data['id_transaksi'] = $id_transaksi;
        return view('admin/laporan', $data);
    }

    public function exportExcel()
    {
        $model = new LaporanModel();
        $tanggal = $this->request->getGet('tanggal');
        $id_transaksi = $this->request->getGet('id_transaksi');
        $penjualan = $model->getPenjualan($tanggal, $id_transaksi);
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID Transaksi');
        $sheet->setCellValue('B1', 'Produk');
        $sheet->setCellValue('C1', 'Jumlah');
        $sheet->setCellValue('D1', 'Total Harga');
        $sheet->setCellValue('E1', 'Tanggal');
        
        $row = 2;
        foreach ($penjualan as $p) {
            $sheet->setCellValue('A' . $row, $p['id_transaksi']);
            $sheet->setCellValue('B' . $row, $p['produk']);
            $sheet->setCellValue('C' . $row, $p['jumlah']);
            $sheet->setCellValue('D' . $row, $p['total_harga']);
            $sheet->setCellValue('E' . $row, $p['tanggal']);
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan_Penjualan.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function exportPDF()
    {
        $model = new LaporanModel();
        $tanggal = $this->request->getGet('tanggal');
        $id_transaksi = $this->request->getGet('id_transaksi');
        
        // Jika tidak ada ID transaksi, ambil semua data
        if (empty($id_transaksi)) {
            $data['penjualan'] = $model->getPenjualan($tanggal, null);
        } else {
            $data['penjualan'] = $model->getPenjualan($tanggal, $id_transaksi);
        }
        
        $html = view('admin/laporan_pdf', $data);
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan_Penjualan.pdf', ['Attachment' => true]);
        exit;
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use  App\Models\OrderModel;
use PDF;



class PDFController extends Controller
{
    public function generatePDF($id)
    {

        $data = [
            'title' => "Видаткова накладна №{$id}",
            'date' => date('m/d/Y: H:i:s'),
        ];
        $data['getRecord'] = OrderModel::getSingle($id);

        $pdf = PDF::loadView('admin.pdf.document', $data)
        ->setPaper('a5', 'landscape');
        return $pdf->download('Замовлення.pdf');
    }
}

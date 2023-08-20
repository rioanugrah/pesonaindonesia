<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Perusahaan;
use PDF;
use Mail;

class InvoiceController extends Controller
{
    public function tiket_wisata($id)
    {
        $data['paket'] = PaketOrder::find($id);
        $data['perusahaan'] = Perusahaan::first();
        // $data['perusahaan'] = Perusahaan::first();
        $data['paketLists'] = PaketOrderList::where('order_paket_id',$id)->get();
        return view('invoice.tiket',$data);
    }

    public function invoice_send($kode_order)
    {
        $data['order'] = Order::where('kode_order',$kode_order)->first();
        
        $pdf = PDF::loadView('emails.InvoiceTravellingNew',$data);
        $pdf->setPaper('A4', 'portrait');

        $data['pemesan'] = json_decode($data['order']['pemesan']);
        
        $send_invoice = Mail::send('emails.messageInvoiceTravellingNew',$data, function($message) use ($data,$pdf){
            $message->to($data['pemesan']->email,$data['pemesan']->email)
                    ->cc('marketing@plesiranindonesia.com')
                    ->subject('Invoice #'.$data['order']['kode_order'])
                    ->attachData($pdf->output(),'Invoice #'.$data['order']['kode_order'].'.pdf');
        });

        return response()->json([
            'success' => true,
            'message_title' => 'Invoice berhasil terkirim ke email tujuan'
        ]);

        // dd($data);

        // if ($send_invoice) {
        //     return response()->json([
        //         'success' => true,
        //         'message_title' => 'Invoice berhasil terkirim ke email tujuan'
        //     ]);
        // }
        // return response()->json([
        //     'success' => false,
        //     'message_title' => 'Invoice tidak berhasil terkirim ke email tujuan'
        // ]);
    }

    public function invoice_order($kode_order)
    {
        $data['order'] = Order::where('kode_order',$kode_order)->first();
        if(empty($data['order'])){
            return redirect()->back();
        }

        // $data['order_details'] = OrderList::where('order_id',$data['order']['id'])->get();
        // $data['details'] = [
        //     'nama' => 'Rio'
        // ];
        // $pdf = PDF::loadView('emails.InvoiceTravellingNew',$data);
        // $pdf->setPaper('A4', 'portrait');
        // return $pdf->stream();

        // $data['pemesan'] = json_decode($data['order']['pemesan']);

        // Mail::send('emails.messageInvoiceTravellingNew',$data, function($message) use ($data,$pdf){
        //     $message->to($data['pemesan']->email,$data['pemesan']->email)
        //             ->subject('Invoice #'.$data['order']['kode_order'])
        //             ->attachData($pdf->output(),'Invoice #'.$data['order']['kode_order'].'.pdf');
        // });
        return view('frontend.frontend5.invoice.index',$data);
        // return view('invoice.travelling_new',$data);
        // return view('invoice.order',$data);
    }
}

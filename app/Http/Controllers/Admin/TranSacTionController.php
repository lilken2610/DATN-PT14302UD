<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TranSacTionController extends Controller
{
    public function __construct(Transaction $transaction, TransactionDetail $transactionDetail)
    {
        $this->Transaction = $transaction;
        $this->TransactionDetail = $transactionDetail;
    }

    public function index()
    {
        $object = $this->Transaction->getTransaction();
        return view('admin.transaction.index', compact('object'));
    }
    public function viewTransaction()
    {
        if (Request()->ajax()) {
            $id = Request()->get('id');
            $object = $this->TransactionDetail->getTransactionDt($id);
            $html = view('admin.transaction.form', compact('object'));
            return $html;
        }
    }
    public function bill($id)
    {
        $object = $this->Transaction->getBill($id)->first();
        $nameFile = 'don-hang-' . $object->id_transaction . '-' . $object->fullname . '.pdf';
        $pdf = PDF::loadview('admin.transaction.bill', compact('object'));
        return $pdf->download($nameFile);
    }
    public function del($id)
    {
        $result = $this->Transaction->del($id);
        if ($result == 1) {
            return redirect()->route('shoes.transaction.index')->with('msg', 'Xóa thành công !');
        } else {
            return redirect()->route('shoes.transaction.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    public function checkApprovedBill()
    {
        if (Request()->ajax()) {
            $id = Request()->get('id');
            $object = $this->Transaction->getId($id);
            if ($object->status == -1 && $object->id_pay == 2) {
                return $object->id_pay;
            } else {
                return $object->id_pay;
            }
        }
    }
    public function approvedBill($id)
    {
        $object = $this->Transaction->getId($id);
        if ($object->status == -1) {
            $objectQtySize = $this->Transaction->updateQtyTransaction($id);
            if ($objectQtySize == 1) {
                $object = $this->Transaction->getBill($id)->first();
                $to_name = 'binh';
                $to_mail = $object->email;
                Mail::send('admin.transaction.mail', ['object' => $object], function ($message) use ($to_name, $to_mail) {
                    $message->to($to_mail)->subject('Xác nhận đăng ký');
                });
                $this->Transaction->updateButton($id);
                return redirect()->route('shoes.transaction.index')->with('msg', 'Đã duyệt, đơn hàng đã được gởi email của người dùng');
            } else {
                return redirect()->route('shoes.transaction.index')->with('error', 'Có lỗi xảy ra');
            }
        } else {
            return redirect()->route('shoes.transaction.index');
        }
    }
    public function checksuccessOrder()
    {
        if (Request()->ajax()) {
            $id = Request()->get('id');
            $transaction = Transaction::where('id_transaction', $id)->get()->first();
            if ($transaction->status == -1) {
                $transaction->status = 1;
                $transaction->save();
                return back();
            }
        }
    }
}

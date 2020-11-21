<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->Contact = $contact;
    }

    public function index() {
        $object = $this->Contact->getContact();
        return view('admin.contact.index',compact('object'));
    }
    public function del($id) {
        $result = $this->Contact->del($id);
        if ( $result== 1 ) {
            return redirect()->route('shoes.contact.index')->with('msg', 'Xóa thành công !');
        }else {
            return redirect()->route('shoes.contact.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    public function confilm($id,Request $request) {
        $object = $this->Contact->getId($id);
        $to_name = $object->fullname;
        $to_mail = $object->email;
        $content = [
          'title' => $object->title,
          'content' => $request->content
        ];
        Mail::send('admin.transaction.confilm', ['object'=>$content], function($message) use ($to_name,$to_mail){
            $message->to( $to_mail )->subject('Phản hồi của bạn về Epic Sneaker');
        });
        return redirect()->back()->with('msg','Phản hồi của bạn đã được gởi đến '.$object->fullname);
    }
}

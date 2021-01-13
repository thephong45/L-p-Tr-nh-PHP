<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //form là từ email nào, tên gì, subject là tiêu đề thư, with là nội dung thư (dạng mảng)
        return $this->view('mails.demo')
            ->from('trungph96act@gmail.com','Phan Hoàng Trung')
            ->subject('[unitop] Thư xác nhập đăng kí')
            ->with($this->data);

    }
}

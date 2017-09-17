<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/17/2017
 * Time: 1:57 PM
 */

namespace App\Libraries;


use Illuminate\Http\File;

class MailObject
{
    private $subject;
    private $from;
    private $to;
    private $cc = [];
    private $bcc = [];
    private $data;
    private $view;
    private $attachments = [];

    /**
     * MailObject constructor.
     */
    public function __construct()
    {
        $this->from = config('mail.sender');
    }


    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }



    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from)
    {
        $this->from = $from;
    }

    /**
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string|array $to
     */
    public function setTo($to)
    {
        $this->to = is_array($to) ? $to : [$to];
    }

    /**
     * @return array
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param string|array $cc
     */
    public function setCc($cc)
    {
        $this->cc = is_array($cc) ? $cc : [$cc];
    }

    /**
     * @return array
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param string|array $bcc
     */
    public function setBcc($bcc)
    {
        $this->bcc = is_array($bcc) ? $bcc : [$bcc];
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param string $view
     */
    public function setView(string $view)
    {
        $this->view = $view;
    }

    /**
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param File $attachments
     */
    public function addAttachments(File $attachment)
    {
        $this->attachments[] = $attachment;
    }

    public function validate(){
        if(is_null($this->to)){
            throw new \Exception("Mail to can not be null");
        }
        if(is_null($this->view)){
            throw new \Exception("Mail view can not be null");
        }
    }
}
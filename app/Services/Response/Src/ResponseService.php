<?php
/**
 * Created by PhpStorm.
 * User: phuctran
 * Date: 20/01/2017
 * Time: 13:15
 */

namespace App\Services\Response\Src;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ResponseService
{
    protected function getClassStatusCode($code)
    {
        $classCode = (int)($code / 100);
        $classArray = [
            'informational',
            'success',
            'redirection',
            'client_error',
            'server_error'
        ];
        return $classArray[$classCode-1];
    }

    public function send($result = null, $statusCode = Response::HTTP_OK)
    {
        $type = $this->getClassStatusCode($statusCode);
        $textResult = ($type == 'success') ? 'results':'errors';
        $dataReturn = [
            '_type' => $type,
            '_time' => date('m/d/Y H:i:s')
        ];
        if (is_string($result)) {
            $dataReturn['message'] = $result;
        }
        if (!is_string($result) && $result != null) {
            $dataReturn[$textResult] = $result;
        }
        return response()->json($dataReturn, $statusCode);
    }

    public function download(string $path){
        return response()->download(Storage::get($path))->deleteFileAfterSend(true);
    }

    public function displayFromS3($pathOnS3){
        $url = \S3::getPreSignedUrl($pathOnS3);
        header('Content-type: ' . $this->mimeType($pathOnS3));
        readfile($url);
    }

    private function mimeType($path) {
        preg_match("|\.([a-z0-9]{2,4})$|i", $path, $fileSuffix);

        switch(strtolower($fileSuffix[1])) {
            case 'js' :
                return 'application/x-javascript';
            case 'json' :
                return 'application/json';
            case 'jpg' :
            case 'jpeg' :
            case 'jpe' :
                return 'image/jpg';
            case 'png' :
            case 'gif' :
            case 'bmp' :
            case 'tiff' :
                return 'image/'.strtolower($fileSuffix[1]);
            case 'css' :
                return 'text/css';
            case 'xml' :
                return 'application/xml';
            case 'doc' :
            case 'docx' :
                return 'application/msword';
            case 'xls' :
            case 'xlt' :
            case 'xlm' :
            case 'xld' :
            case 'xla' :
            case 'xlc' :
            case 'xlw' :
            case 'xll' :
                return 'application/vnd.ms-excel';
            case 'ppt' :
            case 'pps' :
                return 'application/vnd.ms-powerpoint';
            case 'rtf' :
                return 'application/rtf';
            case 'pdf' :
                return 'application/pdf';
            case 'html' :
            case 'htm' :
            case 'php' :
                return 'text/html';
            case 'txt' :
                return 'text/plain';
            case 'mpeg' :
            case 'mpg' :
            case 'mpe' :
                return 'video/mpeg';
            case 'mp3' :
                return 'audio/mpeg3';
            case 'wav' :
                return 'audio/wav';
            case 'aiff' :
            case 'aif' :
                return 'audio/aiff';
            case 'avi' :
                return 'video/msvideo';
            case 'wmv' :
                return 'video/x-ms-wmv';
            case 'mov' :
                return 'video/quicktime';
            case 'zip' :
                return 'application/zip';
            case 'tar' :
                return 'application/x-tar';
            case 'swf' :
                return 'application/x-shockwave-flash';
            default :
                if(function_exists('mime_content_type')) {
                    $fileSuffix = mime_content_type($path);
                }
                return 'unknown/' . trim($fileSuffix[0], '.');
        }
    }
}
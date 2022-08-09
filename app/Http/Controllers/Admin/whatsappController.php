<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class whatsappController extends Controller
{
    public function index()
    {
        $qr='';
        try {
            $reqParams = [
              'token' => 'sHU5TstfmEJ1Iah0FMEEwb0KBWXzGrVut53p2cW54/w8eYD1hADu5qi+xpYAj9gO-dian',
              'url' => "https://api.kirimwa.id/v1/devices/xiaomi-redmi-nizam"
            ];
          
            $response = $this->apiKirimWaRequest($reqParams);
            $res = json_decode($response['body']);
          } catch (Exception $e) {
            print_r($e);
          }
          if($res->status == "disconnected"){
            try {
                $reqParams = [
                    'token' => 'sHU5TstfmEJ1Iah0FMEEwb0KBWXzGrVut53p2cW54/w8eYD1hADu5qi+xpYAj9gO-dian',
                    'url' => 'https://api.kirimwa.id/v1/qr?device_id=xiaomi-redmi-nizam'
                ];
              
                $response = $this->apiKirimWaRequest($reqParams);
                $qr = json_decode($response['body']);
              } catch (Exception $e) {
                print_r($e);
              }
          }


        return view('admin.pengaturan_whatsapp',compact('res','qr'));
    }


    function apiKirimWaRequest(array $params) {
        $httpStreamOptions = [
          'method' => $params['method'] ?? 'GET',
          'header' => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . ($params['token'] ?? '')
          ],
          'timeout' => 15,
          'ignore_errors' => true
        ];
      
        if ($httpStreamOptions['method'] === 'POST') {
          $httpStreamOptions['header'][] = sprintf('Content-Length: %d', strlen($params['payload'] ?? ''));
          $httpStreamOptions['content'] = $params['payload'];
        }
      
        // Join the headers using CRLF
        $httpStreamOptions['header'] = implode("\r\n", $httpStreamOptions['header']) . "\r\n";
      
        $stream = stream_context_create(['http' => $httpStreamOptions]);
        $response = file_get_contents($params['url'], false, $stream);
      
        // Headers response are created magically and injected into
        // variable named $http_response_header
        $httpStatus = $http_response_header[0];
      
        preg_match('#HTTP/[\d\.]+\s(\d{3})#i', $httpStatus, $matches);
      
        if (! isset($matches[1])) {
          throw new Exception('Can not fetch HTTP response header.');
        }
      
        $statusCode = (int)$matches[1];
        if ($statusCode >= 200 && $statusCode < 300) {
          return ['body' => $response, 'statusCode' => $statusCode, 'headers' => $http_response_header];
        }
      
        throw new Exception($response, $statusCode);
      }
}

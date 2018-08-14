<?php 
namespace App\Libraries;

class LinkShortener {
  static function linkShortener($target)
  {
    $headers = [
      'Content-Type: application/json',
      'X-API-Key: M2GtmlZ06KMbs807v6A~kwETmsH47Yoc8BXsKxUw',
    ];

    $url = 'https://kutt.it/api/url/submit';
    $data = array('target' => $target);                                                                
    $targets = json_encode($data);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $targets); 
    curl_setopt($ch, CURLOPT_FAILONERROR, true);

    $response = curl_exec($ch);
    $response = json_decode($response, true);
    
    if (curl_error($ch)) {
      $error_msg = curl_error($ch);
    }
    else {
      $shortLink = $response['shortUrl'];
      return $shortLink;
    }
    curl_close($ch);
    
  }
}


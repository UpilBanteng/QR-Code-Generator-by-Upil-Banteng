<?php
/**
 * Package  QR Code Generator by Upil Banteng.
 * Version  v1.0
 * Author   Upil Banteng (Afid Arifin)
 * Web      https://github.com/UpilBanteng
 */
class UpilBanteng {
  
  // Required property
  private $server;  // The QR Code server you need or the one you prefer.
  private $width;   // The QR Code width length.
  private $height;  // The QR Code height length.
  private $content; // The QR Code content inside.

  // Setup QR Code
  public function setup($server = 1, $width = 350, $height = 350, $content = '') {
    $this->server   = $server;
    $this->width    = $width;
    $this->height   = $height;
    $this->content  = $content;

    // If server is not valid.
    if(!is_int($this->server)) {
      echo '<b>Error</b>: Oops! Your server is not integer value.';
      exit();
    }

    // If width is not valid.
    if(!is_int($this->width)) {
      echo '<b>Error</b>: Oops! Your width is not integer value.';
      exit();
    }

    // If height is not valid.
    if(!is_int($this->height)) {
      echo '<b>Error</b>: Oops! Your height is not integer value.';
      exit();
    }

    // If content is not string.
    if(!is_string($this->content)) {
      echo '<b>Error</b>: Oops! Your content is not integer value.';
      exit();
    }

    // Check the length of content.
    if(strlen($this->content) >= 512) {
      echo '<b>Error</b>: Oops! Maximum of content length is 512 chars.';
      exit();
    }
  }

  public function display() {

    // Check directory.
    if(!is_dir('images')) {
      @mkdir('images');
    }

    if($this->server == 1) {

      /**
       * Server 1 using Google Api Chart.
       */
      $image = 'images/server-1_'.rand().'.png';
      $api = @file_get_contents('https://chart.googleapis.com/chart?cht=qr&chs='.$this->width.'x'.$this->height.'&chl='.trim(urlencode($this->content)).'&choe=UTF-8&chld=L|0');
      if($api) {
        @file_put_contents($image, $api);
      } else {
        echo '<b>Error</b>: Oops! Something went wrong.';
        exit();
      }

    } else if($this->server == 2) {

      /**
       * Server 2 using QR Server.
       */
      $image = 'images/server-2_'.rand().'.png';
      $api = @file_get_contents('https://api.qrserver.com/v1/create-qr-code/?size='.$this->width.'x'.$this->height.'&data='.trim(urlencode($this->content)).'');
      if($api) {
        @file_put_contents($image, $api);
      } else {
        echo '<b>Error</b>: Oops! Something went wrong.';
        exit();
      }

    } else if($this->server == 3) {

      /**
       * Server 3 using QR Ickit.
       */
      $image = 'images/server-3_'.rand().'.png';
      $api = @file_get_contents('https://qrickit.com/api/qr.php?d='.trim(urlencode($this->content)).'&addtext=Upil+Banteng&qrsize='.$this->width.'');
      if($api) {
        @file_put_contents($image, $api);
      } else {
        echo '<b>Error</b>: Oops! Something went wrong.';
        exit();
      }
    }

    return $image; // Will be return path of image QR Code.
  }

}
?>

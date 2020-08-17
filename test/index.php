<?php
/**
 * Package  QR Code Generator by Upil Banteng.
 * Version  v1.0
 * Author   Upil Banteng (Afid Arifin)
 * Web      https://github.com/UpilBanteng
 */
require_once 'src/UpilBanteng.php';
$qr = new UpilBanteng();
$qr->setup(1, 450, 450, trim('mailto:intriarani@gmail.com'));
echo '<img src="'.$qr->display().'"/>';
?>

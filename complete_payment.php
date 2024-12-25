<?php
session_start();
include('config.php');

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

// Menangani pembayaran
$paymentMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentMethod = $_POST['paymentMethod'];
    if ($paymentMethod === 'e-wallet') {
        $walletPhone = $_POST['walletPhone'];
        $paymentMessage = "Payment via E-Wallet using phone: $walletPhone";
    } elseif ($paymentMethod === 'm-bank') {
        $bankAccount = $_POST['bankAccount'];
        $paymentMessage = "Payment via M-Bank using account: $bankAccount";
    } else {
        $paymentMessage = "Invalid payment method.";
    }
}
?>

<body>
<!-- Transaction Processing Message -->
<table align='center'>
    <tr><td><strong>Transaction is being processed,</strong></td></tr>
    <tr><td><font color='blue'>Please Wait <i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only"></span></font></td></tr>
    <tr><td>(Do not 'RELOAD' or 'CLOSE' this page)</td></tr>
</table>


<!-- Redirecting after 3 seconds -->
<script>
    setTimeout(function() {
        window.location = "profile.php";
    }, 3000);
</script>

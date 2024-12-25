<?php include('header.php');
if (!isset($_SESSION['user'])) {
    header('location:login.php');
} ?>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <h3>Payment</h3>
            <form action="complete_payment.php" method="post" id="paymentForm">
                <div class="col-md-6 col-md-offset-3" style="margin-bottom:50px">
                    <div class="form-group">
                        <label for="paymentMethod">Payment Method</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod" required>
                            <option value="">-- Select Payment Method --</option>
                            <option value="e-wallet">E-Wallet (GoPay, Dana, ShopeePay)</option>
                            <option value="m-bank">M-Bank (BCA, BNI, BSI, Mandiri)</option>
                        </select>
                    </div>
                    <div class="form-group" id="walletField" style="display: none;">
                        <label for="walletPhone">Phone Number (E-Wallet)</label>
                        <input type="text" class="form-control" name="walletPhone" id="walletPhone" placeholder="Enter phone number for E-Wallet">
                    </div>
                    <div class="form-group" id="bankField" style="display: none;">
                        <label for="bankAccount">Bank Account Number (M-Bank)</label>
                        <input type="text" class="form-control" name="bankAccount" id="bankAccount" placeholder="Enter bank account number">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Proceed to Payment</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
    // Show/hide fields based on payment method selection
    document.getElementById('paymentMethod').addEventListener('change', function () {
        const walletField = document.getElementById('walletField');
        const bankField = document.getElementById('bankField');
        
        if (this.value === 'e-wallet') {
            walletField.style.display = 'block';
            bankField.style.display = 'none';
        } else if (this.value === 'm-bank') {
            walletField.style.display = 'none';
            bankField.style.display = 'block';
        } else {
            walletField.style.display = 'none';
            bankField.style.display = 'none';
        }
    });
</script>
<?php include('footer.php'); ?>


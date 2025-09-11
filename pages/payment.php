<?php
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

    <section class="auth-wrapper">
        <h3>Book Tutor</h3>
        <form action="" method="POST">

            <label for="booking_id">
                Booking ID
                <input type="number" name="booking_id" id="booking_id" min="1" required>
            </label>

            <label for="amount">
                Amount ($)
                <input type="number" name="amount" id="amount" step="0.01" min="0" required>
            </label>

            <label for="method">
                Payment Method
                <select name="method" id="method" required>
                    <option value="" disabled selected>-- select method --</option>
                    <option value="card">Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="cash">Cash</option>
                </select>
            </label>

            <label for="status">
                Payment Status
                <select name="status" id="status">
                    <option value="pending" selected>Pending</option>
                    <option value="paid">Paid</option>
                    <option value="failed">Failed</option>
                </select>
            </label>

            <button type="submit">Complete Payment &rarr;</button>

        </form>


    </section>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.navlinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

    </script>
</body>

</html>



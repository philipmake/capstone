<?php
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

    <section class="auth-wrapper">
        <h3>Parent profile setup . (1)</h3>
        <form action="">
            <label for="address">Enter address
                <input type="text" name="address" id="address">
            </label>

            <label for="pref_mode">Preferred mode of learning
                <select name="pref_mode" id="pref_mode">
                    <option value="online" selected>Online</option>
                    <option value="offline">In-Person</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </label>

            <label for="information">
                Information
                <textarea name="information" id="information" style="width: 100%; resize: vertical;" rows="4"
                    placeholder="Enter any additional information here..."></textarea>
            </label>

            <button type="submit">Add Ward information &rarr;</button>
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



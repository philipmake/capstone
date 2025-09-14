<?php
session_start();
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/ParentProfile.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['id'];
        $address = trim($_POST['address']);
        $preferred_mode = trim($_POST['pref_mode']);
        $additional_info = trim($_POST['information']);
       
        if (empty($address) || empty($preferred_mode)) {
            $error = "Fields are required!";
        } else {
            $parent = new ParentProfile();
            $p = $parent->create($user_id, $address, $preferred_mode, $additional_info);

            if (!empty($p)) {
                $_SESSION['parent_id'] = $p;
                $success = "Successfull profile creation";
                header("Location: ward_reg.php");
            } else {
                $error = "Error creating parent profile";
            }
        }
    }
}
?>

    <section class="auth-wrapper">
        <h3>Parent profile setup . (1)</h3>

          <!-- Display success or error messages -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="" method="post">
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

            <button type="submit" name="submit">Next(Add child information) &rarr;</button>
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



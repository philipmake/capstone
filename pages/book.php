<?php
session_start();
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/Booking.php';

$errors = [];
$success = '';

// Ensure parent is logged in
if (!isset($_SESSION['parent_id'])) {
    header("Location: login.php");
    exit;
}

// Optional: tutor_id could be passed as GET param from tutor list/page
if (isset($_GET['tutor_id'])) {
    $_SESSION['tutor_id'] = intval($_GET['tutor_id']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $parent_id = $_SESSION['parent_id'];
        $tutor_id = $_SESSION['tutor_id'] ?? null;
        $subject = trim($_POST['subject']);
        $days = trim($_POST['days']);
        $duration = trim($_POST['duration']);
        $start_date = trim($_POST['start_date']);
        $end_date = trim($_POST['end_date']);
        $status = "pending";

        if (empty($parent_id)) {
            $errors[] = "Missing parentID";
        } elseif (empty($tutor_id)) {
            $errors[] = "Missing tutorID";
        } elseif (empty($subject)) {
            $errors[] = "Enter subject(s)";
        } elseif (empty($days)) {
            $errors[] = "Specify days";
        } elseif (empty($duration)) {
            $errors[] = "Specify duration";
        } elseif (empty($start_date)) {
            $errors[] = "Specify start date";
        } elseif (empty($end_date)) {
            $errors[] = "Specify end date";
        } else {
            $book = new Booking();
            $b = $book->create($parent_id, $tutor_id, $subject, $days, $duration, $start_date, $end_date, $status);
           
            if ($b) {
                $success = "Pending booking created";
                header("Location: view_booking.php");
                exit;
            } else {
                $errors[] = "Error adding booking";
            }
        }
    }
}
?>

<section class="auth-wrapper">
    <h3>Book Tutor</h3>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul style="list-style:none; color:#b00;">
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="subject">
            Subject
            <input type="text" name="subject" id="subject" required>
        </label>

        <label for="days">
            Day
            <select name="days" id="days" required>
                <option value="" disabled selected>-- select day --</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select>
        </label>

        <label for="duration">
            Duration (hours)
            <input type="number" name="duration" id="duration" min="1" max="8" required>
        </label>

        <label for="start_date">
            Start date
            <input type="date" name="start_date" id="start_date" required>
        </label>

        <label for="end_date">
            End date
            <input type="date" name="end_date" id="end_date" required>
        </label>

       <h4>Status: pending</h4>

        <button type="submit" name="submit">Submit booking &rarr;</button>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.navlinks');
    hamburger && hamburger.addEventListener('click', () => navLinks.classList.toggle('active'));
</script>
</body>
</html>

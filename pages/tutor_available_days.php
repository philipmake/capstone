<?php
session_start();
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

require_once __DIR__ . '/../database/Days.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$tutor_id = $_SESSION['id'];
$dayDb = new Days();
$days = $dayDb->getByTutorId($tutor_id);
// print_r($days);

// Handle add
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $day = $_POST['day'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
    $dayDb->create($tutor_id, $day, $start, $end);
    header("Location: tutor_available_days.php");
    exit;
}

// Handle delete
if (isset($_GET['remove'])) {
    $dayDb->delete($tutor_id, intval($_GET['remove']));
    header("Location: tutor_available_days.php");
    exit;
}
?>

<section class="auth-wrapper">
    <h2>Manage Availability</h2>
    <div class="tutor_available_list">
        <?php if(empty($days)): ?>
            <p>Add available days</p>
        <?php else: ?>
            <?php foreach ($days as $d): ?>
                <div class="available_list_row"><?= htmlspecialchars($d['day']) ?> (<?= $d['start_time'] ?> - <?= $d['end_time'] ?>)
                    <a class="auth_btn" href="?remove=<?= $d['id'] ?>">Remove</a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
   

    <form method="POST">
        <label for="day">Day of the week</label>
        <input type="text" name="day" placeholder="Monday" required>

        <label for="start_time">Start time</label>
        <input type="time" name="start_time" required>

        <label for="end_time">End time</label>
        <input type="time" name="end_time" required>
        <button type="submit">Add Availability</button>
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
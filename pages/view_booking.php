<?php
session_start();
$page = "profile";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/Booking.php';

if (!isset($_SESSION['parent_id'])) {
    header("Location: login.php");
    exit;
}

$parent_id = $_SESSION['parent_id'];

$book = new Booking();
$bookings = $book->getByParent($parent_id);
?>

<section class="auth-wrapper">
    <h3>Your Bookings</h3>

    <?php if (!empty($bookings)): ?>
        <?php foreach ($bookings as $b): ?>
            <div class="booking-card" style="border:1px solid #ddd; padding:1rem; margin-bottom:1rem;">
                <p><strong>Subject:</strong> <?= htmlspecialchars($b['subject']) ?></p>
                <p><strong>Days:</strong> <?= htmlspecialchars($b['days']) ?></p>
                <p><strong>Duration:</strong> <?= htmlspecialchars($b['duration']) ?> hours</p>
                <p><strong>Start Date:</strong> <?= htmlspecialchars($b['start_date']) ?></p>
                <p><strong>End Date:</strong> <?= htmlspecialchars($b['end_date']) ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($b['status']) ?></p>
                <?php if (!empty($b['tutor_user_id'])): ?>
                    <p><strong>Tutor user id:</strong> <?= htmlspecialchars($b['tutor_user_id']) ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No bookings found.</p>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.navlinks');
    hamburger && hamburger.addEventListener('click', () => navLinks.classList.toggle('active'));
</script>
</body>
</html>

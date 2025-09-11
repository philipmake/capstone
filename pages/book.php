<?php
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

    <section class="auth-wrapper">
        <h3>Book Tutor</h3>
        <form action="" method="POST">

            <!-- Assuming you want to select a subject from your subjects table -->
            <label for="subject_id">
                Subject
                <select name="subject_id" id="subject_id" required>
                    <option value="" disabled selected>-- select subject --</option>
                    <option value="1">Maths</option>
                    <option value="2">Science</option>
                    <option value="3">English</option>
                    <!-- You will likely generate these options dynamically from your DB -->
                </select>
            </label>

            <!-- Select day of the week -->
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

            <!-- Duration in hours or minutes -->
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

            <button type="submit">Submit booking &rarr;</button>
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



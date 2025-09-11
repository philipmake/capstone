<?php
$page = "profile";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

    <div class="profile">

        <div class="top">
            <div class="top-image">
                <img src="/capstone/assets/PG.png" alt="parent_profile_picture" />
            </div>
            <div class="top-text">
                <h1>Jane Doe</h1>
                <h5>Location: 123 Main St, Lagos</h5>
                <h5>Email: jane.doe@example.com</h5>
                <h5>Phone: +234 801 234 5678</h5>
                <h5>Preferred Tutoring Mode: Online</h5>
            </div>
        </div>

        <div class="main-area">

            <h3 style=";">Ward(s)</h3>
            <hr>
            <div class="wards">
                <div class="ward-card">
                    <p><strong>Name:</strong> Michael Doe</p>
                    <p><strong>Age:</strong> 12</p>
                    <p><strong>Gender:</strong> Male</p>
                    <p><strong>School Level:</strong> Junior Secondary</p>
                    <p><strong>Subject:</strong> Mathematics</p>
                    <p><strong>Learning Needs:</strong> Struggles with math basics</p>
                    <p><strong>Goals:</strong> Prepare for WAEC</p>
                    <p><strong>Preferred Schedule:</strong> Weekends</p>
                </div>

                <br>
            <hr>
            <br>
                <div class="ward-card">
                    <p><strong>Name:</strong> Sarah Doe</p>
                    <p><strong>Age:</strong> 9</p>
                    <p><strong>Gender:</strong> Female</p>
                    <p><strong>School Level:</strong> Primary</p>
                    <p><strong>Subject:</strong> English Language</p>
                    <p><strong>Learning Needs:</strong> Improve reading skills</p>
                    <p><strong>Goals:</strong> Improve English speaking</p>
                    <p><strong>Preferred Schedule:</strong> After school 4-6 PM</p>
                </div>
            </div>

            <div class="additional-info">
                <h3>Additional Information</h3>
                <p>
                    Jane is very keen on ensuring her children get personalized and effective tutoring that fits
                    their schedules.
                </p>
            </div>
        </div>
    </div>

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



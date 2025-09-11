<?php
$page = "search";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

    <div class="search_page_banner">
        <h3>Find a tutor near you</h3>
    </div>


    <section class="search_wrapper">

        <!-- Add filed to enter search queries here -->

        <div class="tutor_card">
            <div class="tutor-card_1">
                <img src="/capstone/assets/PG.png" alt="">
                <h3>Philip Gisanrin</h3>
                <p>rating: 4.5</p>
            </div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, officia!</p>

            <div class="subjects">
                <p>maths</p>
                <p>f/maths</p>
                <p>english</p>
            </div>

            <div class="tutor_card_2">
                <p>location</p>
                <a class="cta-3" href="profile.html">View Profile</a>
            </div>

        </div>

        <div class="tutor_card">
            <div class="tutor-card_1">
                <img src="/capstone/assets/PG.png" alt="">
                <h3>Philip Gisanrin</h3>
                <p>rating: 4.5</p>
            </div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, officia!</p>

            <div class="subjects">
                <p>maths</p>
                <p>f/maths</p>
                <p>english</p>
            </div>
            
            <div class="tutor_card_2">
                <p>location</p>
                <a class="cta-3" href="profile.html">View Profile</a>
            </div>

        </div>

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



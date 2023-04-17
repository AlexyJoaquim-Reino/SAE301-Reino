<footer class="py-5 bg-body-tertiary">
    <div class="container d-flex flex-column flex-lg-row justify-content-between">
        <div class="w-30">
            <!-- Logo -->
            <img src="assets/logo/logo-but-mmi-champs-black.png" class="img-fluid logo" alt="">
        </div>
        <div class='d-flex flex-column flex-lg-row'>
            <!-- Colonne "A propos" -->
            <div class="col">
                <ul class="ps-0">
                    <li><a href="a-propos">À propos</a></li>
                    <li><a href="mentions">Mentions légales</a></li>
                    <li><a href="login">Back-office</a></li>
                </ul>
            </div>
            <!-- Colonne "Besoin d'aide" -->
            <div class="col">
                <h3>Besoin d'aide</h3>
                <ul class="ps-0">
                    <li><a href="faq">FAQ</a></li>
                    <li><a href="conseils">Nos conseils</a></li>
                </ul>
            </div>
            <!-- Colonne "Contact" -->
            <div class="col">
                <h3>Contact</h3>
                <p><b>Adresse</b> : 2 Rue Albert Einstein, 77420 Champs-sur-Marne</p>
                <p><b>E-mail</b> : mmi-dir.iut@univ-eiffel.fr</p>
                <p><b>Téléphone</b> : 01 60 95 85 85</p>
                <p><a href="https://www.instagram.com/mmi_champs/" target="_blank"><span class="visually-hidden">lien page instagram</span><i class="bi bi-instagram"></i> @mmi_champs</a></p>
                <p><a href="https://twitter.com/MMI_Champs" target="_blank"><span class="visually-hidden">lien page twitter</span><i class="bi bi-twitter"></i>@MMI_Champs</a></p>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column flex-lg-row justify-content-center pt-5">
        © 2023 - BUT MÉTIERS DU MULTIMÉDIA ET DE L'INTERNET, CHAMPS-SUR-MARNE
    </div>
</footer>

<script src="./src/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="./src/vendor/swiper/swiper-bundle.min.js"></script>
<script src="./src/vendor/js/main.js"></script>
<script src="./src/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<script>
    AOS.init();
</script>
<script>
    let switchTheme = document.getElementById('switch-theme');
    let logos = document.querySelectorAll(".logo");

    let theme = localStorage.getItem("theme");
    if (theme === "dark") {
        switchTheme.checked = true;
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        logos.forEach(logo => logo.setAttribute("src", "assets/logo/logo-noname-black.png"));
    } else {
        switchTheme.checked = false;
        document.documentElement.setAttribute('data-bs-theme', 'light');
        logos.forEach(logo => logo.setAttribute("src", "assets/logo/logo-noname-white.png"));
    }

    switchTheme.addEventListener('change', function() {
        if (this.checked) {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
            logos.forEach(logo => logo.setAttribute("src", "assets/logo/logo-noname-black.png"));
            document.body.classList.remove("fadin");
            document.body.classList.toggle("fadin");
            localStorage.setItem("theme", "dark");
        } else {
            document.documentElement.setAttribute('data-bs-theme', 'light');
            logos.forEach(logo => logo.setAttribute("src", "assets/logo/logo-noname-white.png"));
            document.body.classList.remove("fadin");
            document.body.classList.toggle("fadin");
            localStorage.setItem("theme", "light");
        }
    });
</script>
<!-- UI  επαναχρησιμοποιηούμενο component  -->
<header class="header">
    
    <nav class="nav">
        <ul class="navCnt">
            <li class="navItem"><a class="link" href="//localhost/cinemaProject/admin.php">Reservations</a></li>
            <li class="navItem"><a class="link" href="//localhost/cinemaProject/forms/adminSetShow.php">Shows</a></li>
            <li class="navItem"><a class="link" href="//localhost/cinemaProject/admin-dates.php">Working Days</a></li>
            <li class="navItem"><a class="link" href="//localhost/cinemaProject/forms/adminSetMovie.php">Archived
                    movies</a></li>
            <li class="navItem"><a class="link"
                    href="//localhost/cinemaProject/forms/adminChangeCinemaHours.php">Working Hours</a></li>
        </ul>
        <div class="mobileMenuBtn"><a class="mediumSvgCnt" id="mobileMenuBtn" href="#">
                <svg viewBox="0 0 28 28">
                    <path
                        d="M3 7C3 6.44771 3.44772 6 4 6H24C24.5523 6 25 6.44771 25 7C25 7.55229 24.5523 8 24 8H4C3.44772 8 3 7.55229 3 7Z" />
                    <path
                        d="M3 14C3 13.4477 3.44772 13 4 13H24C24.5523 13 25 13.4477 25 14C25 14.5523 24.5523 15 24 15H4C3.44772 15 3 14.5523 3 14Z" />
                    <path
                        d="M4 20C3.44772 20 3 20.4477 3 21C3 21.5523 3.44772 22 4 22H24C24.5523 22 25 21.5523 25 21C25 20.4477 24.5523 20 24 20H4Z" />
                </svg>
            </a>
        </div>

        <ul class="navCnt">
            <?php if(!empty($_SESSION)) : ?>
            <li class="navItem">
                <form action="//localhost/cinemaProject/class/Includes/logoutForm.php" method="post">
                    <input style="display:none;" name="logout"></input>
                    <button class="link blueBtn" type="submit">Logout</button>
                </form>
            </li>
            <?php endif ; ?>
        </ul>
    </nav>


    <nav class="mobileHeader hidden" id="mobileMenu">
        <ul class="mobileNavCnt">
            <li class="mobileNavItem"><a class="link" href="//localhost/cinemaProject/admin.php">Reservations</a></li>
            <li class="mobileNavItem"><a class="link" href="//localhost/cinemaProject/admin-dates.php">Working Days</a></li>
            <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/adminSetShow.php">Shows</a></li>
            <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/adminSetMovie.php">Archived movies</a></li>
            <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/adminChangeCinemaHours.php">Working Hours</a></li>
                    <?php if(!empty($_SESSION)) : ?>
            <li class="mobileNavItem">
                <form action="//localhost/cinemaProject/class/Includes/logoutForm.php" method="post">
                    <input style="display:none;" name="logout"></input>
                    <button class="link blueBtn" type="submit">Logout</button>
                </form>
            </li>
            <?php endif ; ?>
        </ul>
    </nav>

</header>
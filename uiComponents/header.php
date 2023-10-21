<!-- UI  επαναχρησιμοποιηούμενο component  -->
<header class="header">
    <nav class="nav">
        <div class="logo">
            <a class="svgCnt" href="//localhost/cinemaProject/index.php">
                <svg viewBox="0 0 15 15">
                    <path
                        d="M14,7.5v2c0,0.2761-0.2239,0.5-0.5,0.5S13,9.7761,13,9.5c0,0,0.06-0.5-1-0.5h-1v2.5c0,0.2761-0.2239,0.5-0.5,0.5h-8&#xA;&#x9;C2.2239,12,2,11.7761,2,11.5v-4C2,7.2239,2.2239,7,2.5,7h8C10.7761,7,11,7.2239,11,7.5V8h1c1.06,0,1-0.5,1-0.5&#xA;&#x9;C13,7.2239,13.2239,7,13.5,7S14,7.2239,14,7.5z M4,3C2.8954,3,2,3.8954,2,5s0.8954,2,2,2s2-0.8954,2-2S5.1046,3,4,3z M4,6&#xA;&#x9;C3.4477,6,3,5.5523,3,5s0.4477-1,1-1s1,0.4477,1,1S4.5523,6,4,6z M8.5,2C7.1193,2,6,3.1193,6,4.5S7.1193,7,8.5,7S11,5.8807,11,4.5&#xA;&#x9;S9.8807,2,8.5,2z M8.5,6C7.6716,6,7,5.3284,7,4.5S7.6716,3,8.5,3S10,3.6716,10,4.5S9.3284,6,8.5,6z" />
                </svg>
            </a>
        </div>
        <!-- <div class="booking"><a class="link" href="//localhost/cinemaProject/forms/bookingForm.php">bookingForm</a></div> -->
        <div class="mobileMenuBtn"><a class="mediumSvgCnt" id="mobileMenuBtn" href="#">
                <svg viewBox="0 0 28 28">
                    <path
                        d="M3 7C3 6.44771 3.44772 6 4 6H24C24.5523 6 25 6.44771 25 7C25 7.55229 24.5523 8 24 8H4C3.44772 8 3 7.55229 3 7Z" />
                    <path
                        d="M3 14C3 13.4477 3.44772 13 4 13H24C24.5523 13 25 13.4477 25 14C25 14.5523 24.5523 15 24 15H4C3.44772 15 3 14.5523 3 14Z" />
                    <path
                        d="M4 20C3.44772 20 3 20.4477 3 21C3 21.5523 3.44772 22 4 22H24C24.5523 22 25 21.5523 25 21C25 20.4477 24.5523 20 24 20H4Z" />
                </svg>
            </a></div>

        <ul class="navCnt">
            <?php if(empty($_SESSION)) : ?>
            <li class="navItem"><a class="link blueBtn" href="//localhost/cinemaProject/forms/loginForm.php">Login</a>
            </li>
            <li class="navItem"><a class="link whiteBtn"
                    href="//localhost/cinemaProject/forms/registerForm.php">Register</a>
            </li>
            <!-- <li class="navItem"><a class="link" href="//localhost/cinemaProject/forms/adminForm.php">adminForm</a></li> -->
            <?php else: ?>
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
            <!-- <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/adminForm.php">adminForm</a>
            </li> -->
            <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/bookingForm.php">Booking</a>
            </li>
            <?php if(empty($_SESSION)) : ?>
            <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/loginForm.php">Login</a>
            </li>
            <li class="mobileNavItem"><a class="mobileLink"
                    href="//localhost/cinemaProject/forms/registerForm.php">Register</a>
            </li>
            <?php else: ?>
                <form action="//localhost/cinemaProject/class/Includes/logoutForm.php" method="post">
                    <input style="display:none;" name="logout"></input>
                    <button class="link blueBtn" type="submit">Logout</button>
                </form>
            </li>

            <?php endif ; ?>
        </ul>
    </nav>

</header>
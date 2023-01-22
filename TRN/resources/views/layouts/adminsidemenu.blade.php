<link rel="icon" href="Images/Logo.ico">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Hancie Phago</title>
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('icons\apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('icons\android-chrome-192x192.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('icons\android-chrome-512x512.png')}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--========== BOX ICONS ==========-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<!--========== CSS ==========-->
<link rel="stylesheet" href="{{url('/')}}/adminassets/styles.css">




<!--========== HEADER ==========-->
<header class="header bg-success">
    <div class="header__container">
        <a href="{{url('/')}}/home/dashboard" class="header__logo text-light">Welcome: {{Session::get('name')}}
            [Admin]</a>



        <a href="#" title="{{Session::get('name')}}" data-html="true" data-toggle="popover" data-bs-placement="bottom"
            data-bs-custom-class="custom-popover" data-bs-container="body" data-trigger="focus" data-bs-content="
    <a href='Profile.php' class='text-center h5 text-success'><i class='bi bi-person-circle'></i>  View Profile</a><br><br>
    <a href='Logout.php' class='text-center h5 text-success'><i class='bi bi-box-arrow-right'></i>  Logout</a>
    " class="w3-right"><img src="{{url('/')}}/assets/img/logo.png" alt="" class="header__img"></a>





        <div class="header__toggle">
            <i class='bx bx-menu bx-md' id="header-toggle"></i>
        </div>
    </div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar ">
    <nav class="nav__container">
        <div>
            <a href="#" class="nav__link nav__logo">
                <i class='bx bxs-disc nav__icon'></i>
                <span class="nav__logo-name">{{Session::get('name')}}</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Menu</h3>

                    <a href="Home.php" class="nav__link active">
                        <i class='bx bx-home nav__icon'></i>
                        <span class="nav__name">Home</span>
                    </a>

                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">Profile</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="Profile.php" class="nav__dropdown-item"><i
                                        class="bi bi-person-circle nav__icon"></i>Accounts</a>
                                <a href="User_Password.php" class="nav__dropdown-item"><i
                                        class="bi bi-shield-lock-fill nav__icon"></i>Password</a>

                            </div>
                        </div>
                    </div>

                    <a href="Message_Inbox.php" class="nav__link">
                        <i class='bx bx-message-rounded nav__icon'></i>
                        <span class="nav__name">Messages</span>
                    </a>


                    <!-- Contact Management Nav -->

                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">Contacts</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="Contact_Management.php" class="nav__dropdown-item"><i
                                        class="bx bxs-contact nav__icon"></i>Store Contacts</a>
                                <a href="Search_Contacts.php" class="nav__dropdown-item"><i
                                        class="bx bx-search-alt-2 nav__icon"></i>Search Contacts</a>
                                <a href="Manage_Contacts.php" class="nav__dropdown-item"><i
                                        class="bx bx-edit nav__icon"></i>Manage Contacts</a>


                            </div>
                        </div>

                    </div>



                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-folder nav__icon'></i>
                            <span class="nav__name">Tools</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">

                                <a href="Activity_Log" class="nav__dropdown-item"><i
                                        class="bi bi-arrow-left-right nav__icon"></i>Activity Logs</a>
                                <a href="Application_Dashboard.php" class="nav__dropdown-item"><i
                                        class="bi bi-window nav__icon"></i>Applications</a>
                                <a href="NH_Online_Dictionary.php" class="nav__dropdown-item"><i
                                        class="bi bi-book nav__icon"></i>NH Online Dictionary</a>
                                <a href="https://firebasestorage.googleapis.com/v0/b/nh-group-c804c.appspot.com/o/Hancie%20Phago.exe?alt=media&token=fbb6dace-9413-4a77-b672-a44be75db2bb"
                                    class="nav__dropdown-item"><i class="bx bx-download nav__icon"></i>Download
                                    Application</a>
                            </div>
                        </div>

                    </div>




                    <!-- Services Section -->

                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-street-view nav__icon'></i>
                            <span class="nav__name">Services</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="Budget_Dashboard.php" class="nav__dropdown-item"><i
                                        class='bx bx-credit-card nav__icon'></i>Personal Budget</a>
                                <a href="Events_Management.php" class="nav__dropdown-item"><i
                                        class="bi bi-calendar-event nav__icon"></i>Events Management</a>
                                <a href="Project_Management.php" class="nav__dropdown-item"><i
                                        class="bi bi-kanban-fill nav__icon"></i>Projects Management</a>

                            </div>
                        </div>



                    </div>




                    <!-- Personal Notes Nav -->

                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-note nav__icon'></i>
                            <span class="nav__name">Personal Notes</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="MyNote.php" class="nav__dropdown-item"><i
                                        class='bx bx-notepad nav__icon'></i>Store Notes</a>
                                <a href="Manage_Notes.php" class="nav__dropdown-item"><i
                                        class="bx bx-edit nav__icon"></i>Manage Notes</a>
                            </div>
                        </div>
                    </div>



                    <!-- Personal Password Nav -->

                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-lock-alt bx-sm nav__icon'></i>
                            <span class="nav__name">Personal Passwords</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="MyPasswords.php" class="nav__dropdown-item"><i
                                        class='bi bi-shield-lock-fill nav__icon'></i>Store Passwords</a>
                                <a href="Manage_Passwords.php" class="nav__dropdown-item"><i
                                        class="bx bx-edit nav__icon"></i>Manage Passwords</a>
                            </div>
                        </div>
                    </div>



                    <a href="{{url('/')}}/home/dashboard/logout" class="nav__link nav__logout">
                        <i class='bx bx-log-out nav__icon'></i>
                        <span class="nav__name">Log Out</span>
                    </a>
                </div>
            </div>
        </div>


    </nav>
</div>


<!--========== MAIN JS ==========-->
<script src="assets/js/main.js"></script>
<script>
$(document).ready(function() {

    $('[data-toggle="popover"]').popover({
        html: true
    });
});
</script>
<?php
//Redirects User to login page if a users is not already logged in

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminUser"])) {
    header("Location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel='stylesheet' href='../css/adminSearch.css'>
</head>

<body>
    <div class="modal-backdrop">
        <div id="modal">
            <div id="modal-svg">
                <svg width="565" height="535" viewBox="0 0 565 535" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M344.643 133.931C359.51 145.228 358.871 177.413 363.773 204.855C368.676 232.298 379.173 254.998 377.148 277.484C375.123 300.025 360.576 322.298 340.487 338.071C320.398 353.791 294.714 363.062 271.268 359.972C247.822 356.881 226.667 341.481 204.767 326.295C182.866 311.108 160.326 296.135 145.565 273.328C130.858 250.521 123.931 219.829 137.946 201.924C152.013 184.02 187.022 178.958 212.387 171.018C237.698 163.078 253.364 152.315 276.384 142.19C299.403 132.066 329.777 122.581 344.643 133.931Z"
                        fill="#5826BD" />
                    <g clip-path="url(#clip0_95_160)">
                        <path
                            d="M266.785 108.692C285.263 106.01 307.765 129.031 330.77 144.775C353.776 160.518 377.322 168.948 391.938 186.157C406.591 203.403 412.275 229.392 409.438 254.775C406.563 280.121 395.168 304.936 376.526 319.488C357.885 334.04 332.072 338.329 305.889 343.298C279.705 348.268 253.225 353.843 226.614 348.379C200.04 342.877 173.297 326.298 170.356 303.752C167.451 281.168 188.386 252.655 200.507 229.002C212.591 205.387 215.899 186.669 224.818 163.157C233.737 139.644 248.268 111.335 266.785 108.692Z"
                            fill="#5826BD" fill-opacity="0.56" />
                    </g>
                    <rect x="169.127" y="178.014" width="128.35" height="137.877" fill="#2D1C46" stroke="#2D1C46"
                        stroke-width="6.37579" />
                    <path
                        d="M328.298 180.789L332.412 182.488V254.476L328.09 256.277H276.379H220.346V180.789H276.379H328.298Z"
                        fill="#5826BD" stroke="black" stroke-width="1.59395" />
                    <path opacity="0.4"
                        d="M244.051 276.661L299.233 274.248L295.447 279.03L294.052 312.702H202.998L244.051 276.661Z"
                        fill="#5826BD" />
                    <rect x="215.593" y="180.789" width="112.066" height="75.488" fill="#5826BD" stroke="black"
                        stroke-width="1.59395" />
                    <path
                        d="M327.509 257.482L328.248 264.176L297.069 304.213L176.318 301.858L175.561 297.059L216.188 261.168L327.509 257.482Z"
                        fill="#5826BD" stroke="black" stroke-width="1.59395" />
                    <rect x="215.593" y="187.195" width="112.066" height="62.8821" fill="#2D1C46" stroke="black"
                        stroke-width="1.59395" />
                    <path d="M176.582 296.293L215.208 257.458H326.823L294.516 298.84L176.582 296.293Z" fill="#6C27FF"
                        stroke="black" stroke-width="1.59395" />
                    <path
                        d="M218.958 261.384H314.092C314.426 261.384 314.612 261.77 314.404 262.031L300.094 279.986C300.017 280.083 299.9 280.138 299.776 280.136L203.287 278.538C202.939 278.532 202.765 278.115 203.006 277.864L218.67 261.507C218.745 261.429 218.849 261.384 218.958 261.384Z"
                        fill="#2D1C46" stroke="black" stroke-width="1.59395" />
                    <path
                        d="M229.605 282.502L258.215 282.988C259.852 283.016 260.759 284.898 259.76 286.195L253.174 294.758C253.097 294.858 252.978 294.915 252.853 294.913L217.489 294.441C217.144 294.436 216.968 294.025 217.202 293.772L226.31 283.911C227.158 282.993 228.356 282.481 229.605 282.502Z"
                        fill="#5826BD" stroke="black" stroke-width="1.59395" />
                    <rect opacity="0.3" x="223.682" y="190.325" width="84.3148" height="56.4165" rx="4.38336"
                        fill="#9152E1" />
                    <mask id="mask0_95_160" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="200" y="260"
                        width="117" height="21">
                        <path d="M202.375 278.523L218.788 261.384H314.919L299.972 280.139L202.375 278.523Z"
                            fill="#C4C4C4" stroke="black" stroke-width="1.59395" />
                    </mask>
                    <g mask="url(#mask0_95_160)">
                        <path
                            d="M212.11 280.839L228.849 259.657M223.476 280.839L240.215 259.657M240.215 274.95L251.891 259.657M250.857 274.95L263.257 259.657M260.777 274.95L273.073 259.657M267.7 280.839L284.439 259.657M279.376 280.839L296.115 259.657M290.742 280.839L307.481 259.657"
                            stroke="black" stroke-width="1.59395" />
                        <path d="M212.833 264.514H314.3M208.287 270.093H310.27M203.327 275.053H306.447" stroke="black"
                            stroke-width="1.59395" />
                    </g>
                    <rect x="179.491" y="162.871" width="101.611" height="77.3065" rx="3.1879" fill="#4B3183"
                        stroke="#2D1C46" stroke-width="1.59395" />
                    <path
                        d="M182.675 162.871H278.147C279.908 162.871 281.335 164.299 281.335 166.059V177.712H179.487V166.059C179.487 164.299 180.914 162.871 182.675 162.871Z"
                        fill="#7400E9" stroke="#2D1C46" stroke-width="1.59395" />
                    <circle cx="188.358" cy="170.775" r="1.9335" fill="#FF8484" />
                    <circle cx="194.346" cy="170.775" r="1.9335" fill="#85E08E" />
                    <circle cx="200.686" cy="170.775" r="1.9335" fill="#4B1E6D" />
                    <rect x="318.33" y="189.705" width="6.40627" height="5.99297" rx="0.796974" fill="#4B1E6D" />
                    <rect x="318.33" y="201.278" width="6.40627" height="5.99297" rx="0.796974" fill="#6C27FF" />
                    <path
                        d="M318.569 198.35C318.633 198.3 319.207 197.758 319.256 197.984C319.343 198.381 319.627 198.066 319.893 197.944C320.097 197.85 320.328 198.085 320.553 198.093C320.729 198.1 320.913 198.037 321.088 198.08C321.247 198.119 321.354 198.209 321.526 198.216C322.005 198.238 322.454 198.239 322.935 198.158C323.523 198.058 324.087 198.013 324.681 198.013"
                        stroke="black" stroke-width="0.398487" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M318.569 209.923C318.633 209.872 319.207 209.331 319.256 209.556C319.343 209.954 319.627 209.639 319.893 209.516C320.097 209.422 320.328 209.657 320.553 209.666C320.729 209.673 320.913 209.61 321.088 209.653C321.247 209.692 321.354 209.781 321.526 209.789C322.005 209.811 322.454 209.812 322.935 209.73C323.523 209.631 324.087 209.586 324.681 209.586"
                        stroke="black" stroke-width="0.398487" stroke-linecap="round" stroke-linejoin="round" />
                    <rect x="223.555" y="223.441" width="32.2775" height="7.96974" rx="3.98487" fill="#7000FF" />
                    <rect opacity="0.25" x="188.886" y="223.441" width="32.2775" height="7.96974" rx="3.98487"
                        fill="#7000FF" />
                    <path d="M189.683 187.976H270.576" stroke="#2D1C46" stroke-width="1.59395" stroke-linecap="round" />
                    <path d="M189.683 193.555H270.576" stroke="#2D1C46" stroke-width="1.59395" stroke-linecap="round" />
                    <path d="M189.683 199.134H230.329" stroke="#2D1C46" stroke-width="1.59395" stroke-linecap="round" />
                    <defs>
                        <clipPath id="clip0_95_160">
                            <rect width="479.578" height="319.718" fill="white"
                                transform="translate(-0.00170898 309.975) rotate(-45.4857)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="heading">
                <h3 id="model-title">Club Details</h3>
            </div>
            <form id='modal-form' action="adminView.php" class="model-form" method='POST'>
                <div class="input">
                    <div class="model-label">
                        <label for="clubId">Club id</label>
                    </div>
                    <div class="model-input">
                        <input id="clubId" name='clubId' readonly>
                    </div>
                </div>
                <div class="input">
                    <div class="model-label">
                        <label for="clubName">Club name</label>
                    </div>
                    <div class="model-input">
                        <input id="clubName" name='clubName' readonly>
                    </div>
                </div>
                <div class="input description">
                    <div class="model-label">
                        <label for="description">Description</label>
                    </div>
                    <div class="model-input">
                        <textarea id="description" name='description' readonly></textarea>
                    </div>
                </div>
                <input type='hidden' name='handlerMethod' value='view'>
                <button type='submit' id='apply-button' class="view-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4z" />
                    </svg>
                    <h3>View More</h3>
                </button>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="taskbar">
            <div class="profile">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="121" height="121" viewBox="0 0 121 121" fill="none">
                        <circle cx="60.5" cy="60.5" r="60.5" fill="#7C3BE7" />
                    </svg>
                </div>
                <div class="user">
                    <?php echo ('<h2>' . $_SESSION['adminUser']['fname'] . ' ' . $_SESSION['adminUser']['lname'] . '</h2>') ?>
                </div>
            </div>
            <div class="menu-container">
                <ul class="menu">
                    <a href = 'adminDash.php'>
                        <li class="menu-item active">Clubs</li>
                    </a>
                    <a href='adminApplication.php'>
                        <li class="menu-item">Applications</li>
                    </a>
                    <form action="../../server/handler.php" method="POST">
                        <input type='hidden' name='handlerMethod' value='adminLogOut'>
                        <button type='submit' class="logOutBtn">Log Out</button>
                    </form>
                </ul>
            </div>
        </div>
        <div class="taskbar-container"></div>
        <div class='dashboard'>
            <div class="page-heading">
                <h2>Search for a Club</h2>
            </div>
            <div class='horizontal'>
                <hr class='hr-line'>
            </div>

            <div class='club-container'>
                <div class='available'>
                    <h3>Search</h3>
                </div>
                <div class="search-container">
                    <form action="../../server/validate.php" method="POST">
                        <div class="search-input">
                            <div class="form-label">
                                <label for="club_id">Club ID</label>
                            </div>
                            <div class="form-input">
                                <input type="text" id='club_id' name='club_id'>
                            </div>
                        </div>
                        <div class="search-input">
                            <div class="form-label">
                                <label for="club_name">Club Name</label>
                            </div>
                            <div class="form-input">
                                <input type="text" id='club_name' name='club_name'>
                            </div>
                        </div>
                        <input type='hidden' name='validationType' value='adminSearch'>
                        <div class="search-btn">
                            <button type='submit' class="main-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path fill="currentColor"
                                        d="M10.68 11.74a6 6 0 0 1-7.922-8.982a6 6 0 0 1 8.982 7.922l3.04 3.04a.749.749 0 0 1-.326 1.275a.749.749 0 0 1-.734-.215ZM11.5 7a4.499 4.499 0 1 0-8.997 0A4.499 4.499 0 0 0 11.5 7Z" />
                                </svg>
                                <h3>Search</h3>
                            </button>
                        </div>
                    </form>
                </div>

                <?php
                if (isset($_GET['error'])) {

                    echo ("
                    <div class='error'>
                    <h2>Error: " . $_GET['error'] . "</h2>
                </div>
                    ");
                }
                ?>
                <div class="club-catalog">
                    <?php
                    //print_r($_GET);exit();
                    if (isset($_GET['result'])) {
                         
                        foreach ($_GET as $key => $value) {
                            echo ("<div class='club'>
                            <div style='display:none' id = '" . $value['club_id'] . "' data-value = '" . $value['club_id'] . "'>
                            <input type='hidden' value = '" . $value['club_name'] . "'>
                            <input type='hidden' value = '" . $value['club_description'] . "'>
                        </div>
                         <div class='club'><h1>" . $value['club_name'] . "</h1></div>
                         <button class='view' value = '" . $value['club_id'] . "'>View</button>
                         </div>");
                        }
                    } else {
                        echo ("
                        <div class='empty-message-container'>
                        <svg width='565' height='535' viewBox='0 0 565 535' fill='none'
                            xmlns='http://www.w3.org/2000/svg'>
                            <path
                                d='M344.643 133.931C359.51 145.228 358.871 177.413 363.773 204.855C368.676 232.298 379.173 254.998 377.148 277.484C375.123 300.025 360.576 322.298 340.487 338.071C320.398 353.791 294.714 363.062 271.268 359.972C247.822 356.881 226.667 341.481 204.767 326.295C182.866 311.108 160.326 296.135 145.565 273.328C130.858 250.521 123.931 219.829 137.946 201.924C152.013 184.02 187.022 178.958 212.387 171.018C237.698 163.078 253.364 152.315 276.384 142.19C299.403 132.066 329.777 122.581 344.643 133.931Z'
                                fill='#5826BD' />
                            <g clip-path='url(#clip0_95_160)'>
                                <path
                                    d='M266.785 108.692C285.263 106.01 307.765 129.031 330.77 144.775C353.776 160.518 377.322 168.948 391.938 186.157C406.591 203.403 412.275 229.392 409.438 254.775C406.563 280.121 395.168 304.936 376.526 319.488C357.885 334.04 332.072 338.329 305.889 343.298C279.705 348.268 253.225 353.843 226.614 348.379C200.04 342.877 173.297 326.298 170.356 303.752C167.451 281.168 188.386 252.655 200.507 229.002C212.591 205.387 215.899 186.669 224.818 163.157C233.737 139.644 248.268 111.335 266.785 108.692Z'
                                    fill='#5826BD' fill-opacity='0.56' />
                            </g>
                            <rect x='169.127' y='178.014' width='128.35' height='137.877' fill='#2D1C46'
                                stroke='#2D1C46' stroke-width='6.37579' />
                            <path
                                d='M220.346 180.789H276.379H328.298L332.412 182.488V254.476L328.09 256.277H276.379H220.346V180.789Z'
                                fill='#5826BD' stroke='black' stroke-width='1.59395' />
                            <path opacity='0.4'
                                d='M244.051 276.661L299.233 274.248L295.447 279.03L294.052 312.702H202.998L244.051 276.661Z'
                                fill='#5826BD' />
                            <rect x='215.593' y='180.789' width='112.066' height='75.488' fill='#5826BD' stroke='black'
                                stroke-width='1.59395' />
                            <path
                                d='M175.561 297.059L216.188 261.168L327.509 257.482L328.248 264.176L297.069 304.213L176.318 301.858L175.561 297.059Z'
                                fill='#5826BD' stroke='black' stroke-width='1.59395' />
                            <rect x='215.593' y='187.195' width='112.066' height='62.8821' fill='#2D1C46' stroke='black'
                                stroke-width='1.59395' />
                            <path d='M176.582 296.293L215.208 257.458H326.823L294.516 298.84L176.582 296.293Z'
                                fill='#6C27FF' stroke='black' stroke-width='1.59395' />
                            <path
                                d='M218.67 261.507C218.745 261.429 218.849 261.384 218.958 261.384H314.092C314.426 261.384 314.612 261.77 314.404 262.031L300.094 279.986C300.017 280.083 299.9 280.138 299.776 280.136L203.287 278.538C202.939 278.532 202.765 278.115 203.006 277.864L218.67 261.507Z'
                                fill='#2D1C46' stroke='black' stroke-width='1.59395' />
                            <path
                                d='M226.31 283.911C227.158 282.993 228.356 282.481 229.605 282.502L258.215 282.988C259.852 283.016 260.759 284.898 259.761 286.195L253.174 294.758C253.097 294.858 252.978 294.915 252.853 294.913L217.489 294.441C217.145 294.436 216.968 294.025 217.202 293.772L226.31 283.911Z'
                                fill='#5826BD' stroke='black' stroke-width='1.59395' />
                            <rect opacity='0.3' x='223.682' y='190.325' width='84.3148' height='56.4165' rx='4.38336'
                                fill='#9152E1' />
                            <mask id='mask0_95_160' style='mask-type:alpha' maskUnits='userSpaceOnUse' x='200' y='260'
                                width='117' height='21'>
                                <path d='M202.375 278.523L218.788 261.384H314.919L299.972 280.139L202.375 278.523Z'
                                    fill='#C4C4C4' stroke='black' stroke-width='1.59395' />
                            </mask>
                            <g mask='url(#mask0_95_160)'>
                                <path
                                    d='M212.11 280.839L228.849 259.657M223.476 280.839L240.215 259.657M240.215 274.95L251.891 259.657M250.858 274.95L263.257 259.657M260.777 274.95L273.073 259.657M267.7 280.839L284.439 259.657M279.376 280.839L296.115 259.657M290.742 280.839L307.481 259.657'
                                    stroke='black' stroke-width='1.59395' />
                                <path d='M212.833 264.514H314.3M208.287 270.093H310.271M203.327 275.053H306.448'
                                    stroke='black' stroke-width='1.59395' />
                            </g>
                            <rect x='179.49' y='162.871' width='101.611' height='77.3065' rx='3.1879' fill='#4B3183'
                                stroke='#2D1C46' stroke-width='1.59395' />
                            <path
                                d='M179.487 166.059C179.487 164.299 180.914 162.871 182.675 162.871H278.147C279.908 162.871 281.335 164.299 281.335 166.059V177.712H179.487V166.059Z'
                                fill='#7400E9' stroke='#2D1C46' stroke-width='1.59395' />
                            <circle cx='188.358' cy='170.775' r='1.9335' fill='#FF8484' />
                            <circle cx='194.346' cy='170.775' r='1.9335' fill='#85E08E' />
                            <circle cx='200.686' cy='170.775' r='1.9335' fill='#4B1E6D' />
                            <rect x='318.33' y='189.705' width='6.40627' height='5.99297' rx='0.796974'
                                fill='#4B1E6D' />
                            <rect x='318.33' y='201.278' width='6.40627' height='5.99297' rx='0.796974'
                                fill='#6C27FF' />
                            <path
                                d='M318.569 198.35C318.633 198.3 319.207 197.758 319.256 197.984C319.343 198.381 319.627 198.066 319.893 197.944C320.097 197.85 320.328 198.085 320.553 198.093C320.729 198.1 320.913 198.037 321.088 198.08C321.247 198.119 321.354 198.209 321.526 198.216C322.005 198.238 322.454 198.239 322.935 198.158C323.523 198.058 324.087 198.013 324.681 198.013'
                                stroke='black' stroke-width='0.398487' stroke-linecap='round' stroke-linejoin='round' />
                            <path
                                d='M318.569 209.923C318.633 209.872 319.207 209.331 319.256 209.556C319.343 209.954 319.627 209.639 319.893 209.516C320.097 209.422 320.328 209.657 320.553 209.666C320.729 209.673 320.913 209.61 321.088 209.653C321.247 209.692 321.354 209.781 321.526 209.789C322.005 209.811 322.454 209.812 322.935 209.73C323.523 209.631 324.087 209.586 324.681 209.586'
                                stroke='black' stroke-width='0.398487' stroke-linecap='round' stroke-linejoin='round' />
                            <rect x='223.555' y='223.441' width='32.2775' height='7.96974' rx='3.98487'
                                fill='#7000FF' />
                            <rect opacity='0.25' x='188.886' y='223.441' width='32.2775' height='7.96974' rx='3.98487'
                                fill='#7000FF' />
                            <path d='M189.683 187.976H270.576' stroke='#2D1C46' stroke-width='1.59395'
                                stroke-linecap='round' />
                            <path d='M189.683 193.555H270.576' stroke='#2D1C46' stroke-width='1.59395'
                                stroke-linecap='round' />
                            <path d='M189.683 199.134H230.329' stroke='#2D1C46' stroke-width='1.59395'
                                stroke-linecap='round' />
                            <defs>
                                <clipPath id='clip0_95_160'>
                                    <rect width='479.578' height='319.718' fill='white'
                                        transform='translate(-0.00170898 309.975) rotate(-45.4857)' />
                                </clipPath>
                            </defs>
                        </svg>

                        <div class='empty-message'>
                            <h2>No results available at this time please search again.</h2>
                        </div>
                    </div>
                        ");
                    }


                    ?>

                </div>

            </div>
        </div>
    </div>
    <script defer src='../js/adminSearch.js'></script>
</body>

</html>
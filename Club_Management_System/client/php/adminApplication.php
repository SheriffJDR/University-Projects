<?php
require_once('../../server/handlerClass.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['adminUser'])) {
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../css/adminApplication.css'>
</head>

<body>

    <div id="application-modal" class="application-modal-backdrop">
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
                <h3 id="model-title">Application Details</h3>
            </div>
            <form id='modal-form' class="model-form">
                <div class="input">
                    <div class="model-label">
                        <label for="applicationId">Application Id</label>
                    </div>
                    <div class="model-input">
                        <input id="applicationId" name='applicationId' readonly>
                    </div>
                </div>
                <div class="input">
                    <div class="model-label">
                        <label for="studentName">Student Name</label>
                    </div>
                    <div class="model-input">
                        <input id="studentName" name='studentName' readonly>
                    </div>
                </div>
                <div class="input">
                    <div class="model-label">
                        <label for="clubId">Club Id</label>
                    </div>
                    <div class="model-input">
                        <input id="clubId" name='clubId' readonly>
                    </div>
                </div>
                <div class="input">
                    <div class="model-label">
                        <label for="clubName">Club Name</label>
                    </div>
                    <div class="model-input">
                        <input id="clubName" name='clubName' readonly>
                    </div>
                </div>
                <div class="input">
                    <div class="model-label">
                        <label for="date">Date Applied</label>
                    </div>
                    <div class="model-input">
                        <input id="date" name='date' readonly>
                    </div>
                </div>
                <div class="input">
                    <div class="model-label">
                        <label for="status">Status</label>
                    </div>
                    <div class="model-input">
                        <input id="status" name='status' readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_GET['message'])) {
        echo ("
            <div id = 'modal-backdrop' class='modal-backdrop visible'>
            <div class='success-modal'>
                <svg width='450' height='451' viewBox='0 0 450 451' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path
                        d='M274.559 132.188C286.402 141.187 285.893 166.827 289.798 188.689C293.704 210.551 302.066 228.635 300.453 246.549C298.84 264.505 287.251 282.249 271.247 294.815C255.244 307.337 234.783 314.724 216.105 312.262C197.426 309.8 180.574 297.531 163.127 285.433C145.68 273.335 127.723 261.406 115.964 243.238C104.248 225.069 98.7297 200.618 109.894 186.354C121.101 172.091 148.991 168.058 169.197 161.733C189.361 155.408 201.841 146.833 220.18 138.768C238.518 130.702 262.715 123.146 274.559 132.188Z'
                        fill='#5826BD' />
                    <g clip-path='url(#clip0_194_278)'>
                        <path
                            d='M212.534 112.081C227.254 109.945 245.18 128.284 263.508 140.826C281.835 153.369 300.593 160.084 312.236 173.793C323.909 187.533 328.437 208.237 326.177 228.458C323.887 248.649 314.809 268.418 299.959 280.011C285.108 291.604 264.545 295.02 243.686 298.979C222.827 302.938 201.732 307.379 180.532 303.026C159.362 298.643 138.058 285.436 135.714 267.475C133.4 249.484 150.078 226.769 159.734 207.926C169.36 189.113 171.996 174.202 179.101 155.47C186.207 136.739 197.783 114.187 212.534 112.081Z'
                            fill='#5826BD' fill-opacity='0.56' />
                    </g>
                    <rect x='134.734' y='167.306' width='102.249' height='109.838' fill='#2D1C46' stroke='#2D1C46'
                        stroke-width='5.07923' />
                    <path
                        d='M261.537 169.517L264.815 170.871V228.219L261.371 229.654H220.176H175.538V169.517H220.176H261.537Z'
                        fill='#5826BD' stroke='black' stroke-width='1.26981' />
                    <path opacity='0.4'
                        d='M194.422 245.893L238.382 243.971L235.367 247.78L234.256 274.605H161.718L194.422 245.893Z'
                        fill='#5826BD' />
                    <rect x='171.752' y='169.517' width='89.2764' height='60.137' fill='#5826BD' stroke='black'
                        stroke-width='1.26981' />
                    <path
                        d='M260.908 230.614L261.498 235.947L236.659 267.842L140.464 265.965L139.86 262.143L172.226 233.55L260.908 230.614Z'
                        fill='#5826BD' stroke='black' stroke-width='1.26981' />
                    <rect x='171.752' y='174.621' width='89.2764' height='50.0946' fill='#2D1C46' stroke='black'
                        stroke-width='1.26981' />
                    <path d='M140.674 261.532L171.445 230.595H260.362L234.625 263.561L140.674 261.532Z' fill='#6C27FF'
                        stroke='black' stroke-width='1.26981' />
                    <path
                        d='M174.432 233.723H250.22C250.486 233.723 250.634 234.03 250.468 234.238L239.069 248.542C239.007 248.619 238.914 248.663 238.815 248.661L161.948 247.388C161.671 247.383 161.532 247.051 161.724 246.851L174.203 233.821C174.263 233.758 174.345 233.723 174.432 233.723Z'
                        fill='#2D1C46' stroke='black' stroke-width='1.26981' />
                    <path
                        d='M182.914 250.546L205.706 250.934C207.01 250.956 207.732 252.454 206.937 253.488L201.69 260.31C201.629 260.389 201.534 260.435 201.434 260.433L173.262 260.057C172.987 260.053 172.847 259.726 173.033 259.524L180.289 251.668C180.964 250.937 181.919 250.529 182.914 250.546Z'
                        fill='#5826BD' stroke='black' stroke-width='1.26981' />
                    <rect opacity='0.3' x='178.196' y='177.114' width='67.1688' height='44.9438' rx='3.49197'
                        fill='#9152E1' />
                    <mask id='mask0_194_278' style='mask-type:alpha' maskUnits='userSpaceOnUse' x='159' y='233' width='94'
                        height='17'>
                        <path d='M161.221 247.376L174.296 233.723H250.879L238.972 248.664L161.221 247.376Z' fill='#C4C4C4'
                            stroke='black' stroke-width='1.26981' />
                    </mask>
                    <g mask='url(#mask0_194_278)'>
                        <path
                            d='M168.977 249.221L182.312 232.347M178.031 249.221L191.366 232.347M191.366 244.529L200.668 232.347M199.845 244.529L209.722 232.347M207.747 244.529L217.542 232.347M213.262 249.221L226.597 232.347M222.563 249.221L235.898 232.347M231.618 249.221L244.953 232.347'
                            stroke='black' stroke-width='1.26981' />
                        <path d='M169.553 236.216H250.386M165.931 240.661H247.176M161.98 244.612H244.13' stroke='black'
                            stroke-width='1.26981' />
                    </g>
                    <rect x='142.991' y='155.243' width='80.9474' height='61.5857' rx='2.53962' fill='#4B3183'
                        stroke='#2D1C46' stroke-width='1.26981' />
                    <path
                        d='M145.528 155.243H221.585C222.988 155.243 224.125 156.38 224.125 157.783V167.066H142.988V157.783C142.988 156.38 144.125 155.243 145.528 155.243Z'
                        fill='#7400E9' stroke='#2D1C46' stroke-width='1.26981' />
                    <circle cx='150.055' cy='161.539' r='1.54031' fill='#FF8484' />
                    <circle cx='154.825' cy='161.539' r='1.54031' fill='#85E08E' />
                    <circle cx='159.876' cy='161.539' r='1.54031' fill='#4B1E6D' />
                    <rect x='253.596' y='176.62' width='5.10351' height='4.77425' rx='0.634904' fill='#4B1E6D' />
                    <rect x='253.596' y='185.839' width='5.10351' height='4.77425' rx='0.634904' fill='#6C27FF' />
                    <path
                        d='M253.787 183.507C253.838 183.467 254.295 183.035 254.334 183.215C254.404 183.532 254.63 183.281 254.841 183.183C255.004 183.108 255.188 183.296 255.367 183.303C255.508 183.308 255.655 183.258 255.793 183.292C255.92 183.323 256.006 183.394 256.143 183.4C256.524 183.418 256.882 183.418 257.265 183.354C257.734 183.274 258.183 183.239 258.656 183.239'
                        stroke='black' stroke-width='0.317452' stroke-linecap='round' stroke-linejoin='round' />
                    <path
                        d='M253.787 192.726C253.838 192.686 254.295 192.255 254.334 192.434C254.404 192.751 254.63 192.5 254.841 192.402C255.004 192.327 255.188 192.515 255.367 192.522C255.508 192.527 255.655 192.477 255.793 192.511C255.92 192.542 256.006 192.613 256.143 192.62C256.524 192.637 256.882 192.638 257.265 192.573C257.734 192.494 258.183 192.458 258.656 192.458'
                        stroke='black' stroke-width='0.317452' stroke-linecap='round' stroke-linejoin='round' />
                    <rect x='178.094' y='203.496' width='25.7136' height='6.34904' rx='3.17452' fill='#7000FF' />
                    <rect opacity='0.25' x='150.476' y='203.496' width='25.7136' height='6.34904' rx='3.17452'
                        fill='#7000FF' />
                    <path d='M151.111 175.243H215.554' stroke='#2D1C46' stroke-width='1.26981' stroke-linecap='round' />
                    <path d='M151.111 179.687H215.554' stroke='#2D1C46' stroke-width='1.26981' stroke-linecap='round' />
                    <path d='M151.111 184.131H183.491' stroke='#2D1C46' stroke-width='1.26981' stroke-linecap='round' />
                    <defs>
                        <clipPath id='clip0_194_278'>
                            <rect width='382.052' height='254.701' fill='white'
                                transform='translate(0 272.432) rotate(-45.4857)' />
                        </clipPath>
                    </defs>
                </svg>
                <div class='success-heading'><h2>" . $_GET['message'] . "</h2>
                    
                </div>
                <div class='ok-btn'>
                    <form action= './adminApplication.php' method = 'POST'>
                        <button id='ok-btn'>Ok</button>
                    </form>    
                </div>
            </div>
        </div>
            
            ");
    } elseif (isset($_GET["adminAction"])) {
        echo ("
            <div id = 'modal-backdrop' class='modal-backdrop visible'>
            <div class='success-modal'>
                <svg width='450' height='451' viewBox='0 0 450 451' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path
                        d='M274.559 132.188C286.402 141.187 285.893 166.827 289.798 188.689C293.704 210.551 302.066 228.635 300.453 246.549C298.84 264.505 287.251 282.249 271.247 294.815C255.244 307.337 234.783 314.724 216.105 312.262C197.426 309.8 180.574 297.531 163.127 285.433C145.68 273.335 127.723 261.406 115.964 243.238C104.248 225.069 98.7297 200.618 109.894 186.354C121.101 172.091 148.991 168.058 169.197 161.733C189.361 155.408 201.841 146.833 220.18 138.768C238.518 130.702 262.715 123.146 274.559 132.188Z'
                        fill='#5826BD' />
                    <g clip-path='url(#clip0_194_278)'>
                        <path
                            d='M212.534 112.081C227.254 109.945 245.18 128.284 263.508 140.826C281.835 153.369 300.593 160.084 312.236 173.793C323.909 187.533 328.437 208.237 326.177 228.458C323.887 248.649 314.809 268.418 299.959 280.011C285.108 291.604 264.545 295.02 243.686 298.979C222.827 302.938 201.732 307.379 180.532 303.026C159.362 298.643 138.058 285.436 135.714 267.475C133.4 249.484 150.078 226.769 159.734 207.926C169.36 189.113 171.996 174.202 179.101 155.47C186.207 136.739 197.783 114.187 212.534 112.081Z'
                            fill='#5826BD' fill-opacity='0.56' />
                    </g>
                    <rect x='134.734' y='167.306' width='102.249' height='109.838' fill='#2D1C46' stroke='#2D1C46'
                        stroke-width='5.07923' />
                    <path
                        d='M261.537 169.517L264.815 170.871V228.219L261.371 229.654H220.176H175.538V169.517H220.176H261.537Z'
                        fill='#5826BD' stroke='black' stroke-width='1.26981' />
                    <path opacity='0.4'
                        d='M194.422 245.893L238.382 243.971L235.367 247.78L234.256 274.605H161.718L194.422 245.893Z'
                        fill='#5826BD' />
                    <rect x='171.752' y='169.517' width='89.2764' height='60.137' fill='#5826BD' stroke='black'
                        stroke-width='1.26981' />
                    <path
                        d='M260.908 230.614L261.498 235.947L236.659 267.842L140.464 265.965L139.86 262.143L172.226 233.55L260.908 230.614Z'
                        fill='#5826BD' stroke='black' stroke-width='1.26981' />
                    <rect x='171.752' y='174.621' width='89.2764' height='50.0946' fill='#2D1C46' stroke='black'
                        stroke-width='1.26981' />
                    <path d='M140.674 261.532L171.445 230.595H260.362L234.625 263.561L140.674 261.532Z' fill='#6C27FF'
                        stroke='black' stroke-width='1.26981' />
                    <path
                        d='M174.432 233.723H250.22C250.486 233.723 250.634 234.03 250.468 234.238L239.069 248.542C239.007 248.619 238.914 248.663 238.815 248.661L161.948 247.388C161.671 247.383 161.532 247.051 161.724 246.851L174.203 233.821C174.263 233.758 174.345 233.723 174.432 233.723Z'
                        fill='#2D1C46' stroke='black' stroke-width='1.26981' />
                    <path
                        d='M182.914 250.546L205.706 250.934C207.01 250.956 207.732 252.454 206.937 253.488L201.69 260.31C201.629 260.389 201.534 260.435 201.434 260.433L173.262 260.057C172.987 260.053 172.847 259.726 173.033 259.524L180.289 251.668C180.964 250.937 181.919 250.529 182.914 250.546Z'
                        fill='#5826BD' stroke='black' stroke-width='1.26981' />
                    <rect opacity='0.3' x='178.196' y='177.114' width='67.1688' height='44.9438' rx='3.49197'
                        fill='#9152E1' />
                    <mask id='mask0_194_278' style='mask-type:alpha' maskUnits='userSpaceOnUse' x='159' y='233' width='94'
                        height='17'>
                        <path d='M161.221 247.376L174.296 233.723H250.879L238.972 248.664L161.221 247.376Z' fill='#C4C4C4'
                            stroke='black' stroke-width='1.26981' />
                    </mask>
                    <g mask='url(#mask0_194_278)'>
                        <path
                            d='M168.977 249.221L182.312 232.347M178.031 249.221L191.366 232.347M191.366 244.529L200.668 232.347M199.845 244.529L209.722 232.347M207.747 244.529L217.542 232.347M213.262 249.221L226.597 232.347M222.563 249.221L235.898 232.347M231.618 249.221L244.953 232.347'
                            stroke='black' stroke-width='1.26981' />
                        <path d='M169.553 236.216H250.386M165.931 240.661H247.176M161.98 244.612H244.13' stroke='black'
                            stroke-width='1.26981' />
                    </g>
                    <rect x='142.991' y='155.243' width='80.9474' height='61.5857' rx='2.53962' fill='#4B3183'
                        stroke='#2D1C46' stroke-width='1.26981' />
                    <path
                        d='M145.528 155.243H221.585C222.988 155.243 224.125 156.38 224.125 157.783V167.066H142.988V157.783C142.988 156.38 144.125 155.243 145.528 155.243Z'
                        fill='#7400E9' stroke='#2D1C46' stroke-width='1.26981' />
                    <circle cx='150.055' cy='161.539' r='1.54031' fill='#FF8484' />
                    <circle cx='154.825' cy='161.539' r='1.54031' fill='#85E08E' />
                    <circle cx='159.876' cy='161.539' r='1.54031' fill='#4B1E6D' />
                    <rect x='253.596' y='176.62' width='5.10351' height='4.77425' rx='0.634904' fill='#4B1E6D' />
                    <rect x='253.596' y='185.839' width='5.10351' height='4.77425' rx='0.634904' fill='#6C27FF' />
                    <path
                        d='M253.787 183.507C253.838 183.467 254.295 183.035 254.334 183.215C254.404 183.532 254.63 183.281 254.841 183.183C255.004 183.108 255.188 183.296 255.367 183.303C255.508 183.308 255.655 183.258 255.793 183.292C255.92 183.323 256.006 183.394 256.143 183.4C256.524 183.418 256.882 183.418 257.265 183.354C257.734 183.274 258.183 183.239 258.656 183.239'
                        stroke='black' stroke-width='0.317452' stroke-linecap='round' stroke-linejoin='round' />
                    <path
                        d='M253.787 192.726C253.838 192.686 254.295 192.255 254.334 192.434C254.404 192.751 254.63 192.5 254.841 192.402C255.004 192.327 255.188 192.515 255.367 192.522C255.508 192.527 255.655 192.477 255.793 192.511C255.92 192.542 256.006 192.613 256.143 192.62C256.524 192.637 256.882 192.638 257.265 192.573C257.734 192.494 258.183 192.458 258.656 192.458'
                        stroke='black' stroke-width='0.317452' stroke-linecap='round' stroke-linejoin='round' />
                    <rect x='178.094' y='203.496' width='25.7136' height='6.34904' rx='3.17452' fill='#7000FF' />
                    <rect opacity='0.25' x='150.476' y='203.496' width='25.7136' height='6.34904' rx='3.17452'
                        fill='#7000FF' />
                    <path d='M151.111 175.243H215.554' stroke='#2D1C46' stroke-width='1.26981' stroke-linecap='round' />
                    <path d='M151.111 179.687H215.554' stroke='#2D1C46' stroke-width='1.26981' stroke-linecap='round' />
                    <path d='M151.111 184.131H183.491' stroke='#2D1C46' stroke-width='1.26981' stroke-linecap='round' />
                    <defs>
                        <clipPath id='clip0_194_278'>
                            <rect width='382.052' height='254.701' fill='white'
                                transform='translate(0 272.432) rotate(-45.4857)' />
                        </clipPath>
                    </defs>
                </svg>
                <div class='success-heading'><h2>" . $_GET['adminAction'] . "</h2>
                    
                </div>
                <div class='ok-btn'>
                    <form action= './adminApplication.php' method = 'POST'>
                        <button id='ok-btn'>Ok</button>
                    </form>    
                </div>
            </div>
        </div>
            
            ");
    }
    ?>
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
                    <a href='adminDash.php'>
                        <li class="menu-item">Clubs</li>
                    </a>
                    <li class="menu-item active">Applications</li>
                    <form action="../../server/handler.php" method="POST">
                        <input type='hidden' name='handlerMethod' value='adminLogOut'>
                        <button type='submit' class="logOutBtn">Log Out</button>
                    </form>
                </ul>
            </div>
        </div>
        <div class="taskbar-container"></div>
        <div class='dashboard'>
            <div class='summary'>
                <div class='statistic'>
                    <div class='category'>
                        <h2>Accepted Applications
                    </div>
                    <div class='value'>
                        <?php
                        $handler = new Handler();
                        echo ('<h1>' . $handler->getAllAcceptedCount() . '</h1>');
                        ?>
                    </div>
                </div>
                <div class='statistic'>
                    <div class='category'>
                        <h2>Pending Applications
                    </div>
                    <div class='value'>
                        <?php
                        echo ('<h1>' . $handler->getAllPendingCount() . '</h1>');
                        ?>
                    </div>
                </div>
                <div class='statistic'>
                    <div class='category'>
                        <h2>Rejected Applications
                    </div>
                    <div class='value'>
                        <?php
                        echo ('<h1>' . $handler->getAllRejectedCount() . '</h1>');
                        ?>
                    </div>
                </div>
            </div>
            <div class='horizontal'>
                <hr class='hr-line'>
            </div>
            <div class='application-container'>
                <div class='applications-heading'>
                    <h3>Appilcations</h3>
                </div>
                <div class="application-list">

                    <?php
                    $applications = $handler->getAllApplications();

                    if (empty($applications)) {
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
                            <h2>You have no record of application in the system.</h2>
                        </div>
                    </div>
                        ");
                    } else {
                        foreach ($applications as $key => $application) {

                            echo ("
                            <div class='application-record'>
                                <input type=hidden value='" . $application['application_id'] . "'>
                                <input type=hidden value='" . $application['student_fname'] . "'>
                                <input type=hidden value='" . $application['student_lname'] . "'>
                                <input type=hidden value='" . $application['club_id'] . "'>
                                <input type=hidden value='" . $application['club_name'] . "'>
                                <input type=hidden value='" . $application['date'] . "'>
                                <input type=hidden value='" . $application['application_status'] . "'>
                                <div class='application-id'>
                                    <p>#" . $application['application_id'] . "</p>
                                </div>
                                <div class='club-name'>
                                    <h1>" . $application['club_name'] . "</h1>
                                </div>
                                <div class='date'>
                                    <h1>" . $application['date'] . "</h1>
                                </div>
                                <div class='status'>
                                    <p>" . $application['application_status'] . "</p>
                                </div>
                                <div class='application-status'>
                                    <form action='../../server/handler.php' method = 'POST'>
                                        <input type = 'hidden' name = 'application_id' value =" . $application['application_id'] . ">
                                        <input type = 'hidden' name = 'handlerMethod' value = 'accept'>
                                        <button class='accept-btn' type = 'submit'>Accept</button> 
                                    </form>    
                                    <form action='../../server/handler.php' method = 'POST'>
                                        <input type = 'hidden' name = 'application_id' value =" . $application['application_id'] . ">
                                        <input type = 'hidden' name = 'handlerMethod' value = 'reject'>
                                        <button class='reject-btn' type = 'submit'>Reject</button>
                                    </form>    
                                </div>
                            </div>
                            ");
                        }
                    }

                    ?>

                </div>

            </div>
        </div>
    </div>
    <script src='../js/adminApplication.js'></script>
</body>

</html>
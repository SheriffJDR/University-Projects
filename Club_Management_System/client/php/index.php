<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Log In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../css/index.css'>
</head>

<body>
    <div class="index">
        <div class='back-splash'>
            <svg id='left-position' width="815" height="810" viewBox="0 0 815 810" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path id='splash-left'
                    d="M0 0C45.1 40.3 90.2 80.6 144.2 85.2C198.2 89.8 261.1 58.8 303.1 78.3C345.1 97.8 366.3 167.8 406.7 201.4C447.1 234.9 506.8 232 559.3 250.7C611.9 269.4 657.3 309.8 671 361.7C684.7 413.5 666.7 476.9 687.4 525.3C708.1 573.7 767.5 607 794.4 652C821.3 696.9 815.7 753.5 810 810H0V0Z"
                    fill="#2D1C46" />
                <path id='splash-left'
                    d="M0 270C30.1 296.9 60.1 323.7 96.1 326.8C132.1 329.9 174 309.2 202.1 322.2C230.1 335.2 244.2 381.9 271.1 404.2C298.1 426.6 337.8 424.6 372.9 437.1C407.9 449.6 438.2 476.5 447.3 511.1C456.5 545.7 444.4 587.9 458.2 620.2C472.1 652.4 511.7 674.7 529.6 704.7C547.6 734.6 543.8 772.3 540 810H0V270Z"
                    fill="#5826BD" />
                <path id='splash-left'
                    d="M0 540C15 553.4 30.1 566.9 48.1 568.4C66.1 569.9 87 559.6 101 566.1C115 572.6 122.1 595.9 135.6 607.1C149 618.3 168.9 617.3 186.4 623.6C204 629.8 219.1 643.3 223.7 660.6C228.2 677.8 222.2 699 229.1 715.1C236 731.2 255.8 742.3 264.8 757.3C273.8 772.3 271.9 791.2 270 810H0V540Z"
                    fill="#6C27FF" />
            </svg>
            <svg id='right-position' width="810" height="810" viewBox="0 0 810 810" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path id='splash-right'
                    d="M810 810C757.7 794 705.4 778 660.4 752.3C615.3 726.6 577.6 691.2 530.6 674.4C483.7 657.7 427.6 659.5 381.1 641.9C334.6 624.3 297.7 587.2 255.6 554.4C213.5 521.5 166.2 492.8 136.5 450C106.8 407.2 94.7 350.4 94 296.6C93.3 242.8 103.9 192.1 90.1 143.2C76.3 94.3 38.2 47.1 0 0H810V810Z"
                    fill="#2D1C46" />
                <path id='splash-right'
                    d="M810 540C775.1 529.3 740.3 518.6 710.2 501.5C680.2 484.4 655.1 460.8 623.8 449.6C592.5 438.4 555.1 439.7 524.1 427.9C493.1 416.2 468.5 391.5 440.4 369.6C412.4 347.7 380.8 328.5 361 300C341.2 271.5 333.2 233.6 332.7 197.7C332.2 161.9 339.3 128.1 330.1 95.5C320.9 62.9 295.4 31.4 270 0H810V540Z"
                    fill="#5826BD" />
                <path id='splash-right'
                    d="M810 270C792.6 264.7 775.1 259.3 760.1 250.8C745.1 242.2 732.5 230.4 716.9 224.8C701.2 219.2 682.5 219.8 667 214C651.5 208.1 639.2 195.7 625.2 184.8C611.2 173.8 595.4 164.3 585.5 150C575.6 135.7 571.6 116.8 571.3 98.9C571.1 80.9 574.6 64 570 47.7C565.4 31.4 552.7 15.7 540 0H810V270Z"
                    fill="#6C27FF" />
            </svg>
        </div>
        <div class="content-container">
            <div class="hero">
                <svg class='laptop' viewBox="0 0 330 310" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="6.27971" y="31.3988" width="252.832" height="271.597" fill="#2D1C46" stroke="#2D1C46"
                        stroke-width="12.5594" />
                    <path
                        d="M107.175 36.8657H217.552H319.825L327.929 40.2132V182.019L319.415 185.566H217.552H107.175V36.8657Z"
                        fill="#5826BD" stroke="black" stroke-width="3.13985" />
                    <path opacity="0.4"
                        d="M153.869 225.72L262.57 220.967L255.113 230.387L252.366 296.716H73.0015L153.869 225.72Z"
                        fill="#5826BD" />
                    <rect x="97.8124" y="36.8657" width="220.754" height="148.701" fill="#5826BD" stroke="black"
                        stroke-width="3.13985" />
                    <path
                        d="M18.9541 265.902L98.9841 195.2L318.27 187.939L319.727 201.126L258.309 279.994L20.4465 275.353L18.9541 265.902Z"
                        fill="#5826BD" stroke="black" stroke-width="3.13985" />
                    <rect x="97.8124" y="49.4853" width="220.754" height="123.869" fill="#2D1C46" stroke="black"
                        stroke-width="3.13985" />
                    <path d="M20.9657 264.391L97.0529 187.892H316.919L253.279 269.408L20.9657 264.391Z" fill="#6C27FF"
                        stroke="black" stroke-width="3.13985" />
                    <path
                        d="M103.873 195.869C104.021 195.714 104.226 195.627 104.44 195.627H291.841C292.499 195.627 292.865 196.387 292.455 196.901L264.268 232.27L265.495 233.248L264.268 232.27C264.116 232.46 263.884 232.569 263.641 232.565L73.571 229.417C72.8861 229.406 72.5433 228.584 73.017 228.089L103.873 195.869L102.739 194.783L103.873 195.869Z"
                        fill="#2D1C46" stroke="black" stroke-width="3.13985" />
                    <path
                        d="M118.923 240.001C120.593 238.194 122.953 237.184 125.413 237.226L181.771 238.184C184.996 238.239 186.782 241.945 184.815 244.501L171.841 261.368C171.69 261.564 171.456 261.678 171.208 261.675L101.547 260.743C100.868 260.734 100.52 259.925 100.981 259.426L118.923 240.001Z"
                        fill="#5826BD" stroke="black" stroke-width="3.13985" />
                    <rect opacity="0.3" x="113.747" y="55.6497" width="166.088" height="111.133" rx="8.63459"
                        fill="#9152E1" />
                    <mask id="mask0_21_93" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="68" y="194" width="229"
                        height="41">
                        <path d="M71.774 229.387L104.105 195.627H293.47L264.027 232.572L71.774 229.387Z" fill="#C4C4C4"
                            stroke="black" stroke-width="3.13985" />
                    </mask>
                    <g mask="url(#mask0_21_93)">
                        <path
                            d="M90.9507 233.95L123.924 192.225M113.34 233.95L146.313 192.225M146.313 222.349L169.313 192.225M167.278 222.349L191.703 192.225M186.818 222.349L211.039 192.225M200.455 233.95L233.428 192.225M223.455 233.95L256.428 192.225M245.844 233.95L278.818 192.225"
                            stroke="black" stroke-width="3.13985" />
                        <path d="M92.3753 201.791H292.251M83.4196 212.782H284.313M73.6497 222.552H276.782"
                            stroke="black" stroke-width="3.13985" />
                    </g>
                    <rect x="26.6952" y="1.56999" width="200.159" height="152.283" rx="6.27971" fill="#4B3183"
                        stroke="#2D1C46" stroke-width="3.13985" />
                    <path
                        d="M26.6886 7.84994C26.6886 4.38175 29.5001 1.57023 32.9683 1.57023H221.035C224.503 1.57023 227.315 4.38175 227.315 7.84994V30.8045H26.6886V7.84994Z"
                        fill="#7400E9" stroke="#2D1C46" stroke-width="3.13985" />
                    <circle cx="44.162" cy="17.1393" r="3.80871" fill="#FF8484" />
                    <circle cx="55.9576" cy="17.1393" r="3.80871" fill="#85E08E" />
                    <circle cx="68.4469" cy="17.1393" r="3.80871" fill="#4B1E6D" />
                    <rect x="300.189" y="54.4285" width="12.6195" height="11.8053" rx="1.56993" fill="#4B1E6D" />
                    <rect x="300.189" y="77.225" width="12.6195" height="11.8053" rx="1.56993" fill="#6C27FF" />
                    <path
                        d="M300.661 71.4585C300.786 71.3593 301.917 70.2924 302.014 70.7369C302.185 71.5202 302.744 70.8998 303.268 70.6579C303.67 70.4724 304.126 70.9358 304.568 70.9529C304.915 70.9662 305.278 70.8424 305.622 70.9265C305.935 71.0031 306.146 71.1796 306.485 71.1951C307.429 71.2383 308.314 71.2394 309.261 71.0793C310.419 70.8836 311.53 70.7949 312.7 70.7949"
                        stroke="black" stroke-width="0.784963" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M300.661 94.255C300.786 94.1558 301.917 93.089 302.014 93.5334C302.185 94.3167 302.744 93.6963 303.268 93.4544C303.67 93.2689 304.126 93.7323 304.568 93.7494C304.915 93.7627 305.278 93.6389 305.622 93.723C305.935 93.7996 306.146 93.9761 306.485 93.9916C307.429 94.0349 308.314 94.0359 309.261 93.8758C310.419 93.6801 311.53 93.5914 312.7 93.5914"
                        stroke="black" stroke-width="0.784963" stroke-linecap="round" stroke-linejoin="round" />
                    <rect x="113.495" y="120.884" width="63.582" height="15.6993" rx="7.84963" fill="#7000FF" />
                    <rect opacity="0.25" x="45.2034" y="120.884" width="63.582" height="15.6993" rx="7.84963"
                        fill="#7000FF" />
                    <path d="M46.7734 51.0229H206.121" stroke="#2D1C46" stroke-width="3.13985" stroke-linecap="round" />
                    <path d="M46.7734 62.0124H206.121" stroke="#2D1C46" stroke-width="3.13985" stroke-linecap="round" />
                    <path d="M46.7734 73.0019H126.84" stroke="#2D1C46" stroke-width="3.13985" stroke-linecap="round" />
                </svg>
                <svg class='blob below' viewBox="0 0 1060 1050" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_21_83)">
                        <path
                            d="M501.253 250.82C535.931 245.788 578.159 288.989 621.332 318.535C664.506 348.081 708.694 363.899 736.122 396.195C763.621 428.56 774.288 477.333 768.964 524.968C763.569 572.533 742.184 619.102 707.2 646.411C672.216 673.72 623.775 681.768 574.638 691.094C525.501 700.421 475.807 710.883 425.867 700.629C375.998 690.303 325.81 659.191 320.29 616.88C314.839 574.499 354.126 520.989 376.873 476.601C399.55 432.283 405.758 397.157 422.496 353.031C439.235 308.906 466.504 255.781 501.253 250.82Z"
                            fill="#5826BD" fill-opacity="0.56" />
                    </g>
                    <defs>
                        <clipPath id="clip0_21_83">
                            <rect width="900" height="600" fill="white"
                                transform="translate(0.587891 628.558) rotate(-45.4857)" />
                        </clipPath>
                    </defs>
                </svg>
                <svg class='blob untop' width="900" height="600" viewBox="0 0 900 600" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M620.366 92.1846C648.266 113.385 647.066 173.785 656.266 225.285C665.466 276.785 685.166 319.385 681.366 361.585C677.566 403.885 650.266 445.685 612.566 475.285C574.866 504.785 526.666 522.185 482.666 516.385C438.666 510.585 398.966 481.685 357.866 453.185C316.766 424.685 274.466 396.585 246.766 353.785C219.166 310.985 206.166 253.385 232.466 219.785C258.866 186.185 324.566 176.685 372.166 161.785C419.666 146.885 449.066 126.685 492.266 107.685C535.466 88.6846 592.466 70.8846 620.366 92.1846Z"
                        fill="#5826BD" />
                </svg>

            </div>
            <div class='login'>
                <div class="heading">
                    <h1>Student Login</h1>
                </div>
                <div class="error">
                    <?php
                        if(isset($_GET)){
                            foreach($_GET as $key => $value){
                                echo'<h2>'. ($value). '</h2>';
                            }
                        }
                    ?>
                </div>
                <div class="form-container">
                    <form action='../../server/validate.php' method='POST'>
                        <div class="label-container">
                            <label class='label-default' for='studentId'>Student ID</label>
                        </div>
                        <div class='input-container'>
                            <input class='input-default' name='studentId'>
                        </div>
                        <div class="label-container">
                            <label class='label-default' for='passsword' >Password</label>
                        </div>
                        <div class='input-container'>
                            <input class='input-default' type='password' name='password'>
                        </div>
                        <div class="login-btn">
                            <input type='hidden' name='validationType' value='student'>
                            <button type='submit'>Login</button>
                        </div>
                    </form>
                </div>
                <div class="login-mode">
                    <a href='admin.php'>
                        <div class="mode-btn">
                            <h3>Log In As Admin</h3>
                        </div>
                    </a>
                    <a href='#'>
                        <div class="mode-btn">
                            <h3>Log In As Student</h3>
                        </div>
                    </a>
                </div>
                <div class="name">
                    <h2>Student Information System.</h2>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
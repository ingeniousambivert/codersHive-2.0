<!-- PHP -->

<?php
// Starting the session
session_start();
$id = $_SESSION['id'];
include('../db/db.php');
if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
  header("Location:../index.php");
  // To check if the user is logged in 
} else {
  // Destroying session if 30 mins have passed after logging in 
  $now = time();
  if ($now > $_SESSION['expire']) {
    session_destroy();
    header("Location:../index.php");
  }
}
include("../partials/header.php");
?>

<body>

  <!-- Start your project here-->

  <!-- Card -->
  <div class="card" style="margin: 10%">

    <!-- Card content -->
    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title"><a>Inherited</a></h4>
      <!-- Text -->
      <p class="card-text">
        <div class="challenge-body-html">
          <div class="challenge_problem_statement">
            <div class="msB challenge_problem_statement_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }

                  .MathJax_SVG_LineBox {
                    display: table !important
                  }

                  .MathJax_SVG_LineBox span {
                    display: table-cell !important;
                    width: 10000em !important;
                    min-width: 0;
                    max-width: none;
                    padding: 0;
                    border: 0;
                    margin: 0
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <p>You inherited a piece of code that performs username validation for your company's website. The
                  existing function works reasonably well, but it throws an exception when the username is too short.
                  Upon review, you realize that nobody ever defined the exception. </p>

                <p>The inherited code is provided for you in the locked section of your editor. Complete the code so
                  that, when an exception is thrown, it prints <code>Too short: n</code> (where <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="1.395ex" height="1.676ex" style="vertical-align: -0.338ex;" viewBox="0 -576.1 600.5 721.6" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M21 287Q22 293 24 303T36 341T56 388T89 425T135 442Q171 442 195 424T225 390T231 369Q231 367 232 367L243 378Q304 442 382 442Q436 442 469 415T503 336T465 179T427 52Q427 26 444 26Q450 26 453 27Q482 32 505 65T540 145Q542 153 560 153Q580 153 580 145Q580 144 576 130Q568 101 554 73T508 17T439 -10Q392 -10 371 17T350 73Q350 92 386 193T423 345Q423 404 379 404H374Q288 404 229 303L222 291L189 157Q156 26 151 16Q138 -11 108 -11Q95 -11 87 -5T76 7T74 17Q74 30 112 180T152 343Q153 348 153 366Q153 405 129 405Q91 405 66 305Q60 285 60 284Q58 278 41 278H27Q21 284 21 287Z"></path>
                      </g>
                    </svg></span> is the length of the given username). </p>
              </div>
            </div>
          </div>
          <div class="challenge_input_format">
            <div class="msB challenge_input_format_title">
              <p><strong>Input Format</strong></p>
            </div>
            <div class="msB challenge_input_format_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }

                  .MathJax_SVG_LineBox {
                    display: table !important
                  }

                  .MathJax_SVG_LineBox span {
                    display: table-cell !important;
                    width: 10000em !important;
                    min-width: 0;
                    max-width: none;
                    padding: 0;
                    border: 0;
                    margin: 0
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <p>The first line contains an integer, <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="0.84ex" height="2.009ex" style="vertical-align: -0.338ex;" viewBox="0 -719.6 361.5 865.1" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M26 385Q19 392 19 395Q19 399 22 411T27 425Q29 430 36 430T87 431H140L159 511Q162 522 166 540T173 566T179 586T187 603T197 615T211 624T229 626Q247 625 254 615T261 596Q261 589 252 549T232 470L222 433Q222 431 272 431H323Q330 424 330 420Q330 398 317 385H210L174 240Q135 80 135 68Q135 26 162 26Q197 26 230 60T283 144Q285 150 288 151T303 153H307Q322 153 322 145Q322 142 319 133Q314 117 301 95T267 48T216 6T155 -11Q125 -11 98 4T59 56Q57 64 57 83V101L92 241Q127 382 128 383Q128 385 77 385H26Z"></path>
                      </g>
                    </svg></span>, the number of test cases. <br>
                  Each of the <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-2-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="0.84ex" height="2.009ex" style="vertical-align: -0.338ex;" viewBox="0 -719.6 361.5 865.1" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M26 385Q19 392 19 395Q19 399 22 411T27 425Q29 430 36 430T87 431H140L159 511Q162 522 166 540T173 566T179 586T187 603T197 615T211 624T229 626Q247 625 254 615T261 596Q261 589 252 549T232 470L222 433Q222 431 272 431H323Q330 424 330 420Q330 398 317 385H210L174 240Q135 80 135 68Q135 26 162 26Q197 26 230 60T283 144Q285 150 288 151T303 153H307Q322 153 322 145Q322 142 319 133Q314 117 301 95T267 48T216 6T155 -11Q125 -11 98 4T59 56Q57 64 57 83V101L92 241Q127 382 128 383Q128 385 77 385H26Z"></path>
                      </g>
                    </svg></span> subsequent lines describes a test case as a single username string, <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-3-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="1.33ex" height="1.676ex" style="vertical-align: -0.338ex;" viewBox="0 -576.1 572.5 721.6" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M21 287Q21 295 30 318T55 370T99 420T158 442Q204 442 227 417T250 358Q250 340 216 246T182 105Q182 62 196 45T238 27T291 44T328 78L339 95Q341 99 377 247Q407 367 413 387T427 416Q444 431 463 431Q480 431 488 421T496 402L420 84Q419 79 419 68Q419 43 426 35T447 26Q469 29 482 57T512 145Q514 153 532 153Q551 153 551 144Q550 139 549 130T540 98T523 55T498 17T462 -8Q454 -10 438 -10Q372 -10 347 46Q345 45 336 36T318 21T296 6T267 -6T233 -11Q189 -11 155 7Q103 38 103 113Q103 170 138 262T173 379Q173 380 173 381Q173 390 173 393T169 400T158 404H154Q131 404 112 385T82 344T65 302T57 280Q55 278 41 278H27Q21 284 21 287Z"></path>
                      </g>
                    </svg></span>.</p>
              </div>
            </div>
          </div>
          <div class="challenge_constraints">
            <div class="msB challenge_constraints_title">
              <p><strong>Constraints</strong></p>
            </div>
            <div class="msB challenge_constraints_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }

                  .MathJax_SVG_LineBox {
                    display: table !important
                  }

                  .MathJax_SVG_LineBox span {
                    display: table-cell !important;
                    width: 10000em !important;
                    min-width: 0;
                    max-width: none;
                    padding: 0;
                    border: 0;
                    margin: 0
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <ul>
                  <li><span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="12.849ex" height="2.343ex" style="vertical-align: -0.505ex;" viewBox="0 -791.3 5532.1 1008.6" role="img" focusable="false">
                        <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                          <path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path>
                          <g transform="translate(778,0)">
                            <path stroke-width="1" d="M674 636Q682 636 688 630T694 615T687 601Q686 600 417 472L151 346L399 228Q687 92 691 87Q694 81 694 76Q694 58 676 56H670L382 192Q92 329 90 331Q83 336 83 348Q84 359 96 365Q104 369 382 500T665 634Q669 636 674 636ZM84 -118Q84 -108 99 -98H678Q694 -104 694 -118Q694 -130 679 -138H98Q84 -131 84 -118Z"></path>
                          </g>
                          <g transform="translate(1834,0)">
                            <path stroke-width="1" d="M26 385Q19 392 19 395Q19 399 22 411T27 425Q29 430 36 430T87 431H140L159 511Q162 522 166 540T173 566T179 586T187 603T197 615T211 624T229 626Q247 625 254 615T261 596Q261 589 252 549T232 470L222 433Q222 431 272 431H323Q330 424 330 420Q330 398 317 385H210L174 240Q135 80 135 68Q135 26 162 26Q197 26 230 60T283 144Q285 150 288 151T303 153H307Q322 153 322 145Q322 142 319 133Q314 117 301 95T267 48T216 6T155 -11Q125 -11 98 4T59 56Q57 64 57 83V101L92 241Q127 382 128 383Q128 385 77 385H26Z"></path>
                          </g>
                          <g transform="translate(2473,0)">
                            <path stroke-width="1" d="M674 636Q682 636 688 630T694 615T687 601Q686 600 417 472L151 346L399 228Q687 92 691 87Q694 81 694 76Q694 58 676 56H670L382 192Q92 329 90 331Q83 336 83 348Q84 359 96 365Q104 369 382 500T665 634Q669 636 674 636ZM84 -118Q84 -108 99 -98H678Q694 -104 694 -118Q694 -130 679 -138H98Q84 -131 84 -118Z"></path>
                          </g>
                          <g transform="translate(3530,0)">
                            <path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path>
                            <path stroke-width="1" d="M96 585Q152 666 249 666Q297 666 345 640T423 548Q460 465 460 320Q460 165 417 83Q397 41 362 16T301 -15T250 -22Q224 -22 198 -16T137 16T82 83Q39 165 39 320Q39 494 96 585ZM321 597Q291 629 250 629Q208 629 178 597Q153 571 145 525T137 333Q137 175 145 125T181 46Q209 16 250 16Q290 16 318 46Q347 76 354 130T362 333Q362 478 354 524T321 597Z" transform="translate(500,0)"></path>
                            <path stroke-width="1" d="M96 585Q152 666 249 666Q297 666 345 640T423 548Q460 465 460 320Q460 165 417 83Q397 41 362 16T301 -15T250 -22Q224 -22 198 -16T137 16T82 83Q39 165 39 320Q39 494 96 585ZM321 597Q291 629 250 629Q208 629 178 597Q153 571 145 525T137 333Q137 175 145 125T181 46Q209 16 250 16Q290 16 318 46Q347 76 354 130T362 333Q362 478 354 524T321 597Z" transform="translate(1001,0)"></path>
                            <path stroke-width="1" d="M96 585Q152 666 249 666Q297 666 345 640T423 548Q460 465 460 320Q460 165 417 83Q397 41 362 16T301 -15T250 -22Q224 -22 198 -16T137 16T82 83Q39 165 39 320Q39 494 96 585ZM321 597Q291 629 250 629Q208 629 178 597Q153 571 145 525T137 333Q137 175 145 125T181 46Q209 16 250 16Q290 16 318 46Q347 76 354 130T362 333Q362 478 354 524T321 597Z" transform="translate(1501,0)"></path>
                          </g>
                        </g>
                      </svg></span> </li>
                  <li><span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-2-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="13.47ex" height="2.843ex" style="vertical-align: -0.838ex;" viewBox="0 -863.1 5799.6 1223.9" role="img" focusable="false">
                        <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                          <path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path>
                          <g transform="translate(778,0)">
                            <path stroke-width="1" d="M674 636Q682 636 688 630T694 615T687 601Q686 600 417 472L151 346L399 228Q687 92 691 87Q694 81 694 76Q694 58 676 56H670L382 192Q92 329 90 331Q83 336 83 348Q84 359 96 365Q104 369 382 500T665 634Q669 636 674 636ZM84 -118Q84 -108 99 -98H678Q694 -104 694 -118Q694 -130 679 -138H98Q84 -131 84 -118Z"></path>
                          </g>
                          <g transform="translate(1834,0)">
                            <path stroke-width="1" d="M139 -249H137Q125 -249 119 -235V251L120 737Q130 750 139 750Q152 750 159 735V-235Q151 -249 141 -249H139Z"></path>
                          </g>
                          <g transform="translate(2113,0)">
                            <path stroke-width="1" d="M21 287Q21 295 30 318T55 370T99 420T158 442Q204 442 227 417T250 358Q250 340 216 246T182 105Q182 62 196 45T238 27T291 44T328 78L339 95Q341 99 377 247Q407 367 413 387T427 416Q444 431 463 431Q480 431 488 421T496 402L420 84Q419 79 419 68Q419 43 426 35T447 26Q469 29 482 57T512 145Q514 153 532 153Q551 153 551 144Q550 139 549 130T540 98T523 55T498 17T462 -8Q454 -10 438 -10Q372 -10 347 46Q345 45 336 36T318 21T296 6T267 -6T233 -11Q189 -11 155 7Q103 38 103 113Q103 170 138 262T173 379Q173 380 173 381Q173 390 173 393T169 400T158 404H154Q131 404 112 385T82 344T65 302T57 280Q55 278 41 278H27Q21 284 21 287Z"></path>
                          </g>
                          <g transform="translate(2685,0)">
                            <path stroke-width="1" d="M139 -249H137Q125 -249 119 -235V251L120 737Q130 750 139 750Q152 750 159 735V-235Q151 -249 141 -249H139Z"></path>
                          </g>
                          <g transform="translate(3241,0)">
                            <path stroke-width="1" d="M674 636Q682 636 688 630T694 615T687 601Q686 600 417 472L151 346L399 228Q687 92 691 87Q694 81 694 76Q694 58 676 56H670L382 192Q92 329 90 331Q83 336 83 348Q84 359 96 365Q104 369 382 500T665 634Q669 636 674 636ZM84 -118Q84 -108 99 -98H678Q694 -104 694 -118Q694 -130 679 -138H98Q84 -131 84 -118Z"></path>
                          </g>
                          <g transform="translate(4298,0)">
                            <path stroke-width="1" d="M213 578L200 573Q186 568 160 563T102 556H83V602H102Q149 604 189 617T245 641T273 663Q275 666 285 666Q294 666 302 660V361L303 61Q310 54 315 52T339 48T401 46H427V0H416Q395 3 257 3Q121 3 100 0H88V46H114Q136 46 152 46T177 47T193 50T201 52T207 57T213 61V578Z"></path>
                            <path stroke-width="1" d="M96 585Q152 666 249 666Q297 666 345 640T423 548Q460 465 460 320Q460 165 417 83Q397 41 362 16T301 -15T250 -22Q224 -22 198 -16T137 16T82 83Q39 165 39 320Q39 494 96 585ZM321 597Q291 629 250 629Q208 629 178 597Q153 571 145 525T137 333Q137 175 145 125T181 46Q209 16 250 16Q290 16 318 46Q347 76 354 130T362 333Q362 478 354 524T321 597Z" transform="translate(500,0)"></path>
                            <path stroke-width="1" d="M96 585Q152 666 249 666Q297 666 345 640T423 548Q460 465 460 320Q460 165 417 83Q397 41 362 16T301 -15T250 -22Q224 -22 198 -16T137 16T82 83Q39 165 39 320Q39 494 96 585ZM321 597Q291 629 250 629Q208 629 178 597Q153 571 145 525T137 333Q137 175 145 125T181 46Q209 16 250 16Q290 16 318 46Q347 76 354 130T362 333Q362 478 354 524T321 597Z" transform="translate(1001,0)"></path>
                          </g>
                        </g>
                      </svg></span> </li>
                  <li>The username consists only of uppercase and lowercase letters.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="challenge_output_format">
            <div class="msB challenge_output_format_title">
              <p><strong>Output Format</strong></p>
            </div>
            <div class="msB challenge_output_format_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }

                  .MathJax_SVG_LineBox {
                    display: table !important
                  }

                  .MathJax_SVG_LineBox span {
                    display: table-cell !important;
                    width: 10000em !important;
                    min-width: 0;
                    max-width: none;
                    padding: 0;
                    border: 0;
                    margin: 0
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <p>You are not responsible for directly printing anything to stdout. If your code is correct, the
                  locked stub code in your editor will print either <code>Valid</code> (if the username is valid),
                  <code>Invalid</code> (if the username is invalid), or <code>Too short: n</code> (where <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="1.395ex" height="1.676ex" style="vertical-align: -0.338ex;" viewBox="0 -576.1 600.5 721.6" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M21 287Q22 293 24 303T36 341T56 388T89 425T135 442Q171 442 195 424T225 390T231 369Q231 367 232 367L243 378Q304 442 382 442Q436 442 469 415T503 336T465 179T427 52Q427 26 444 26Q450 26 453 27Q482 32 505 65T540 145Q542 153 560 153Q580 153 580 145Q580 144 576 130Q568 101 554 73T508 17T439 -10Q392 -10 371 17T350 73Q350 92 386 193T423 345Q423 404 379 404H374Q288 404 229 303L222 291L189 157Q156 26 151 16Q138 -11 108 -11Q95 -11 87 -5T76 7T74 17Q74 30 112 180T152 343Q153 348 153 366Q153 405 129 405Q91 405 66 305Q60 285 60 284Q58 278 41 278H27Q21 284 21 287Z"></path>
                      </g>
                    </svg></span> is the length of the too-short username) on a new line for each test case.</p>
              </div>
            </div>
          </div>
          <div class="challenge_sample_input">
            <div class="msB challenge_sample_input_title">
              <p><strong>Sample Input</strong></p>
            </div>
            <div class="msB challenge_sample_input_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <pre><code>3
            Peter
            Me
            Arxwwz
            </code></pre>
              </div>
            </div>
          </div>
          <div class="challenge_sample_output">
            <div class="msB challenge_sample_output_title">
              <p><strong>Sample Output</strong></p>
            </div>
            <div class="msB challenge_sample_output_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <pre><code>Valid
            Too short: 2
            Invalid
            </code></pre>
              </div>
            </div>
          </div>
          <div class="challenge_explanation">
            <div class="msB challenge_explanation_title">
              <p><strong>Explanation</strong></p>
            </div>
            <div class="msB challenge_explanation_body">
              <div class="hackdown-content">
                <style id="MathJax_SVG_styles">
                  .MathJax_SVG_Display {
                    text-align: center;
                    margin: 1em 0em;
                    position: relative;
                    display: block !important;
                    text-indent: 0;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    width: 100%
                  }

                  .MathJax_SVG .MJX-monospace {
                    font-family: monospace
                  }

                  .MathJax_SVG .MJX-sans-serif {
                    font-family: sans-serif
                  }

                  .MathJax_SVG {
                    display: inline;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    font-size: 100%;
                    font-size-adjust: none;
                    text-indent: 0;
                    text-align: left;
                    text-transform: none;
                    letter-spacing: normal;
                    word-spacing: normal;
                    word-wrap: normal;
                    white-space: nowrap;
                    float: none;
                    direction: ltr;
                    max-width: none;
                    max-height: none;
                    min-width: 0;
                    min-height: 0;
                    border: 0;
                    padding: 0;
                    margin: 0
                  }

                  .MathJax_SVG * {
                    transition: none;
                    -webkit-transition: none;
                    -moz-transition: none;
                    -ms-transition: none;
                    -o-transition: none
                  }

                  .mjx-svg-href {
                    fill: blue;
                    stroke: blue
                  }
                </style><svg style="display: none;">
                  <defs id="MathJax_SVG_glyphs"></defs>
                </svg>
                <p>Username <code>Me</code> is too short because it only contains <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-1-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="1.162ex" height="2.176ex" style="vertical-align: -0.338ex;" viewBox="0 -791.3 500.5 936.9" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M109 429Q82 429 66 447T50 491Q50 562 103 614T235 666Q326 666 387 610T449 465Q449 422 429 383T381 315T301 241Q265 210 201 149L142 93L218 92Q375 92 385 97Q392 99 409 186V189H449V186Q448 183 436 95T421 3V0H50V19V31Q50 38 56 46T86 81Q115 113 136 137Q145 147 170 174T204 211T233 244T261 278T284 308T305 340T320 369T333 401T340 431T343 464Q343 527 309 573T212 619Q179 619 154 602T119 569T109 550Q109 549 114 549Q132 549 151 535T170 489Q170 464 154 447T109 429Z"></path>
                      </g>
                    </svg></span> characters, so your exception prints <span style="font-size: 100%; display: inline-block;" class="MathJax_SVG" id="MathJax-Element-2-Frame"><svg xmlns:xlink="http://www.w3.org/1999/xlink" width="14.644ex" height="2.009ex" style="vertical-align: -0.338ex;" viewBox="0 -719.6 6305 865.1" role="img" focusable="false">
                      <g stroke="currentColor" fill="currentColor" stroke-width="0" transform="matrix(1 0 0 -1 0 0)">
                        <path stroke-width="1" d="M129 38Q129 51 129 55T135 65T151 76H220V535H110V501Q110 470 109 464T101 450Q93 442 68 442H60Q37 442 28 461Q26 466 26 527L27 589Q36 607 49 610H55Q61 610 72 610T97 610T131 610T170 611T215 611T264 611H476Q478 609 483 606T489 602T493 598T496 593T497 586T498 576T498 562V526V488Q498 452 480 444Q476 442 456 442Q431 442 423 450Q416 457 415 463T414 501V535H304V76H374Q389 67 392 61T396 38Q396 10 374 1H151Q140 5 135 11T130 21T129 38Z"></path>
                        <path stroke-width="1" d="M52 216Q52 318 118 379T261 440Q343 440 407 378T472 216Q472 121 410 58T262 -6Q176 -6 114 58T52 216ZM388 225Q388 281 351 322T261 364Q213 364 175 325T136 225Q136 158 174 114T262 70T350 114T388 225Z" transform="translate(525,0)"></path>
                        <path stroke-width="1" d="M52 216Q52 318 118 379T261 440Q343 440 407 378T472 216Q472 121 410 58T262 -6Q176 -6 114 58T52 216ZM388 225Q388 281 351 322T261 364Q213 364 175 325T136 225Q136 158 174 114T262 70T350 114T388 225Z" transform="translate(1051,0)"></path>
                        <path stroke-width="1" d="M72 317Q72 361 108 396T229 439Q231 439 245 439T268 440Q303 439 324 435T353 427T363 423L372 432Q380 440 397 440Q430 440 430 395Q430 390 430 380T429 366V335Q429 311 422 302T387 293Q364 293 355 300T346 316T343 336T325 353Q306 364 257 364Q209 364 178 351T147 317Q147 284 231 272Q327 256 357 247Q458 210 458 129V121Q458 74 413 34T271 -6Q246 -6 224 -3T189 5T165 14T150 22T144 26Q142 23 139 18T135 11T132 6T128 1T124 -2T119 -4T113 -5T104 -6Q84 -6 78 6T71 43Q71 48 71 60T72 79Q72 132 73 141T81 157Q90 166 115 166Q135 166 142 162T157 140Q168 108 191 90T260 70Q297 70 323 76T361 91T379 110T384 129Q384 157 346 171T247 195T165 212Q119 228 96 256T72 317Z" transform="translate(2101,0)"></path>
                        <path stroke-width="1" d="M4 573Q4 596 15 603T52 611H90H124Q146 611 155 608T171 591Q173 586 173 489Q173 394 175 394L186 402Q197 410 219 420T269 434Q278 436 306 436Q343 436 371 423Q411 402 423 365T436 265Q436 257 436 239T435 211V198V76H498Q512 67 516 60T520 38Q520 9 498 1H308Q286 10 286 32V38V46Q286 65 303 73Q309 76 329 76H351V188Q351 204 351 230T352 266Q352 321 341 341T288 361Q253 361 222 341T176 274L174 264L173 170V76H236Q250 67 254 60T258 38Q258 9 236 1H27Q4 8 4 38Q4 53 8 60T27 76H89V535H58L27 536Q4 543 4 573Z" transform="translate(2627,0)"></path>
                        <path stroke-width="1" d="M52 216Q52 318 118 379T261 440Q343 440 407 378T472 216Q472 121 410 58T262 -6Q176 -6 114 58T52 216ZM388 225Q388 281 351 322T261 364Q213 364 175 325T136 225Q136 158 174 114T262 70T350 114T388 225Z" transform="translate(3152,0)"></path>
                        <path stroke-width="1" d="M327 76Q359 76 369 70T380 38Q380 10 359 1H47Q24 8 24 38Q24 54 28 61T47 76H145V355H96L47 356Q24 363 24 393Q24 409 28 416T47 431H207Q223 419 226 414T229 393V387V369Q297 437 394 437Q436 437 461 417T487 368Q487 347 473 332T438 317Q428 317 420 320T407 327T398 337T393 347T390 356L388 361Q348 356 324 345Q228 299 228 170Q228 161 228 151T229 138V76H293H327Z" transform="translate(3678,0)"></path>
                        <path stroke-width="1" d="M25 395Q26 405 26 408T29 416T35 423T48 431H145V481L146 532Q154 547 161 550T184 554H189Q218 554 227 534Q229 529 229 480V431H405Q406 430 411 427T418 422T422 416T426 407T427 393Q427 387 427 382T424 374T421 368T417 363T413 360T408 358L405 356L317 355H229V249Q229 237 229 214T228 179Q228 126 241 98T295 70Q354 70 365 149Q366 167 375 174Q383 182 407 182H415Q438 182 446 166Q448 161 448 148Q448 84 398 39T282 -6Q226 -6 189 29T146 128Q145 134 145 247V355H96H72Q45 355 35 362T25 395Z" transform="translate(4203,0)"></path>
                        <path stroke-width="1" d="M193 361Q193 396 214 413T258 431Q291 431 311 411T332 361Q332 335 314 314T262 292Q234 292 214 309T193 361ZM193 70Q193 105 214 122T258 140Q291 140 311 120T332 70Q332 44 314 23T262 1Q234 1 214 18T193 70Z" transform="translate(4729,0)"></path>
                        <path stroke-width="1" d="M52 462Q52 528 110 575T247 622H250Q343 622 407 565T472 421Q472 371 446 324T390 248T308 178Q307 177 275 151T214 101L185 77Q185 76 286 76H388V87Q388 105 397 114T430 123T463 114Q470 107 471 100T472 61V42Q472 24 468 16T450 1H75Q53 10 53 32V38V48Q53 57 63 67T127 122Q153 144 169 157L289 256Q388 345 388 419Q388 473 346 509T231 545H224Q176 545 146 499L144 494Q155 476 155 459Q154 459 155 455T154 444T148 430T136 417T114 408Q113 408 110 408T104 407Q80 407 66 422T52 462Z" transform="translate(5779,0)"></path>
                      </g>
                    </svg></span>. <br>
                  All other validation is handled by the locked code in your editor.</p>
              </div>
            </div>
          </div>
        </div>
      </p>
      <!-- Button -->

      <div id="upload-btn-wrapper">
        <button id="btn">Upload a file</button>
        <input type="file" name="myfile" />
      </div>
      <style>
        #upload-btn-wrapper {
          position: relative;
          overflow: hidden;
          display: inline-block;
        }

        #btn {
          border: 2px solid darkgray;
          color: gray;
          background-color: white;
          padding: 8px 20px;
          border-radius: 6px;
          font-size: 15px;
          font-weight: bold;
        }

        #upload-btn-wrapper input[type=file] {
          font-size: 100px;
          position: absolute;
          left: 0;
          top: 0;
          opacity: 0;
        }

        html {
          overflow: scroll;
          overflow-x: hidden;
        }

        ::-webkit-scrollbar {
          width: 0px;
          background: transparent;

        }
      </style>

    </div>

  </div>
  <!-- Card -->
  <?php
  include("../partials/footer.php");
  ?>
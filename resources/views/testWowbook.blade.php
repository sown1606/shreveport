
<!doctype html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <meta charset="utf-8">
    <style>
        .js #features {
            margin-left: -12000px; width: 100%;
        }
    </style>
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title></title>
    <meta name="description" content="">
    <meta name="author" content="Marcio Aguiar">

    <!--  Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS : implied media="all" -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/wow_book.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/preview.css"><!-- Uncomment if you are specifically targeting less enabled mobile browsers
	<link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

    <link href='//fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <script src="js/modernizr-1.6.min.js"></script>

</head>
<body>
<div id="container">
    <nav>
        <ul>
            <li><a id='first' class="wowbook-first"    href="#" title='goto first page'   >First page</a></li>
            <li><a id='back'  class="wowbook-back"    href="#" title='go back one page'  >Back</a></li>
            <li><a id='next'  class="wowbook-next"    href="#" title='go foward one page'>Next</a></li>
            <li><a id='last'   class="wowbook-last"   href="#" title='goto last page'    >last page</a></li>
            <li><a id='zoomin' class="wowbook-zoomin"   href="#" title='zoom in'           >Zoom In</a></li>
            <li><a id='zoomout' class="wowbook-zoomout"  href="#" title='zoom out'          >Zoom Out</a></li>
            <li><a id='slideshow' class="wowbook-slideshow" href="#" title='start slideshow'   >Slide Show</a></li>
            <li><a id='flipsound' class="wowbook-flipsound" href="#" title='flip sound on/off' >Flip sound</a></li>
            <li><a id='fullscreen' class="wowbook-fullscreen" href="#" title='fullscreen on/off' >Fullscreen</a></li>
            <li><a id='thumbs' class="wowbook-thumbs"   href="#" title='thumbnails on/off' >Thumbs</a></li>
        </ul>
    </nav>
    <div id="main">
        <img id='click_to_open' src="images/click_to_open.png" alt='click to open' />
        <div id='features'>
            <div id='cover'>
            </div>

            <div class='feature pagefx hardpage'>
                <p class='subtitle'>page flipping effect</p>
                <h1>Hardpage</h1>
                <p>This effect turns the page like a hardcover.</p>
                <p> Nice for a book cover, but you can make any page in the book like that.
                </p>
                <br/><br/>
                <h1>Basic</h1>
                <p>Like the softpage effect, but without the 'diagonal twist'.</p>
                <p>Since it doesn't use css transformations, it's used in page with flash or as fallback on old browsers.</p>
            </div>
            <div class='feature pagefx softpage'>
                <p class='subtitle'>page flipping effect</p>
                <h1>Softpage</h1>
                <p>
                    This effect Softpages folds like a regular sheet of paper.
                </p>
                <p>
                    Drag this edge of the page and see how it folds nicely.
                </p>
            </div>

            <div data-double='true' >
                <img src='./images/easy.png' />
            </div>

            <div class='responsive feature'>
                <h1>Responsive</h1>
                <div class='subtitle'></div>
                <p>
                    Wowbook make it easy to resize and adapt to various screen sizes.
                </p>
                <p>
                    You can bind the book dimensions to a DOM element of your choice. Use CSS media queries to set the size of the element.
                </p>
                <p style='color: red'>
                    ATTENTION: this feature does not work on Internet Explorer 7 and 8.
                </p>
            </div>
            <div class='responsive feature'>
                <p>If you need more control on how to resize the book, you can use the javascript API to change the book's size.
                </p>
            </div>
            <div class='responsive feature'>
                <h1>Right-to-left support</h1>
                <p>
                    Wowbook can order the book pages from right to left if you need to use right-to-left script.
                </p>
            </div>
            <div class='responsive feature'>
                <h1>Lazy loading</h1>
                <p>
                    Wowbook can defer the loading of a page contents until the page is shown. This is especially useful in books that contains a lot of images.
                </p>
            </div>

            <div class='feature design'>
                <h1>DESIGN</h1>
                <div class='subtitle'>the way you're used to</div>
            </div>
            <div class='feature design'>
                <p>
                    Let the book fits into your site's design, and not the other way around.
                </p>
            </div>

            <div class='thumbnails feature'>
                <h1>Thumbnails</h1>
                <p>Basic support for displaying thumbnails.</p>
                <h2>CSS Sprite thumbnails:</h2>
                <p>You need to create a CSS Sprite and define a thumbnail size.</p>
                <p>They are lighter and faster, but need to rebuild the image whenever you change the page contents and/or the thumbnails size.</p>
                <h2>Automatic thumbnails:</h2>
                <p>
                    Automatically created, each thumbnail is a clone of the page that is scaled down to the thumbnail size. They are more resource intensive than sprites thumbnails, but easier to update. Some browsers don't do the "scale down" part very well, leading to less than optimal (i.e., ugly) results.
                </p>
            </div>
            <div class='thumbnails feature' >
                <div style='padding-left: 1em'>
                    <h2>Change Type:</h2>
                    <div id='thumbs_type'>
                        <button id='thumb_automatic'>Automatic</button>
                        <button id='thumb_sprite'>CSS Sprites</button>
                    </div>
                    <h2>Change Size:</h2>
                    <p>Only valid with automatic thumbnails.</p>
                    <div id='thumbs_size'>
                        <button>Bigger</button>
                        <button>Smaller</button>
                    </div>
                    <h2>Change position:</h2>
                    <div id='thumbs_position'>
                        <button>Top</button><br/>
                        <button>Left</button>
                        <button>Right</button>
                        <button>Bottom</button><br/><br/>
                        <button data-customized='true' style='width: auto'>Customized with CSS</button>
                    </div>
                </div>
            </div>

            <div id='zoom-feature'  class='feature'>
                <h1>Zoom</h1>
            </div>
            <div id='zoom-feature2' class='feature'>
                <p>The zoom feature lets your users magnify your content to admire all the minimum details.</p>
                <p>Configurable, multiple levels of zoom.</p>
                <p>Design friendly : control the size and the position of the book when zoomed.</p>
            </div>

            <div class='deeplinking feature'>
                <h1>Deep linking</h1>
                <p>
                    Create a link to any page and they will work as expected, like <a href='#features/2' target="_blank" >this one</a> (opens a new window).
                </p>
                <p>
                    wowBook updates the browser's address bar to point to the current page, allowing your user bookmark what he is seeing and get back later.
                </p>
            </div>
            <div class='deeplinking feature'>
                <h1>Back button support</h1>
                <p>
                    wowBook doesn't breaks your browser's back button.
                </p>
                <p style="text-align: center">
                    <img src="images/back.png" />
                </p>
            </div>

            <div class='feature numbering'>
                <h1>Automatic page numbering</h1>
                <p>
                    Numbering the pages of your book is boring
                    , specially during development. Let wowBook do it for you.
                </p>
                <p>
                    Choose where the numbers start and where they ends.
                </p>
                <p>
                    Customize the appearance and position using CSS.
                </p>
            </div>
            <div class='feature slideshow'>
                <h1>Slide Show</h1>
                <p>Turn your book into a slide show.</p>
                <p>You can choose if you wanna pause on hover too.</p>
                <a href='http://mediadesign.deviantart.com'><img src='images/projector.png' alt='projector' /></a>
            </div>

            <div class='feature flash'>
                <h1>FLASH</h1>
                <p>It's possible to use flash (like youtube videos) in your books, but the page that contains the flash object will be limited to the "basic flipping effect" (and ONLY that page).</p>
                <p>Currently, most browsers do not handle well the css transformations used by wowbook when applied to a flash object.</p>
            </div>
            <div class='feature  wowbook-basic-page flash-demo'>
                <object width="350" height="263">
                    <param name="wmode" value="transparent">
                    <param name="movie" value="//www.youtube.com/v/mfg7QJoa3o4?hl=en_US&amp;version=3"></param>
                    <param name="allowFullScreen" value="true"></param>
                    <param name="allowscriptaccess" value="always"></param>
                    <embed src="//www.youtube.com/v/mfg7QJoa3o4?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="350" height="263" wmode="transparent" allowscriptaccess="always" allowfullscreen="true"></embed>
                </object>
            </div>


            <div class='feature more'>
                <h1>and MORE</h1>
            </div>
            <div class='feature more'>
                <ul>
                    <li>Browser support : <img src='./images/browser_logos-32.png' alt='browser logos'/></li>
                    <li>Keyboard navigation</li>
                    <li>Mouse wheel navigation / zoom</li>
                    <li>Play flipping sound</li>
                    <li>Documentation</li>
                    <li>Source code</li>
                    <li>Examples</li>
                    <li>Rich API</li>
                </ul>
            </div>
            <div class='last_cover'>
                <img src="images/cover_last.png" width="100%" height="100%" />
            </div>

        </div> <!-- features -->

    </div>
    <div id='thumbs_holder'>
    </div>
    <footer>

    </footer>
</div> <!--! end of #container -->
</div>

<!-- Javascript at the bottom for fast page loading -->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="./js/libs/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>

<script type="text/javascript" src="wow_book.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#features').wowBook({
            height : 500
            ,width  : 800
            ,centeredWhenClosed : true
            ,hardcovers : true
            ,turnPageDuration : 1000
            ,numberedPages : [1,-2]
            ,controls : {
                zoomIn    : '#zoomin',
                zoomOut   : '#zoomout',
                next      : '#next',
                back      : '#back',
                first     : '#first',
                last      : '#last',
                slideShow : '#slideshow',
                flipSound : '#flipsound',
                thumbnails : '#thumbs',
                fullscreen : '#fullscreen'
            }
            ,scaleToFit: "#container"
            ,thumbnailsPosition : 'bottom'
            ,onFullscreenError : function(){
                var msg="Fullscreen failed.";
                if (self!=top) msg="The frame is blocking full screen mode. Click on 'remove frame' button above and try to go full screen again."
                alert(msg);
            }
        }).css({'display':'none', 'margin':'auto'}).fadeIn(1000);

        $("#cover").click(function(){
            $.wowBook("#features").advance();
        });

        var book = $.wowBook("#features");

        function rebuildThumbnails(){
            book.destroyThumbnails()
            book.showThumbnails()
            $("#thumbs_holder").css("marginTop", -$("#thumbs_holder").height()/2)
        }
        $("#thumbs_position button").on("click", function(){
            var position = $(this).text().toLowerCase()
            if ($(this).data("customized")) {
                position = "top"
                book.opts.thumbnailsParent = "#thumbs_holder";
            } else {
                book.opts.thumbnailsParent = "body";
            }
            book.opts.thumbnailsPosition = position
            rebuildThumbnails();
        })
        $("#thumb_automatic").click(function(){
            book.opts.thumbnailsSprite = null
            book.opts.thumbnailWidth = null
            rebuildThumbnails();
        })
        $("#thumb_sprite").click(function(){
            book.opts.thumbnailsSprite = "images/thumbs.jpg"
            book.opts.thumbnailWidth = 136
            rebuildThumbnails();
        })
        $("#thumbs_size button").click(function(){
            var factor = 0.02*( $(this).index() ? -1 : 1 );
            book.opts.thumbnailScale = book.opts.thumbnailScale + factor;
            rebuildThumbnails();
        })

    });
</script>

<!--[if lt IE 7 ]>
<script src="js/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
<![endif]-->

</body>
</html>

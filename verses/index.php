<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <style>

        .image-container, .title-header {
            text-align: center;
        }

        .image-container
        {
            width: 50%;
            margin: 0 auto;
        }

        .title-header {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .image-container img {
            cursor: pointer;
        }

        .tibetan-text {
            font-size: 2.0em;
            cursor: pointer;
            color:lightblue;
        }

        /* Style the header */
        .header {
            padding: 10px 16px;
            background: transparent;
            color: black;
        }

        /* Page content */
        .content {
            padding: 16px;
        }

        /* The sticky class is added to the header with JS when it reaches its scroll position */
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: white;
            border-bottom: 1px solid gray;
        }

        /* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
        .sticky + .content {
            padding-top: 102px;
        }

        .line-numbers {
            float: left;
            margin-top:30px;
        }

        .header {
            z-index:100;
        }

        .line-num-container {
            display:table;
            height:100%;
            width:100%;
            text-align:right;
        }

        .line-num {
            display:table-cell;
            vertical-align: middle;
        }

        .verse-img {
            height:160%;
            width: auto;
        }

    </style>
    <script>

        var playing = null;

        function playSound(snd) {
          if (playing !== null && !playing.ended) playing.pause();
          playing = new Audio(snd + '.mp3');
          playing.play();
        }

        $(document).ready(function ()
        {
          $(".image-container img").click(function (e) {
            var imageSrc = $(this).attr('src');
            var imageName = imageSrc.replace('.jpg', '');
            playSound(imageName);
            $(this).fadeOut(150).fadeIn(150);
            if ($("#playtwo").is(':checked')) {
              var that = $(this);
              playing.addEventListener("ended", function(){
                var next = that.parent().next().find("img");
                if (next) {
                  imageSrc = next.attr('src');
                  imageName = imageSrc.replace('.jpg', '');
                  playSound(imageName);
                  next.fadeOut(150).fadeIn(150);
                }
              });
            }
          });

          $(".image-container p.tibetan-text").click(function (e) {
            var imageSrc = $(this).attr('id');
            playSound(imageSrc);
          });

        });

        $(document).ready(function ()
        {
          // When the user scrolls the page, execute myFunction
          window.onscroll = function() {myFunction()};

          // Get the header
          var header = document.getElementById("myHeader");

          // Get the offset position of the navbar
          var sticky = header.offsetTop;

          // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
          function myFunction() {
            if (window.pageYOffset > sticky) {
              header.classList.add("sticky");
            } else {
              header.classList.remove("sticky");
            }
          }

        });


    </script>
</head>
<body>

    <div class="title-header">
        <h2>Yang-jen-ga-way-lo-dro's Grammar Verse</h2>
        <h3>Encoded by William Magee</h3>
        <h3>Spoken by Sil-gar Rinpoche</h3>
        <div class="header" id="myHeader">
            <input id="playtwo" type="checkbox" name="playtwo" value="playtwo" checked> Play verses two lines at a time<br>
        </div>
    </div>

    <div class="container">
        <?php for ($i=6;$i<98;$i++) { ?>
          <div class="row">
            <div class="col-sm-1">
                <div class="line-num-container">
                    <span class="line-num"><?php echo $i - 5; ?></span>
                </div>
            </div>
            <div class="col-sm-10" style="text-align:center;">
                <img class="verse-img" src="./<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>.jpg"/>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
        <?php } ?>
    </div>


</body>
</html>
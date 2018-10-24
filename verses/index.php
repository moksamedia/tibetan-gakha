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

    <link rel="stylesheet" type="text/css" href="verses.css">
    <script src="verses.js"></script>
</head>
<body>

    <div class="title-header">
        <h2>Yang-jen-ga-way-lo-dro's Grammar Verse</h2>
        <h3>Encoded by William Magee</h3>
        <h3>Spoken by Sil-gar Rinpoche</h3>
        <div class="header" id="myHeader">
            <div style="margin-right:30px; display:inline-block;">Font Size: <button id="increase-font" type="button" class="btn btn-outline-secondary btn-sm">+</button> <button id="decrease-font" type="button" class="btn btn-outline-secondary btn-sm">-</button></div>
            <div style="display:inline-block;"><input id="playtwo" type="checkbox" name="playtwo" value="playtwo" checked> Play verses two lines at a time</div>
        </div>
    </div>

    <div class="container">

        <?php
            require_once './verses.php';
            $minText = 0;
            $maxText = 50;

            $minPics = 51;
            $maxPics = 90;

        ?>

        <?php for ($i=1;$i<90;$i++) { ?>

              <?php if ($i >= $minPics && $i <= $maxPics) { ?>

              <div class="row">
                <div class="col-sm-1">
                    <div class="line-num-container">
                        <span class="line-num"><?php echo $i; ?></span>
                    </div>
                </div>
                <div class="col-sm-10" style="text-align:center;">
                    <img id="<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>" class="verse-img" src="./<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>.jpg"/>
                </div>
                <div class="col-sm-1">
                </div>
              </div>

              <?php } ?>


          <?php if ($i >= $minText && $i <= $maxText) { ?>

              <div class="row">
                <div class="col-sm-1">
                    <div class="line-num-container">
                        <span class="line-num"><?php echo $i; ?></span>
                    </div>
                </div>
                <div class="col-sm-10" style="text-align:center;">
                    <span id="<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>" class="tibetan-text"><?php echo $verses[$i-1]; ?></span>
                </div>
                <div class="col-sm-1">
                </div>

              </div>

          <?php } ?>

        <?php } ?>

    </div>


</body>
</html>
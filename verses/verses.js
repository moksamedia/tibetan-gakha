var playing = null;

function playSound(snd) {
  if (playing !== null && !playing.ended) playing.pause();
  playing = new Audio(snd + '.mp3');
  playing.play();
}

$(document).ready(function ()
{

  function isOdd(num) { return num % 2;}

  function handleClick(current, elem) {

    playSound(current, elem);

    $(elem).fadeOut(150).fadeIn(150);

    if ($("#playtwo").is(':checked')) {

      playing.addEventListener("ended", function(){

        var numInt = parseInt(current);

        numInt += 1;

        var nextSound = numInt.toString().padStart(3, '0');

        var next = $("#"+nextSound);

        if (next) {
          playSound(nextSound);
          next.fadeOut(150).fadeIn(150);
        }

      });
    }

  }

  $("img.verse-img").click(function (e) {
    var imageSrc = $(this).attr('id');
    handleClick(imageSrc, this);
  });

  $("span.tibetan-text").click(function (e) {
    var imageSrc = $(this).attr('id');
    handleClick(imageSrc, this);
  });

  $("#increase-font").click(function (e) {
    var tibetanText = $(".tibetan-text");
    var currentSize = parseInt(tibetanText.css("font-size"));
    tibetanText.css("font-size", currentSize*1.1);
  });

  $("#decrease-font").click(function (e) {
    var tibetanText = $(".tibetan-text");
    var currentSize = parseInt(tibetanText.css("font-size"));
    tibetanText.css("font-size", currentSize*0.9);
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
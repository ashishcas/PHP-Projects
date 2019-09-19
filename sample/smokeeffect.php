

<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <style>

  body {
  -webkit-animation-duration: 10s;
  animation-duration: 10s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

.fadeOut {
  -webkit-animation-name: fadeOut;
  animation-name: fadeOut;
}

@-webkit-keyframes masked-animation {
  0% {
    background-position: left bottom;
  }
  100% {
    background-position: right bottom;
  }
}

#start {
  position: absolute;
  margin: auto;
  text-align: center;
  top: 50%;
  margin-top: 260px;
  width: 100%;
}

.blink_me {
  animation: blinker 3s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0.3;
  }
}

h1 {
  background-image: url(http://atransformedpgh.weebly.com/uploads/2/9/8/2/29829807/443271065.jpg?1401398447);
  -webkit-text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-animation-name: masked-animation;
  -webkit-animation-duration: 80s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  position: absolute;
  margin: auto;
  text-align: center;
  top: 50%;
  width: 100%;
  font-size: 200px;
  opacity: 0.3;
  font-family: 'Open Sans', sans-serif;
}

html,
body {
  margin: 0;
  padding: 0;
  background: black;
  text-align: center;
  color: grey
}

a {
  color: #fff;
  text-decoration: none
}

#wrap {
  margin: 0 auto;
  width: 100%;
  position: relative
}

#viewport {
  position: relative;
  width: 100%;
  height: 600px;
  overflow: hidden;
}

#viewport .smoke {
  position: absolute;
  width: 250px;
  height: 250px;
  background: url('http://res.cloudinary.com/da51wkm4r/image/upload/v1461143297/title/smoke.png') no-repeat;
  bottom: 150px;
  margin-left: 0px
}

@-webkit-keyframes masked-animation {
  0% {
    background-position: left bottom;
  }
  100% {
    background-position: right bottom;
  }
}


</style>

<script type="text/javascript">
	$(function() {
  "use strict";
  var a = 0;
  $('#tv').hide();
  for (; a < 25; a += 1) {
    setTimeout(function b() {
      var a = Math.random() * 1e3 + 5e3,
        c = $("<div />", {
          "class": "smoke",
          css: {
            left: Math.random() * 800,
            backgroundSize: "contain",
            width: Math.random() * 800,
            height: Math.random() * 600
          }
        });
      $(c).addClass("animated");
      $(c).addClass("zoomIn");
      $(c).addClass("rollOut");
      $(c).appendTo("#viewport");
      $.when($(c).animate({}, {
          duration: a / 4,
          easing: "linear",
          queue: false,
          complete: function() {
            $(c).animate({}, {
              duration: a / 3,
              easing: "linear",
              queue: false
            })
          }
        }),
        $(c).animate({
          bottom: $("#viewport").height()
        }, {
          duration: a,
          easing: "linear",
          queue: false
        })).then(
        function() {
          $(c).remove();
          b()
        })
    }, Math.random() * 3e3)
  }
  $("body").keypress(function() {
    $('body').addClass("fadeOut");
    setTimeout(function() {
      $('#tv').show();
    }, 1000);

    console.log("Handler for .keypress() called.");
  });
}())
var tag = document.createElement('script');
tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var tv,
  playerDefaults = {
    autoplay: 0,
    autohide: 1,
    modestbranding: 0,
    rel: 0,
    showinfo: 0,
    controls: 0,
    disablekb: 1,
    enablejsapi: 0,
    iv_load_policy: 3
  };
var vid = [{
    'videoId': '2b5QNj-BVhs',
    'startSeconds': 515,
    'endSeconds': 690,
    'suggestedQuality': 'hd720'
  }, {
    'videoId': '9ge5PzHSS0Y',
    'startSeconds': 465,
    'endSeconds': 657,
    'suggestedQuality': 'hd720'
  }, {
    'videoId': 'OWsCt7B-KWs',
    'startSeconds': 0,
    'endSeconds': 240,
    'suggestedQuality': 'hd720'
  }, {
    'videoId': 'qMR-mPlyduE',
    'startSeconds': 19,
    'endSeconds': 241,
    'suggestedQuality': 'hd720'
  }],
  randomvid = Math.floor(Math.random() * (vid.length - 1 + 1));

function onYouTubePlayerAPIReady() {
  tv = new YT.Player('tv', {
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    },
    playerVars: playerDefaults
  });
}

function onPlayerReady() {
  tv.loadVideoById(vid[randomvid]);
  tv.mute();
}

function onPlayerStateChange(e) {
  if (e.data === 1) {
    $('#tv').addClass('active');
  } else if (e.data === 0) {
    tv.seekTo(vid[randomvid].startSeconds)
  }
}

function vidRescale() {

  var w = $(window).width() + 200,
    h = $(window).height() + 200;

  if (w / h > 16 / 9) {
    tv.setSize(w, w / 16 * 9);
    $('.tv .screen').css({
      'left': '0px'
    });
  } else {
    tv.setSize(h / 9 * 16, h);
    $('.tv .screen').css({
      'left': -($('.tv .screen').outerWidth() - w) / 2
    });
  }
}

$(window).on('load resize', function() {
  vidRescale();
});

$('.hi span').on('click', function() {
  $('#tv').toggleClass('mute');
  if ($('#tv').hasClass('mute')) {
    tv.mute();
  } else {
    tv.unMute();
  }
});
</script>


</head>

<body>
  <h1>Smoke</h1>
  <div id="wrap">
    <div id="viewport">
      <div class="tv">
        <div class="screen mute" id="tv"></div>
      </div>
    </div>

  </div>
</body>
</html>

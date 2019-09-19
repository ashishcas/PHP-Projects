


<html>
<head></head>
<style>

.index-page .header-filter:after {
  background: rgba(63, 81, 181, 0.64);
  background: linear-gradient(45deg, rgba(63, 81, 181, 0.88) 0%, rgba(63, 81, 181, 0.45) 100%);
  background: -moz-linear-gradient(135deg, rgba(63, 81, 181, 0.88) 0%, rgba(125, 46, 185, 0.45) 100%);
  background: -webkit-linear-gradient(135deg, rgba(63, 81, 181, 0.88) 0%, rgba(63, 81, 181, 0.45) 100%);
}

.index-page .card-header {
  margin-top: 30vh;
  color: #555555 !important;
  text-align: center;
}

.card-header {
  color: #555555;
}
.card-signup {
  margin-top: 50px;
}

.card-header h1 {
  margin: auto auto -20px;
}

.avatar {
  max-width: 180px;
  margin: -20px auto 0;
}

.badge {
  margin: -25px auto 0 !important;
}

.user-rating {
  margin: auto auto -0px;
  border-radius: 2px;
}

.text-blue {
  color: rgb(63, 81, 181) !important;
}
.btn-blue {
  background: rgb(63, 81, 181) !important;
  background: linear-gradient(45deg, rgba(63, 81, 181, 0.88) 100%, rgba(63, 81, 181, 0.45) 100%);
  background: -moz-linear-gradient(135deg, rgba(63, 81, 181, 0.88) 100%, rgba(125, 46, 185, 0.45) 100%);
  background: -webkit-linear-gradient(135deg, rgba(63, 81, 181, 0.88) 100%, rgba(63, 81, 181, 0.45) 100%);
  color: #ffffff;
}

.cardindent {
  margin: auto auto 5px;
}

.like {
  margin: -30px auto auto 140px !important;
}

</style>

<script>



var transparent = true;
var big_image;
var transparentDemo = true;
var fixedTop = false;

var navbar_initialized = false;

$(document).ready(function(){

    // Init Material scripts for buttons ripples, inputs animations etc, more info on the next link https://github.com/FezVrasta/bootstrap-material-design#materialjs
    $.material.init();

    //  Activate the Tooltips
    $('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();

    // Check if we have the class "navbar-color-on-scroll" then add the function to remove the class "navbar-transparent" so it will transform to a plain color.
    if($('.navbar-color-on-scroll').length != 0){
        $(window).on('scroll', materialKit.checkScrollForTransparentNavbar)
    }

    // Activate Popovers
    $('[data-toggle="popover"]').popover();

    // Add parallax on header 
    if ($(window).width() >= 992){
        big_image = $('.paralla-header-image');
        $(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}
});

materialKit = {
    misc:{
        navbar_menu_visible: 0
    },

    checkScrollForTransparentNavbar: debounce(function() {
            if($(document).scrollTop() > 260 ) {
                if(transparent) {
                    transparent = false;
                    $('.navbar-color-on-scroll').removeClass('navbar-transparent');
                }
            } else {
                if( !transparent ) {
                    transparent = true;
                    $('.navbar-color-on-scroll').addClass('navbar-transparent');
                }
            }
    }, 17)
}

materialKitDemo = {
    checkScrollForParallax: debounce(function(){
        var current_scroll = $(this).scrollTop();

        oVal = ($(window).scrollTop() / 3);
        big_image.css({
            'transform':'translate3d(0,' + oVal +'px,0)',
            '-webkit-transform':'translate3d(0,' + oVal +'px,0)',
            '-ms-transform':'translate3d(0,' + oVal +'px,0)',
            '-o-transform':'translate3d(0,' + oVal +'px,0)'
        });

    }, 6)

}
// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};



</script>


<body class="index-page">
<!-- Navbar -->
	<nav class="navbar navbar-fixed-top btn-blue">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="https://codepen.io/creativetim/post/code-this-page-1">CodeThisPage Challenge</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
					    <li>
    					  <a href="#" target="_blank">
    						  Awesome profile
    					  </a>
    				  </li>
    				</ul>
        	</div>
    	</div>
    </nav>

<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('https://i.imgsafe.org/dcc803a4b5.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="card card-header">
						<img src="http://demos.creative-tim.com/material-kit/assets/img/avatar.jpg" alt="Circle Image" class="avatar img-circle img-responsive img-raised">
						<a href="#"><button class="badge btn btn-fab btn-fab-mini btn-round btn-blue"><i class="material-icons">person_add</i></button></a>
						<h1>Jane Doe</h1>
						<h3>Photographer</h3>
	                    
	                    <div class="row cardindent">
	                    	<div class="col-xs-4 col-md-4">
	                    		<b>44</b> uploads
	                    	</div>
	                    	<div class="col-xs-4 col-md-4">
	                    		<b>743</b> following
	                    	</div>
	                    	<div class="col-xs-4 col-md-4">
	                    		<b>345</b> followers
	                    	</div>
	                    </div>

	                    <div class="progress progress-line-primary user-rating">
	                    	<div class="progress-bar progress-bar-success" style="width: 65%">
	                            <span class="sr-only">65% Complete (success)</span>
	                        </div>
	                        <div class="progress-bar progress-bar-danger" style="width: 35%">
	                            <span class="sr-only">35% Complete (danger)</span>
	                        </div>
	                    </div>
	                    
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
	            <div class="row">
	            	<div class="col-md-9">
	            		<h2>Posts</h2>
			            <div class="row">
			            	<div class="col-md-3">
			            		<img class="img-rounded img-responsive img-raised" src="https://unsplash.it/400?random&sig=0">
			            		<a href="#"><button class="like btn btn-fab btn-fab-mini btn-round btn-blue"><i class="material-icons">favorite</i></button></a>
			            	</div>
			            	
			            	<div class="col-md-3">
			            		<img class="img-rounded img-responsive img-raised" src="https://unsplash.it/400?random&sig=1">
			            		<a href="#"><button class="like btn btn-fab btn-fab-mini btn-round btn-blue"><i class="material-icons">favorite</i></button></a>
			            	</div>
			            	
			            	<div class="col-md-3">
			            		<img class="img-rounded img-responsive img-raised" src="https://unsplash.it/400?random&sig=2">
			            		<a href="#"><button class="like btn btn-fab btn-fab-mini btn-round btn-blue"><i class="material-icons">favorite</i></button></a>
			            	</div>
			            	
			            	<div class="col-md-3">
			            		<img class="img-rounded img-responsive img-raised" src="https://unsplash.it/400?random&sig=3">
			            		<a href="#"><button class="like btn btn-fab btn-fab-mini btn-round btn-blue"><i class="material-icons">favorite</i></button></a>
			            	</div>
			            </div>
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <h2>Reviews</h2>
                      <blockquote>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut facilisis felis at nunc commodo, a porta odio rutrum. Cras consectetur, augue nec cursus vulputate, risus nulla vulputate augue, vitae congue massa urna sit amet neque.
                        </p>
                        <small>
                          Curabitur lacinia, Dapibus
                        </small>
                      </blockquote>
                      
                      <blockquote>
                        <p>
                          Phasellus neque eros, laoreet sit amet enim ut, vestibulum malesuada sapien. Mauris ultrices sodales sapien a venenatis. Ut gravida nulla at mi efficitur, in laoreet sapien pharetra. Nam id purus elementum, cursus nisl ac, vehicula ligula. Vestibulum ac egestas augue.
                        </p>
                        <small>
                          Richard McClintock, Professor
                        </small>
                      </blockquote>
                      
                      <blockquote>
                        <p>
                          Sed id finibus nisi. Integer a ligula mollis, feugiat ante ac, sagittis elit. Nullam aliquet molestie ligula, in commodo elit. Sed cursus bibendum dictum. Proin dignissim vulputate felis, at rutrum purus maximus ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                        </p>
                        <small>
                          Mauris Semper, Rhoncus
                        </small>
                      </blockquote>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      
                    </div>
                  </div>
                    
	            	</div>
	            	<div class="col-md-3">
	            		<h2>Info</h2>
	            		<h3>About me</h3>
	            		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc est non modo cor non habere, sed ne palatum quidem. 
	            		Videamus animi partes, quarum est conspectus illustrior; Neque enim.
                  <h2>Hire me</h2>
                      <div class="card card-signup">
                        <form class="form" method="" action="">
                          <div class="header btn-blue text-center">
                            <h4>Be social!</h4>
                            <div class="social-line">
                              <a href="#" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-500px"></i>
                              </a>
                              <a href="#" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-twitter"></i>
                              </a>
                              <a href="#" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-linkedin"></i>
                              </a>
                            </div>
                          </div>
                          <p class="text-divider">Send me an email</p>
                          <div class="content">

                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="material-icons">face</i>
                              </span>
                              <input type="text" class="form-control" placeholder="First Name...">
                            </div>

                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="material-icons">email</i>
                              </span>
                              <input type="text" class="form-control" placeholder="Email...">
                            </div>

                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="material-icons">message</i>
                              </span>
                              <textarea placeholder="Message..." class="form-control" rows="3"></textarea>
                            </div>

                          </div>
                          <div class="footer text-center">
                            <a href="#" class="btn btn-simple btn-primary btn-lg text-blue">Send message</a>
                          </div>
                        </form>
                      </div>
                  
								</div>
                  
	            	</div>
	        	</div> 
	    	</div>
	    </div>

	</div>
    <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<li>
						<a href="https://www.creative-tim.com">
							Creative Tim
						</a>
					</li>
					<li>
						<a href="https://presentation.creative-tim.com">
						   About Us
						</a>
					</li>
					<li>
						<a href="https://blog.creative-tim.com">
						   Blog
						</a>
					</li>
					<li>
						<a href="https://www.creative-tim.com/license">
							Licenses
						</a>
					</li>
	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2017, made with <i class="material-icons">favorite</i> by Creative Tim for a better web.
	        </div>
	    </div>
	</footer>
</div>

<script src="http://demos.creative-tim.com/material-kit/assets/js/nouislider.min.js" type="text/javascript"></script>
</body>
</html>
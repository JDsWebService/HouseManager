@extends('layouts.app')

@section('title', 'Home')

@section('css')

	<style>

        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* Padding below the footer */

        body {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

	    /* CUSTOMIZE THE CAROUSEL
	    -------------------------------------------------- */

	    /* Carousel base class */
	    .carousel {
	        margin-bottom: 4rem;
	    }
	    /* Since positioning the image, we need to help out the caption */
	    .carousel-caption {
	        bottom: 3rem;
	        z-index: 10;
	    }

	    /* Declare heights because of positioning of img element */
	    .carousel-item {
	        height: 32rem;
	    }
	    .carousel-item > img {
	        position: absolute;
	        top: 0;
	        left: 0;
	        min-width: 100%;
	        height: 32rem;
	    }
        .shader {
            filter: brightness(50%);
        }


	    /* MARKETING CONTENT
	    -------------------------------------------------- */

	    /* Center align the text within the three columns below the carousel */
	    .marketing .col-lg-4 {
	        margin-bottom: 1.5rem;
	        text-align: center;
	    }
	    .marketing h2 {
	        font-weight: 400;
	    }
	    .marketing .col-lg-4 p {
	        margin-right: .75rem;
	        margin-left: .75rem;
	    }


	    /* Featurettes
	    ------------------------- */

	    .featurette-divider {
	        margin: 5rem 0; /* Space out the Bootstrap <hr> more */
	    }

	    /* Thin out the marketing headings */
	    .featurette-heading {
	        font-weight: 300;
	        line-height: 1;
	        letter-spacing: -.05rem;
	    }


	    /* RESPONSIVE CSS
	    -------------------------------------------------- */

	    @media (min-width: 40em) {
	        /* Bump up size of carousel content */
	        .carousel-caption p {
	            margin-bottom: 1.25rem;
	            font-size: 1.25rem;
	            line-height: 1.4;
	        }

	        .featurette-heading {
	            font-size: 50px;
	        }
	    }

	    @media (min-width: 62em) {
	        .featurette-heading {
	            margin-top: 7rem;
	        }
	    }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
	    .bd-placeholder-img {
	        font-size: 1.125rem;
	        text-anchor: middle;
	        -webkit-user-select: none;
	        -moz-user-select: none;
	        -ms-user-select: none;
	        user-select: none;
	    }

	    
	</style>

@endsection

@section('content')

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/index/collaboration.png" alt="" class="bd-placeholder-img shader">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Making Collaboration Easy</h1>
                            <p>House Manager includes an easy to use system that allows for multiple accounts per house, making collaboration across multiple properties logical, simple, and functional.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/images/index/security.png" alt="" class="bd-placeholder-img shader">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>High-Level Security Encryption</h1>
                            <p>High-Level security encryption keeps all your data safe, and secure. You won't have to worry about storing sensitive data with House Manager!</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/images/index/workflow.png" alt="" class="bd-placeholder-img shader">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <h1>Simple Design, Straight Forward Workflow</h1>
                            <p>With our intuitive user interface, getting started is a breeze! We have many F.A.Q's that cover various topics to help get you started!</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse F.A.Q.'s</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img src="/images/index/icons/occupants.png" alt="" class="bd-placeholder-img">
                <h2>Occupants</h2>
                <p>Manage the occupants in your house with ease and simplicity. No more banging your head off the wall trying to figure out how to manage this. We take care of that for you!</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="/images/index/icons/history.png" alt="" class="bd-placeholder-img">
                <h2>History</h2>
                <p>Looking back to see who has been through your house, we provide and easy to use system that allows you to look through history in just a few simple clicks.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="/images/index/icons/houses.png" alt="" class="bd-placeholder-img">
                <h2>Houses</h2>
                <p>Do you own multiple houses? We offer support for an infinite number of houses, and define different settings for each house, including rental agreements, and statistics.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

    </div><!-- /.container -->

@endsection
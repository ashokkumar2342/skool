
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kid Template for Children and child.">
    <meta name="keywords" content="child,children,school,childcare,colorful">
    <meta name="author" content="2goodtheme">

    <title>KidCenter - Education Template</title>
    <!-- Swiper Slider CSS -->
    <link href="<?php echo e(asset('front_asset/css/swiper.css')); ?>" rel="stylesheet">
	<!-- Custom Main StyleSheet CSS -->
    <link href="<?php echo e(asset('front_asset/style.css')); ?>" rel="stylesheet">
    <!-- Color CSS -->
    <link href="<?php echo e(asset('front_asset/css/color.css')); ?>" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo e(asset('front_asset/css/responsive.css')); ?>" rel="stylesheet">
  </head>

  <body>

<!--gt Wrapper Start-->  
<div class="gt_wrapper">

    <!--POP Up Form Wrap Start-->
    <div class="modal fade" id="apply_form" tabindex="-1" role="dialog" aria-labelledby="sign-in">
        <div class="modal-dialog" role="document">
            <div class="gt_pf_outer_wrap default_width">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="col-md-6">
                    <div class="gt_pf_form default_width">
                        <h3>Register a Courses</h3>
                        <form class="default_width">
                            <input class="c_ph" type="text" placeholder="Name">
                            <input class="c_ph" type="email" placeholder="Email">
                            <input class="c_ph" type="text" placeholder="Phone Number">
                            <select>
                                <option>Course</option>
                                <option>Course</option>
                                <option>Course</option>
                            </select>
                            <div class="gt_view_more default_width">
                                <a href="#">Register Now</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gt_pf_form_img default_width">
                        <a href="#"><img src="<?php echo e(asset('front_asset/images/logo-white.png')); ?>" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--POP Up Form Wrap End-->

    <!--Header Wrap Start-->
    <header>
        <div class="gt_top3_wrap default_width">
            <div class="container">
                <div class="gt_top3_scl_icon">
                    <ul class="gt_hdr3_scl_icon">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="gt_hdr_3_ui_element">
                    <ul>
                         
                        <li><i class="fa fa-envelope-o"></i><a href="#">info@kidscenter.com</a></li>
                        <li><i class="fa fa-user"></i><a href="<?php echo e(route('admin.login')); ?>">admin</a></li>
                        <li><i class="fa fa-user"></i><a href="<?php echo e(route('parent.login.form')); ?>">Login</a></li>
                        <li><i class="fa fa-user"></i><a href="<?php echo e(route('student.resitration.firststep')); ?>">Registration</a></li>
                    </ul>
                </div>
                <div class="gt_hdr3_search">
                    <form>
                        <input type="search" placeholder="Enter your search...">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="gt_top3_menu default_width">
            <div class="container">
                <div class="gt-logo">
                    <a href="#"><img src="<?php echo e(asset('front_asset/images/logo.png')); ?>" alt=""></a>
                </div>
                <nav class="gt_hdr3_navigation">
                    <!-- Responsive Buttun -->
                    <a class="navbar-btn collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>   
                    <!-- Responsive Buttun -->
                    <ul class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <li class="active"><a href="javascript:avoid(0);">Home</a>
                            <ul>
                                <li class="active"><a href="index.html">Home Default</a></li>
                                <li><a href="index-02.html">Home Style 02</a></li>
                                
                                <li><a href="index_static.html">Home with Static Banner</a></li>
                                <li><a href="index_fullwidth.html">Home with Fullwidth Banner</a></li>
                                <li><a href="index_video.html">Home with Video Bg</a></li>
                                <li><a href="index_text-rotation.html">Home Banner with Text Rotation</a></li>
                                <li><a href="index-one-page.html">Home One Page</a></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="javascript:avoid(0);">Courses</a>
                            <ul>
                                <li><a href="course-grid-style-01-with-sidebar.html">Course Grid Style 01 with Sidebar</a></li>
                                <li><a href="course-grid-style-01-without-sidebar.html">Course Grid Style 01 without Sidebar</a></li>
                                <li><a href="course-grid-style-02-with-sidebar.html">Course Grid Style 02 with Sidebar</a></li>
                                <li><a href="course-grid-style-02-without-sidebar.html">Course Grid Style 02 without Sidebar</a></li>
                                <li><a href="course-listing-style-01.html">Course Listing Style 01</a></li>
                                <li><a href="course-listing-style-02.html">Course Listing Style 02</a></li>
                                <li><a href="course-detail.html">Course Detail</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:avoid(0);">Events</a>
                            <ul>
                                <li><a href="event.html">Event List</a></li>
                                <li><a href="event-detail.html">Event Detail</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:avoid(0);">News</a>
                            <ul>
                                <li><a href="news-grid-style-01-with-sidebar.html">News Grid Style 01 with Sidebar</a></li>
                                <li><a href="news-grid-style-01-without-sidebar.html">News Grid Style 01 without Sidebar</a></li>
                                <li><a href="news-grid-style-02.html">News Grid Style 02</a></li>
                                <li><a href="news-listing-style-01.html">News Listing Style 01</a></li>
                                <li><a href="news-listing-style-02.html">News Listing Style 02</a></li>
                                <li><a href="news-detail.html">News Detail</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:avoid(0);">Team</a>
                            <ul>
                                <li><a href="team-style-01.html">Team Style 01</a></li>
                                <li><a href="team-style-02.html">Team Style 02</a></li>
                                <li><a href="team-detail.html">Team Detail</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:avoid(0);">Pages</a>
                            <ul>
                                <li><a href="user-detail.html">Instructor Dashboard</a></li>
                                <li><a href="user-detail.html">User Dashboard</a></li>
                                <li><a href="price-table.html">Price Table</a></li>
                                <li><a href="gallery-style-01.html">Gallery Column Style 01</a></li>
                                <li><a href="gallery-style-02.html">Gallery Column Style 02</a></li>
                                <li><a href="javascript:avoid(0);">Shop</a>
                                    <ul>
                                        <li><a href="shop-product-01.html">Shop Product Style 01</a></li>
                                        <li><a href="shop-product-02.html">Shop Product Style 02</a></li>
                                        <li><a href="shop-detail.html">Shop Detail</a></li>
                                    </ul>
                                </li>
                                <li><a href="404-page.html">404 Page</a></li>
                                <li><a href="comming-soon.html">Comming Soon</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--Header Wrap End-->

    <!--Banner Wrap Start-->
    <div class="gt_banner default_width">
        <div class="swiper-container" id="swiper-container">
             <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <img src="<?php echo e(asset('front_asset/extra-images/banner-01.jpg')); ?>" alt="">
                    <div class="gt_banner_text gt_slide_1">
                        <h3>Welcome to</h3>
                        <h2>kids Center for kids</h2>
                    </div>
                </li>
                <li class="swiper-slide">
                    <img src="<?php echo e(asset('front_asset/extra-images/banner-02.jpg')); ?>" alt="">
                    <div class="gt_banner_text gt_slide_2">
                        <h3>Learning &#38; fun</h3>
                        <h2>Perfevt Education</h2>
                        <h3>Template for your kids</h3>
                        <a href="#">see More</a>
                        <a href="#">Buy Now!</a>
                    </div>
                </li>
                <li class="swiper-slide">
                    <img src="<?php echo e(asset('front_asset/extra-images/banner-03.jpg')); ?>" alt="">
                    <div class="gt_banner_text gt_slide_3">
                        <h3>We will take care</h3>
                        <h2>for your kids</h2>
                        <a href="#">see More</a>
                        <a href="#">Buy Now!</a>
                    </div>
                </li>
             </ul>
         </div>
        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
    </div>
    <!--Banner Wrap End-->

    <!--Main Content Wrap Start-->
    <div class="gt_main_content_wrap">
        <!--Banner Services Wrap Start-->
        <div class="gt_servicer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="gt_main_services bg_1">
                            <i class="icon-write-board"></i>
                            <h5>Courses</h5>
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
                            <a  class="bg_1" href="#"> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="gt_main_services bg_2">
                            <i class="icon-teacher-showing-on-whiteboard"></i>
                            <h5>Professional Teachers</h5>
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
                             <a class="bg_2" href="#"> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="gt_main_services bg_3">
                            <i class="icon-compass"></i>
                            <h5>Fully Equiped</h5>
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
                             <a class="bg_3" href="#"> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="gt_main_services bg_4">
                            <i class="icon-number-blocks"></i>
                            <h5>Special Education</h5>
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
                              <a class="bg_4" href="#"> <i class="fa fa-arrow-right"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner Services Wrap End-->
        
        <!--Offer Wrap start-->
        <section class="gt_wht_offer_bg">
            <div class="container">
            	<div class="gt_hdg_1">
                    <h3>WHAT WE OFFER</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                <!--What We Offer 2 Wrap Start-->
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-meat bg_1"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Healthy Food</a></h5>
                                <span class="bg_offer_1"></span>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-pencil bg_2"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Painting Learning</a></h5>
                                <span class="bg_offer_2"></span>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-bus bg_3"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Bus Service</a></h5>
                                <span class="bg_offer_3"></span>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-translation bg_4"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Multi Language</a></h5>
                                <span class="bg_offer_4"></span>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-color bg_5"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Colour Match</a></h5>
                                <span class="bg_offer_5"></span>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-crayons bg_6"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Sketching</a></h5>
                                <span class="bg_offer_6"></span>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--What We Offer 2 Wrap End-->
            </div>
        </section>
        <!--offer Wrap End-->
        
        <!--Facts and Figure Wrap End-->
        <section class="fact_figure_bg">
            <div class="container">
                <div class="gt_hdg_1 white_hdg">
                    <h3>Facts And Figure about Kids Center</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">2500</h2>
                            <span>Subjects</span>
                         </div>
                         <span class="facts_border bg_1"></span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">3000</h2>
                            <span>Modern lab</span>
                         </div>
                         <span class="facts_border bg_2"></span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">3500</h2>
                            <span>Instructors</span>
                        </div>
                        <span class="facts_border bg_3"></span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">5500</h2>
                            <span>Students</span>
                        </div>
                        <span class="facts_border bg_4"></span>
                    </div>
                </div>
                <div class="gt_fact_link_wrap default_width">
                    <a class="button_style_1 btn_lg" href="#">See more</a>
                    <a class="button_style_1 btn_lg" href="#">Buy Now!</a>
                </div>
            </div>
        </section>
        <!--Facts and Figure Wrap End-->

        <!--Popular Courses Wrap Start-->
        <section>
            <div class="container">
                <div class="gt_hdg_1">
                    <h3>Popular Courses</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="gt_course_tab_list default_width">
                            <ul id="filterable-item-filter-1">
                                <li><a class="active" data-value="all" href="#">All</a></li>
                                <li><a data-value="1" href="#">New Courses</a></li>
                                <li><a data-value="2" href="#">Special Courses</a></li>
                                <li><a data-value="3" href="#">Famouse Courses</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gt_course_search_bar default_width">
                            <form>
                                <input class="c_ph" type="search" placeholder="Search for course here">
                                <label><input type="submit" value="Search"></label>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Popular Courses List Wrap Start-->
                <div id="filterable-item-holder-1">
                    <div class="filterable-item all 1 col-md-4 col-sm-6 col-xs-12">
                        <div class="gt_latest_course2_wrap default_width">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/latest-course-01.jpg')); ?>" alt="">
                                <figcaption>
                                    <div class="course_price">$20</div>
                                    <div class="course_category bg_1">Technology</div>
                                </figcaption>
                            </figure>
                            <div class="gt_latest_course_des default_width">
                                <h5><a href="#">Ask for what you want</a></h5>
                                <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.<a href="#">Read more</a></p>
                                <div class="gt_latest_course_author">
                                    <figure>
                                        <img src="<?php echo e(asset('front_asset/extra-images/latest-course-author.png')); ?>" alt="">
                                    </figure>
                                    <div class="course_author_des">
                                        <h6>Jhon Smith</h6>
                                        <span>Phd in Software dev.</span>
                                    </div>
                                </div>
                                <div class="gt_course_apply">
                                    <a data-toggle="modal" data-target="#apply_form" href="#">Apply</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="filterable-item all 2 1 3 col-md-4 col-sm-6 col-xs-12">
                        <div class="gt_latest_course2_wrap default_width">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/latest-course-02.jpg')); ?>" alt="">
                                <figcaption>
                                    <div class="course_price">$20</div>
                                    <div class="course_category bg_2">Technology</div>
                                </figcaption>
                            </figure>
                            <div class="gt_latest_course_des default_width">
                                <h5><a href="#">Little Singer Courses</a></h5>
                                <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.<a href="#">Read more</a></p>
                                <div class="gt_latest_course_author">
                                    <figure>
                                        <img src="<?php echo e(asset('front_asset/extra-images/latest-course-author.png')); ?>" alt="">
                                    </figure>
                                    <div class="course_author_des">
                                        <h6>Stephem Johns</h6>
                                        <span>Phd in Software dev.</span>
                                    </div>
                                </div>
                                <div class="gt_course_apply">
                                    <a data-toggle="modal" data-target="#apply_form" href="#">Apply</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="filterable-item all 3 2 col-md-4 col-sm-6 col-xs-12">
                        <div class="gt_latest_course2_wrap default_width">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/latest-course-03.jpg')); ?>" alt="">
                                <figcaption>
                                    <div class="course_price">$20</div>
                                    <div class="course_category bg_5">Artificial</div>
                                </figcaption>
                            </figure>
                            <div class="gt_latest_course_des default_width">
                                <h5><a href="#">DESIGNING WITH TYPE</a></h5>
                                <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.<a href="#">Read more</a></p>
                                <div class="gt_latest_course_author">
                                    <figure>
                                        <img src="<?php echo e(asset('front_asset/extra-images/latest-course-author.png')); ?>" alt="">
                                    </figure>
                                    <div class="course_author_des">
                                        <h6>James Stewart</h6>
                                        <span>Phd in Software dev.</span>
                                    </div>
                                </div>
                                <div class="gt_course_apply">
                                    <a data-toggle="modal" data-target="#apply_form" href="#">Apply</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="gt_view_more default_width">
                    <a href="#">Load More</a>
                </div>
                <!--Popular Courses List Wrap End-->

            </div>
        </section>
        <!--Popular Courses Wrap End-->

        <!--Our Gallery Wrap Start-->
        <section class="gt_gallery_bg">
            <!--Main Heading Wrap Start-->
            <div class="gt_hdg_1">
                <h3>Our Gallery</h3>
                <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
            </div>
            <!--Main Heading Wrap End-->

            <!--Gallery List Wrap Start-->
            <div class="gt_gallery_slider" id="gt_gallery_slider">
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-01.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-02.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-03.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-04.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-05.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-01.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="<?php echo e(asset('front_asset/extra-images/gallery-02.jpg')); ?>" alt="">
                    </div>
                </div>
            </div>
            <!--Gallery List Wrap End-->
        </section>
        <!--Our Gallery Wrap End-->

        <!--Meet Our Best Teacher Wrap Start-->
        <section>
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1">
                    <h3>Meet Our Best Teacher</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->

                <!--Teacher List Wrap Start-->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/best-teacher-01.jpg')); ?>" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Sr. Teacher</span>
                                <h5><a href="#">Janifer Steel</a></h5>
                                <p>Lorem ipsum doloAr sit amet, conset adipiscing elitsed do eius sit amet</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+124 456 7858</li>
                                    <li><i class="fa fa-envelope-o"></i>janifer.kidscenter.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/best-teacher-02.jpg')); ?>" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Sr. Teacher</span>
                                <h5><a href="#">Janifer Steel</a></h5>
                                <p>Lorem ipsum doloAr sit amet, conset adipiscing elitsed do eius sit amet</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+124 456 7858</li>
                                    <li><i class="fa fa-envelope-o"></i>janifer.kidscenter.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/best-teacher-03.jpg')); ?>" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Sr. Teacher</span>
                                <h5><a href="#">Sara Loreen</a></h5>
                                <p>Lorem ipsum doloAr sit amet, conset adipiscing elitsed do eius sit amet</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+124 456 7858</li>
                                    <li><i class="fa fa-envelope-o"></i>janifer.kidscenter.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/best-teacher-04.jpg')); ?>" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Sr. Teacher</span>
                                <h5><a href="#">Steel Janifer</a></h5>
                                <p>Lorem ipsum doloAr sit amet, conset adipiscing elitsed do eius sit amet</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+124 456 7858</li>
                                    <li><i class="fa fa-envelope-o"></i>janifer.kidscenter.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Teacher List Wrap End-->
            </div>
        </section>
        <!--Meet Our Best Teacher Wrap End-->

        <!--Testimonial Wrap Start-->
        <section class="gt_testimonial_bg">
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1 white_hdg">
                    <h3>what clients say about Us</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->

                <!--Testimonial 02 List Wrap Start-->
                <div class="gt_testimonial2_slider" id="gt_testimonial2_slider">
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6>Janifer Steel</h6>
                                    <span>Parents</span>
                                </div>
                                <figure>
                                    <img src="<?php echo e(asset('front_asset/extra-images/comment-02.jpg')); ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6>Stephem Johns</h6>
                                    <span>Parents</span>
                                </div>
                                <figure>
                                    <img src="<?php echo e(asset('front_asset/extra-images/comment-01.jpg')); ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6>James Stewart</h6>
                                    <span>Parents</span>
                                </div>
                                <figure>
                                    <img src="<?php echo e(asset('front_asset/extra-images/comment-03.jpg')); ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6>Rashed Kabir</h6>
                                    <span>Parents</span>
                                </div>
                                <figure>
                                    <img src="<?php echo e(asset('front_asset/extra-images/comment-02.jpg')); ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6>Janifer Steel</h6>
                                    <span>Parents</span>
                                </div>
                                <figure>
                                    <img src="<?php echo e(asset('front_asset/extra-images/comment-01.jpg')); ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6>James Stewart</h6>
                                    <span>Parents</span>
                                </div>
                                <figure>
                                    <img src="<?php echo e(asset('front_asset/extra-images/testimmonial-01.jpg')); ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Testimonial 02 List Wrap End-->

            </div>
        </section>
        <!--Testimonial Wrap End-->

        <!--Latest News Wrap Start-->
        <section class="gt_news_bg">
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1">
                    <h3>Latest News and Blog</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->

                <!--Latest News Wrap Start-->
                <div class="gt_news_slider" id="gt_news_slider">
                    <div class="item">
                        <div class="gt_blog_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/blog-01.jpg')); ?>" alt="">
                                <figcaption class="gt_blog_figcaption">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="gt_blog_des_wrap">
                                <ul class="gt_blog_meta">
                                    <li><i class="fa fa-calendar"></i>15 Sep 2016</li>
                                    <li><i class="fa fa-heart"></i>17</li>
                                    <li><i class="fa fa-comments"></i>04</li>
                                </ul>
                                <h5><a href="#">How kids think about earth</a></h5>
                                <p>Lorem Ipsum proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsumnibh id elit. </p>
                                <a href="#">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_blog_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/blog-02.jpg')); ?>" alt="">
                                <figcaption class="gt_blog_figcaption">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="gt_blog_des_wrap">
                                <ul class="gt_blog_meta">
                                    <li><i class="fa fa-calendar"></i>15 Sep 2016</li>
                                    <li><i class="fa fa-heart"></i>17</li>
                                    <li><i class="fa fa-comments"></i>04</li>
                                </ul>
                                <h5><a href="#">Standard Post With Preview Image</a></h5>
                                <p>Lorem Ipsum proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsumnibh id elit. </p>
                                <a href="#">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_blog_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/blog-03.jpg')); ?>" alt="">
                                <figcaption class="gt_blog_figcaption">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="gt_blog_des_wrap">
                                <ul class="gt_blog_meta">
                                    <li><i class="fa fa-calendar"></i>15 Sep 2016</li>
                                    <li><i class="fa fa-heart"></i>17</li>
                                    <li><i class="fa fa-comments"></i>04</li>
                                </ul>
                                <h5><a href="#">How kids think about earth</a></h5>
                                <p>Lorem Ipsum proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsumnibh id elit. </p>
                                <a href="#">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_blog_wrap">
                            <figure>
                                <img src="<?php echo e(asset('front_asset/extra-images/blog-04.jpg')); ?>" alt="">
                                <figcaption class="gt_blog_figcaption">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="gt_blog_des_wrap">
                                <ul class="gt_blog_meta">
                                    <li><i class="fa fa-calendar"></i>15 Sep 2016</li>
                                    <li><i class="fa fa-heart"></i>17</li>
                                    <li><i class="fa fa-comments"></i>04</li>
                                </ul>
                                <h5><a href="#">How kids think about earth</a></h5>
                                <p>Lorem Ipsum proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsumnibh id elit. </p>
                                <a href="#">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Latest News Wrap End-->

            </div>
        </section>
        <!--Latest News Wrap End-->

        <!--Our Client Wrap Start-->
        <section>
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1">
                    <h3>Our Sponsors</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. <span>elit, eget nibh etlibura.</span>
                    </p>
                    <span><img src="<?php echo e(asset('front_asset/images/hdg-01.png')); ?>" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->
                
                <!--Brand List Wrap Start-->
                <div class="gt_brand_carousel owl-carouse">
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-01.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-02.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-03.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-04.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-05.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-06.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gt_brand_outer_wrap">
                            <a href="#"><img src="<?php echo e(asset('front_asset/images/brand-01.jpg')); ?>" alt=""></a>
                        </div>
                    </div>
                </div>
                <!--Brand List Wrap End-->
                
            </div>
        </section>
        <!--Our Client Wrap End-->
    </div>
    <!--Main Content Wrap End-->
    
    <!--Footer Wrap Start-->
    <footer>
        <!--NewsLetter Wrap Start-->
        <div class="gt_newsltr_bg default_width">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <div class="gt_newsltr_wrap">
                            <form>
                                <input type="text" placeholder="Enter your email">
                                <input class="button_style_1 btn_lg" type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--NewsLetter Wrap End-->

        <!--Footer Wrap Start-->
        <div class="gt_footer_bg default_width">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="gt_office_wrap default_width">
                            <div class="gt_office_time widget">
                                <h5>Opening Hour</h5>
                                <ul>
                                    <li>
                                        Monday - Friday
                                        <span>9am to 5pm</span>
                                    </li>
                                    <li>
                                        Saturady - Sunday 
                                        <span>off</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="gt_foo_about widget">
                                <h5>About Kidscenter</h5>
                                <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin nibh vel velit auctor aliquet.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="foo_col_outer_wrap default_width">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="gt_foo_news widget">
                                        <h5>Latest News</h5>
                                        <ul>
                                            <li>
                                                <figure>
                                                    <img src="extra-images/foo-news-01.jpg" alt="">
                                                </figure>
                                                <div class="foo_news_content">
                                                    <a href="#">Lorem ipsum dolor sit amet dolor sit amet</a>
                                                    <ul>
                                                        <li>
                                                            <i class="fa fa-calendar"></i>
                                                            <span>07-March-2016</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-comments-o"></i>
                                                            <span>20</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="extra-images/foo-news-02.jpg" alt="">
                                                </figure>
                                                <div class="foo_news_content">
                                                    <a href="#">Lorem ipsum dolor sit amet dolor sit amet</a>
                                                    <ul>
                                                        <li>
                                                            <i class="fa fa-calendar"></i>
                                                            <span>07-March-2016</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-comments-o"></i>
                                                            <span>20</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="gt_foo_recent_projects widget">
                                        <h5>Our Gallery</h5>
                                        <ul>
                                            <li><a href="#"><img src="extra-images/foo-news-03.jpg" alt=""></a></li>
                                            <li><a href="#"><img src="extra-images/foo-news-04.jpg" alt=""></a></li>
                                            <li><a href="#"><img src="extra-images/foo-news-05.jpg" alt=""></a></li>
                                            <li><a href="#"><img src="extra-images/foo-news-06.jpg" alt=""></a></li>
                                            <li><a href="#"><img src="extra-images/foo-news-07.jpg" alt=""></a></li>
                                            <li><a href="#"><img src="extra-images/foo-news-08.jpg" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="widget">
                                        <h5>Our Address</h5>
                                        <ul class="gt_team1_contact_info">
                                            <li><i class="fa fa-map-marker"></i>14350 60th St North Clearwater FL. 33760 </li>
                                            <li><i class="fa fa-phone"></i>1-677-124-44227 </li>
                                            <li><i class="fa fa-envelope"></i> <a href="#">info@kidscenter.com</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Footer Wrap End-->

        <!--Copyright Wrap Start-->
        <div class="copyright_bg default_width">
            <div class="container">
                <div class="copyright_wrap default_width">
                    <p>©copyrights.<a href="#">Kidscenter.com</a>. All Right Reserved.</p>
                    <span>Designed By: <a href="#">2GoodTemplate</a></span>
                </div>
            </div>
        </div>  
        <!--Copyright Wrap End-->      
    </footer> 
    <!--Footer Wrap End-->
    <!--Back to Top Wrap Start-->
    <div class="back-to-top">
        <a href="#home"><i class="fa fa-angle-up"></i></a>
    </div>
    <!--Back to Top Wrap Start-->

</div>
<!--gt Wrapper End-->



    <!--Jquery Library-->
    <script src="<?php echo e(asset('front_asset/js/jquery.js')); ?>"></script>
    <!--Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('front_asset/js/bootstrap.min.js')); ?>"></script>
    <!--Swiper JavaScript-->
    <script src="<?php echo e(asset('front_asset/js/swiper.jquery.min.js')); ?>"></script>
    <!--Accordian JavaScript-->
    <script src="<?php echo e(asset('front_asset/js/jquery.accordion.js')); ?>"></script>
    <!--Count Down JavaScript-->
    <script src="<?php echo e(asset('front_asset/js/jquery.downCount.js')); ?>"></script>
    <!--Pretty Photo JavaScript-->
    <script src="<?php echo e(asset('front_asset/js/jquery.prettyPhoto.js')); ?>"></script>
    <!--Owl Carousel JavaScript-->
	<script src="<?php echo e(asset('front_asset/js/owl.carousel.js')); ?>"></script>
    <!--Number Count (Waypoint) JavaScript-->
	<script src="<?php echo e(asset('front_asset/js/waypoints-min.js')); ?>"></script>
    <!--Filter able JavaScript-->
	<script src="<?php echo e(asset('front_asset/js/jquery-filterable.js')); ?>"></script>
    <!--WOW JavaScript-->
    <script src="<?php echo e(asset('front_asset/js/wow.min.js')); ?>"></script>
    <!--Custom JavaScript-->
	<script src="<?php echo e(asset('front_asset/js/custom.js')); ?>"></script>

  </body>
 
</html>

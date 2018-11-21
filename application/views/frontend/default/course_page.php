<?php
    $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
     $admin_details = $this->user_model->get_admin_details()->row_array();
      $video_details = $this->video_model->getVideoDetails($course_details['video_url']);
	// print_r($video_details);
?>
<section class="course-header-area">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="course-header-wrap">
                            <h1 class="title"><?php echo $course_details['title']; ?></h1>
                            <p class="subtitle"><?php echo $course_details['short_description']; ?></p>
                            <div class="rating-row">
                                <span class="course-badge best-seller">Best seller</span>
                                <?php
                                    $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'], true)->row()->rating;
                                    $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'])->num_rows();
                                    if ($number_of_ratings > 0) {
                                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                    }else {
                                        $average_ceil_rating = 0;
                                    }

                                    for($i = 1; $i < 6; $i++):?>
                                    <?php if ($i <= $average_ceil_rating): ?>
                                    <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                                    <?php else: ?>
                                    <i class="fas fa-star"></i>
                                    <?php endif; ?>
                                    <?php endfor; ?>
                                <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span><span>(<?php echo $number_of_ratings.' '.get_phrase('ratings'); ?>)</span>
                                <span class="enrolled-num">
                                    <?php
                                        $number_of_enrollments = $this->crud_model->enroll_history($course_details['id'])->num_rows();
                                        echo $number_of_enrollments.' '.get_phrase('students_enrolled');
                                     ?>
                                </span>
                            </div>
                            <div class="created-row">
                                <span class="created-by">
                                    <?php echo get_phrase('created_by'); ?>
                                    <a href="<?php echo site_url('home/instructor_page'); ?>"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></a>
                                </span>
                                <?php if ($course_details['last_modified'] > 0): ?>
                                    <span class="last-updated-date"><?php echo get_phrase('last_updated').' '.date('D, d-M-Y', $course_details['last_modified']); ?></span>
                                <?php else: ?>
                                    <span class="last-updated-date"><?php echo get_phrase('last_updated').' '.date('D, d-M-Y', $course_details['date_added']); ?></span>
                                <?php endif; ?>
                                <span class="comment"><i class="fas fa-comment"></i><?php echo ucfirst($course_details['language']); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
        </section>


        <section class="course-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="what-you-get-box">
                            <div class="what-you-get-title"><?php echo get_phrase('what_will_i_learn'); ?>?</div>
                            <ul class="what-you-get__items">
                                <?php foreach (json_decode($course_details['outcomes']) as $outcome): ?>
                                    <?php if ($outcome != ""): ?>
                                        <li><?php echo $outcome; ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <br>
                        <div class="course-curriculum-box">
                            <div class="course-curriculum-title clearfix">
                                <div class="title float-left"><?php echo get_phrase('curriculum_for_this_course'); ?></div>
                                <div class="float-right">
                                    <span class="total-lectures">
                                        <?php echo $this->crud_model->get_lessons('course', $course_details['id'])->num_rows().' '.get_phrase('lessons'); ?>
                                    </span>
                                    <span class="total-time">
                                        <?php
                                            echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']);
                                         ?>
                                    </span>
                                </div>
                            </div>
                            <div class="course-curriculum-accordion">
                                <?php
                                $sections = json_decode($course_details['section']);
                                $counter = 0;
                                foreach ($sections as $section): ?>
                                <div class="lecture-group-wrapper">
                                    <div class="lecture-group-title clearfix" data-toggle="collapse" data-target="#collapse<?php echo $section; ?>" aria-expanded="<?php if($counter == 0) echo 'true'; else echo 'false' ; ?>">
                                        <div class="title float-left">
                                            <?php $section_details = $this->crud_model->get_section('section', $section)->row_array();
                                                echo $section_details['title'];
                                            ?>
                                        </div>
                                        <div class="float-right">
                                            <span class="total-lectures">
                                                <?php echo $this->crud_model->get_lessons('section', $section)->num_rows().' '.get_phrase('lessons'); ?>
                                            </span>
                                            <span class="total-time">
                                                <?php echo $this->crud_model->get_total_duration_of_lesson_by_section_id($section); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div id="collapse<?php echo $section; ?>" class="lecture-list collapse <?php if($counter == 0) echo 'show'; ?>">
                                        <ul>
                                            <?php $lessons = $this->crud_model->get_lessons('section', $section)->result_array();
                                            foreach ($lessons as $lesson):?>
                                                <li class="lecture has-preview">
                                                    <span class="lecture-title"><?php echo $lesson['title']; ?></span>
                                                    <span class="lecture-time float-right"><?php echo $lesson['duration']; ?></span>
                                                    <!-- <span class="lecture-preview float-right" data-toggle="modal" data-target="#CoursePreviewModal">Preview</span> -->
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                                $counter++;
                                endforeach; ?>
                            </div>
                        </div>

                        <div class="requirements-box">
                            <div class="requirements-title"><?php echo get_phrase('requirements'); ?></div>
                            <div class="requirements-content">
                                <ul class="requirements__list">
                                    <?php foreach (json_decode($course_details['requirements']) as $requirement): ?>
                                        <?php if ($requirement != ""): ?>
                                            <li><?php echo $requirement; ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="description-box view-more-parent">
                            <div class="view-more" onclick="viewMore(this,'hide')">+ <?php echo get_phrase('view_more'); ?></div>
                            <div class="description-title"><?php echo get_phrase('description'); ?></div>
                            <div class="description-content-wrap">
                                <div class="description-content">
                                    <?php echo $course_details['description']; ?>
                                </div>
                            </div>
                        </div>


                        <div class="compare-box view-more-parent">
                            <div class="view-more" onclick="viewMore(this)">+ <?php echo get_phrase('view_more'); ?></div>
                            <div class="compare-title"><?php echo get_phrase('other_related_courses'); ?></div>
                            <div class="compare-courses-wrap">
                                <?php
                                    $other_realted_courses = $this->crud_model->get_courses($course_details['category_id'], $course_details['sub_category_id'])->result_array();
                                 foreach ($other_realted_courses as $other_realted_course):
                                     if($other_realted_course['id'] != $course_details['id']): ?>
                                     <div class="course-comparism-item-container this-course">
                                         <div class="course-comparism-item clearfix">
                                             <div class="item-image float-left">
                                                 <a href="<?php echo site_url('home/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$other_realted_course['id'].'.jpg'; ?>" alt="" class="img-fluid"></a>
                                                 <div class="item-duration"><b><?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($other_realted_course['id']); ?></b></div>
                                             </div>
                                             <div class="item-title float-left">
                                                 <div class="title"><a href="<?php echo site_url('home/course/'.slugify($other_realted_course['title']).'/'.$other_realted_course['id']); ?>"><?php echo $other_realted_course['title']; ?></a></div>
                                                 <?php if ($other_realted_course['last_modified'] > 0): ?>
                                                     <div class="updated-time"><?php echo get_phrase('updated').' '.date('D, d-M-Y', $other_realted_course['last_modified']); ?></div>
                                                 <?php else: ?>
                                                     <div class="updated-time"><?php echo get_phrase('updated').' '.date('D, d-M-Y', $other_realted_course['date_added']); ?></div>
                                                 <?php endif; ?>
                                             </div>
                                             <div class="item-details float-left">
                                                 <span class="item-rating">
                                                     <i class="fas fa-star"></i>
                                                     <?php
                                                         $total_rating =  $this->crud_model->get_ratings('course', $other_realted_course['id'], true)->row()->rating;
                                                         $number_of_ratings = $this->crud_model->get_ratings('course', $other_realted_course['id'])->num_rows();
                                                         if ($number_of_ratings > 0) {
                                                             $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                                         }else {
                                                             $average_ceil_rating = 0;
                                                         }
                                                        ?>
                                                     <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                                                 </span>
                                                 <span class="enrolled-student">
                                                     <i class="far fa-user"></i>
                                                     <?php echo $this->crud_model->enroll_history($other_realted_course['id'])->num_rows(); ?>
                                                 </span>
                                                 <?php if ($other_realted_course['discount_flag'] == 1): ?>
                                                     <span class="item-price">
                                                         <span class="original-price"><?php echo '$'.$other_realted_course['price']; ?></span>
                                                         <span class="current-price"><?php echo '$'.$other_realted_course['discounted_price']; ?></span>
                                                     </span>
                                                 <?php else: ?>
                                                     <span class="item-price">
                                                         <span class="current-price">Rp.<?php echo $other_realted_course['price']; ?></span>
                                                     </span>
                                                 <?php endif; ?>
                                             </div>
                                         </div>
                                     </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="about-instructor-box">
                            <div class="about-instructor-title">
                                <?php echo get_phrase('about_the_instructor'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="about-instructor-image">
                                        <img src="<?php echo base_url('uploads/user_image/'.$admin_details['id'].'.jpg'); ?>" alt="" class="img-fluid">
                                        <ul>
                                            <!-- <li><i class="fas fa-star"></i><b>4.4</b> Average Rating</li> -->
                                            <li><i class="fas fa-comment"></i><b>
                                                <?php echo $this->db->get('rating')->num_rows(); ?>
                                            </b> <?php echo get_phrase('reviews'); ?></li>
                                            <li><i class="fas fa-user"></i><b>
                                                <?php echo $this->db->get('enroll')->num_rows(); ?>
                                            </b> Students</li>
                                            <li><i class="fas fa-play-circle"></i><b>
                                                <?php echo $this->db->get('course')->num_rows(); ?>
                                            </b> Courses</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="about-instructor-details view-more-parent">
                                        <div class="view-more" onclick="viewMore(this)">+ View More</div>
                                        <div class="instructor-name">
                                            <a href="<?php echo site_url('home/instructor_page'); ?>"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></a>
                                        </div>
                                        <div class="instructor-title">
                                            <?php echo $admin_details['title']; ?>
                                        </div>
                                        <div class="instructor-bio">
                                            <?php echo $admin_details['biography']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="student-feedback-box">
                            <div class="student-feedback-title">
                                <?php echo get_phrase('student_feedback'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="average-rating">
                                        <div class="num">
                                            <?php
                                            $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'], true)->row()->rating;
                                            $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'])->num_rows();
                                            if ($number_of_ratings > 0) {
                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                            }else {
                                                $average_ceil_rating = 0;
                                            }
                                            echo $average_ceil_rating;
                                             ?>
                                         </div>
                                        <div class="rating">
                                        <?php
                                            for($i = 1; $i < 6; $i++):?>
                                            <?php if ($i <= $average_ceil_rating): ?>
                                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                                            <?php else: ?>
                                            <i class="fas fa-star" style="color: #abb0bb;"></i>
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="title"><?php echo get_phrase('average_rating'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="individual-rating">
                                        <ul>
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <li>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: <?php echo $this->crud_model->get_percentage_of_specific_rating($i, 'course', $course_id); ?>%"></div>
                                                    </div>
                                                    <div>
                                                        <span class="rating">
                                                            <?php for($j = 1; $j <= (5-$i); $j++): ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php endfor; ?>
                                                            <?php for($j = 1; $j <= $i; $j++): ?>
                                                                <i class="fas fa-star filled"></i>
                                                            <?php endfor; ?>

                                                        </span>
                                                        <span><?php echo $this->crud_model->get_percentage_of_specific_rating($i, 'course', $course_id); ?>%</span>
                                                    </div>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="reviews">
                                <div class="reviews-title"><?php echo get_phrase('reviews'); ?></div>
                                <ul>
                                    <?php
                                        $ratings = $this->crud_model->get_ratings('course', $course_id)->result_array();
                                        foreach($ratings as $rating):
                                    ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="reviewer-details clearfix">
                                                    <div class="reviewer-img float-left">
                                                        <img src="<?php echo base_url().'uploads/user_image/'.$rating['user_id'].'.jpg'; ?>" alt="">
                                                    </div>
                                                    <div class="review-time">
                                                        <div class="time">
                                                            <?php echo date('D, d-M-Y', $rating['date_added']); ?>
                                                        </div>
                                                        <div class="reviewer-name">
                                                            <?php
                                                                $user_details = $this->user_model->get_user($rating['user_id'])->row_array();
                                                                echo $user_details['first_name'].' '.$user_details['last_name'];
                                                             ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="review-details">
                                                    <div class="rating">
                                                            <?php
                                                            for($i = 1; $i < 6; $i++):?>
                                                            <?php if ($i <= $rating['rating']): ?>
                                                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                                                            <?php else: ?>
                                                            <i class="fas fa-star" style="color: #abb0bb;"></i>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                    </div>
                                                    <div class="review-text">
                                                        <?php echo $rating['review']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="course-sidebar natural">
                            <div class="preview-video-box">
                                <a data-toggle="modal" data-target="#CoursePreviewModal">
                                    <img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$course_details['id'].'.jpg'; ?>" alt="" class="img-fluid">
                                    <span class="preview-text"><?php echo get_phrase('preview_this_course'); ?></span>
                                    <span class="play-btn"></span>
                                </a>
                            </div>
                            <div class="course-sidebar-text-box">
                                <div class="price">
                                    <?php if ($course_details['discount_flag'] == 1): ?>
                                        <span class = "current-price">Rp.<span class="current-price"><?php echo $course_details['discounted_price']; ?></span></span>
                                        <span class="original-price"><?php echo '$'.$course_details['price'] ?></span>
                                        <input type="hidden" id = "total_price_of_checking_out" value="<?php echo $course_details['discounted_price']; ?>">
                                    <?php else: ?>
                                        <span class = "current-price">Rp.<span class="current-price"><?php echo $course_details['price']; ?></span></span>
                                        <input type="hidden" id = "total_price_of_checking_out" value="<?php echo $course_details['price']; ?>">
                                    <?php endif; ?>
                                </div>

                                <?php if(is_purchased($course_details['id'])) :?>
                                    <div class="buy-btns">
                                        <button class="btn btn-buy-now" type="button"><?php echo get_phrase('already_purchased'); ?></button>
                                    </div>
                                <?php else: ?>
                                    <div class="buy-btns">
                                        <a href = "<?php echo site_url('home/shopping_cart'); ?>" class="btn btn-buy-now" id = "course_<?php echo $course_details['id']; ?>" onclick="handleBuyNow(this)"><?php echo get_phrase('buy_now'); ?></a>
                                        <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))): ?>
                                            <button class="btn btn-add-cart addedToCart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><?php echo get_phrase('added_to_cart'); ?></button>
                                        <?php else: ?>
                                            <button class="btn btn-add-cart" type="button" id = "<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><?php echo get_phrase('add_to_cart'); ?></button>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>


                                <div class="includes">
                                    <div class="title"><b><?php echo get_phrase('includes'); ?>:</b></div>
                                    <ul>
                                        <li><i class="far fa-file-video"></i>
                                            <?php
                                                echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']).' '.get_phrase('on_demand_videos');
                                             ?>
                                        </li>
                                        <li><i class="far fa-file"></i><?php echo $this->crud_model->get_lessons('course', $course_details['id'])->num_rows().' '.get_phrase('lessons'); ?></li>
                                        <li><i class="far fa-compass"></i><?php echo get_phrase('full_lifetime_access'); ?></li>
                                        <li><i class="fas fa-mobile-alt"></i><?php echo get_phrase('access_on_mobile_and_tv'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="CoursePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content course-preview-modal">
                    <div class="modal-header">
                        <h5 class="modal-title"><span><?php echo get_phrase('course_preview') ?>:</span><?php echo $course_details['title']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="course-preview-video-wrap">
                            <div class="embed-responsive embed-responsive-16by9">
							
                                <?php if (strtolower(strtolower($video_details['provider'])) == 'youtube'): ?>
                                    <iframe width="100%" height="500" class = "embed-responsive-item"
                                    src="https://www.youtube.com/embed/<?php echo $video_details['video_id']; ?>?modestbranding=1&showsearch=0&rel=0&iv_load_policy=3&cc_load_policy=1&loop=1'" frameborder="0"  allowfullscreen>
                                    </iframe>
                                    <?php elseif (strtolower($video_details['provider']) == 'vimeo'): ?>
                                        <iframe width="100%" height="500" frameborder="0" class ="embed-responsive-item" webkitallowfullscreen mozallowfullscreen allowfullscreen
                                        src="https://player.vimeo.com/video/<?php echo $video_details['video_id']; ?>?title=0&byline=0&portrait=0" >
                                    </iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Modal -->


        <script type="text/javascript">
		
		
        function handleCartItems(elem) {
            url1 = '<?php echo site_url('home/handleCartItems');?>';
            url2 = '<?php echo site_url('home/refreshWishList');?>';
            $.ajax({
                url: url1,
                type : 'POST',
                data : {course_id : elem.id},
                success: function(response)
                {
                    $('#cart_items').html(response);
                    if ($(elem).hasClass('addedToCart')) {
                        $(elem).removeClass('addedToCart')
                        $(elem).text("<?php echo get_phrase('add_to_cart'); ?>");
                    }else {
                        $(elem).addClass('addedToCart')
                        $(elem).text("<?php echo get_phrase('added_to_cart'); ?>");
                    }
                    $.ajax({
                        url: url2,
                        type : 'POST',
                        success: function(response)
                        {
                            $('#wishlist_items').html(response);
                        }
                    });
                }
            });
        }

        function handleBuyNow(elem) {
            url1 = '<?php echo site_url('home/handleCartItemForBuyNowButton');?>';
            url2 = '<?php echo site_url('home/refreshWishList');?>';
            var explodedArray = elem.id.split("_");
            var course_id = explodedArray[1];

            $.ajax({
                url: url1,
                type : 'POST',
                data : {course_id : course_id},
                success: function(response)
                {
                    $('#cart_items').html(response);
                    $.ajax({
                        url: url2,
                        type : 'POST',
                        success: function(response)
                        {
                            $('#wishlist_items').html(response);
                        }
                    });
                }
            });
        }
        </script>

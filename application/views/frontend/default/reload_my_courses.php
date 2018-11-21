<?php $admin_details = $this->user_model->get_admin_details()->row_array(); ?>
<?php foreach ($my_courses as $my_course):
    $course_details = $this->crud_model->get_course_by_id($my_course['id'])->row_array();?>

    <div class="col-lg-3">
        <div class="course-box-wrap">
                <div class="course-box">
                    <a href="<?php echo site_url('home/lesson/'.slugify($course_details['title']).'/'.$my_course['id']); ?>">
                        <div class="course-image">
                            <img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$my_course['id'].'.jpg'; ?>" alt="" class="img-fluid">
                            <span class="play-btn"></span>
                        </div>
                    </a>
                    <div class="course-details">
                        <a href="<?php echo site_url('home/course/'.slugify($course_details['title']).'/'.$my_course['id']); ?>"><h5 class="title"><?php echo $course_details['title']; ?></h5></a>
                        <p class="instructors"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></p>

                        <div class="rating your-rating-box" onclick="event.preventDefault();" data-toggle="modal" data-target="#EditRatingModal">

                            <?php
                             $get_my_rating = $this->crud_model->get_user_specific_rating('course', $my_course['id']);
                             for($i = 1; $i < 6; $i++):?>
                             <?php if ($i <= $get_my_rating['rating']): ?>
                                <i class="fas fa-star filled"></i>
                            <?php else: ?>
                                <i class="fas fa-star"></i>
                             <?php endif; ?>
                            <?php endfor; ?>
                            <p class="your-rating-text" id = "<?php echo $my_course['id']; ?>" onclick="getCourseDetailsForRatingModal(this.id)">
                                <span class="your"><?php echo get_phrase('your'); ?></span>
                                <span class="edit"><?php echo get_phrase('edit'); ?></span>
                                <?php echo get_phrase('rating'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="row" style="padding: 5px;">
                        <div class="col-md-6">
                            <a href="<?php echo site_url('home/course/'.slugify($course_details['title']).'/'.$my_course['id']); ?>" class="btn"><?php echo get_phrase('course_detail'); ?></a>
                        </div>
                        <div class="col-md-6">
                             <a href="<?php echo site_url('home/lesson/'.slugify($course_details['title']).'/'.$my_course['id']); ?>" class="btn"><?php echo get_phrase('start_lesson'); ?></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php endforeach; ?>

<?php
    $admin_details = $this->user_model->get_admin_details()->row_array();
?>
<?php foreach ($my_courses->result_array() as $my_course): ?>
    <div class="col-lg-3">
        <div class="course-box-wrap">
            <a href="">
                <div class="course-box">
                    <div class="course-image">
                        <img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$my_course['id'].'.jpg'; ?>" alt="" class="img-fluid">
                        <div class="instructor-img-hover">
                            <img src="<?php echo base_url().'uploads/user_image/'.$admin_details['id'].'.jpg';?>" alt="">
                            <span>
                                <?php
                                    $lessons = $this->crud_model->get_lessons('course', $my_course['id'])->num_rows();
                                    echo $lessons.' '.get_phrase('lessons');
                                ?>
                            </span>
                            <span>
                                <?php
                                    echo $this->crud_model->get_total_duration_of_lesson_by_course_id($my_course['id']);
                                ?>
                            </span>
                        </div>
                        <div class="wishlist-add wishlisted">
                            <button type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlisted">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="course-details">
                        <h5 class="title"><?php echo $my_course['title']; ?></h5>
                        <p class="instructors"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></p>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star half-filled"></i>
                            <i class="fas fa-star"></i>
                            <p class="d-inline-block rating-number">4.5<span>(23,990)</span></p>
                        </div>
                        <?php if ($my_course['discount_flag'] == 1): ?>
                            <p class="price text-right"><small><?php echo '$'.$my_course['price']; ?></small><?php echo '$'.$my_course['discount_flag']; ?></p>
                        <?php else: ?>
                            <p class="price text-right"><?php echo '$'.$my_course['price']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>

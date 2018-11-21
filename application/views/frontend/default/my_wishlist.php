<?php
    $admin_details = $this->user_model->get_admin_details()->row_array();
?>
<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title"><?php echo get_phrase('my_courses'); ?></h1>
                <ul>
                    <li><a href="<?php echo site_url('home/my_courses'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
                    <li class="active"><a href="#"><?php echo get_phrase('wishlists'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="my-courses-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="my-course-search-bar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('search_my_courses'); ?>" onkeyup="getMyWishListsBySearchString(this.value)">
                            <div class="input-group-append">
                                <button class="btn" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id = "my_wishlists_area">
            <?php foreach ($my_courses->result_array() as $my_course): ?>
                <div class="col-lg-3">
                    <div class="course-box-wrap">
                        <div class="course-box">
                            <div class="course-image">
                                <a href="<?php echo site_url('home/course/'.slugify($my_course['title']).'/'.$my_course['id']); ?>"><img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$my_course['id'].'.jpg'; ?>" alt="" class="img-fluid"></a>
                                <div class="instructor-img-hover">
                                    <a href="<?php echo site_url('home/instructor_page'); ?>"><img src="<?php echo base_url().'uploads/user_image/'.$admin_details['id'].'.jpg';?>" alt=""></a>
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
                                    <button type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlisted" style="cursor : auto;">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="course-details">
                                <a href="<?php echo site_url('home/course/'.slugify($my_course['title']).'/'.$my_course['id']); ?>"><h5 class="title"><?php echo $my_course['title']; ?></h5></a>
                                <p class="instructors"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></p>
                                <?php if ($my_course['discount_flag'] == 1): ?>
                                    <p class="price text-right"><small><?php echo '$'.$my_course['price']; ?></small><?php echo '$'.$my_course['discount_flag']; ?></p>
                                <?php else: ?>
                                    <p class="price text-right"><?php echo '$'.$my_course['price']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script type="text/javascript">
    function getMyWishListsBySearchString(search_string) {
        $.ajax({
            type : 'POST',
            url : '<?php echo site_url('home/get_my_wishlists_by_search_string'); ?>',
            data : {search_string : search_string},
            success : function (response) {
                $('#my_wishlists_area').html(response);
            }
        });
    }
</script>

<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">
                            <?php echo get_phrase('search_results'); ?>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    <?php echo get_phrase('search_results_for').' "'.$search_string.'"'; ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<br>
<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="category-course-list">
                    <ul>
                        <?php
                        $admin_details = $this->user_model->get_admin_details()->row_array();
                        foreach($courses->result_array() as $course):?>
                        <li>
                            <div class="course-box-2">
                                <div class="course-image">
                                    <a href="<?php echo site_url('home/course/'.slugify($course['title']).'/'.$course['id']) ?>">
                                        <img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$course['id'].'.jpg'; ?>" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="course-details">
                                    <a href="<?php echo site_url('home/course/'.slugify($course['title']).'/'.$course['id']) ?>" class="course-title"><?php echo $course['title']; ?></a>
                                    <a href="" class="course-instructor">
                                        <span class="instructor-name"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></span> -
                                    </a>
                                    <div class="course-subtitle">
                                        <?php echo $course['short_description']; ?>
                                    </div>
                                    <div class="course-meta">
                                        <span class=""><i class="fas fa-play-circle"></i>
                                            <?php
                                            $number_of_lessons = $this->crud_model->get_lessons('course', $course['id'])->num_rows();
                                            echo $number_of_lessons.' '.get_phrase('lessons');
                                            ?>
                                        </span>
                                        <span class=""><i class="far fa-clock"></i>
                                            <?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course['id']); ?>
                                        </span>
                                        <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($course['language']); ?></span>
                                    </div>
                                </div>
                                <div class="course-price-rating">
                                    <div class="course-price">
                                        <?php if($course['discount_flag'] == 1): ?>
                                            <span class="current-price"><?php echo '$'.$course['discounted_price']; ?></span>
                                            <span class="original-price"><?php echo '$'.$course['price']; ?></span>
                                        <?php else: ?>
                                            <span class="current-price"><?php echo '$'.$course['price']; ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="rating">
                                        <?php
                                        $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
                                        $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
                                        if ($number_of_ratings > 0) {
                                            $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                        }else {
                                            $average_ceil_rating = 0;
                                        }

                                        for($i = 1; $i < 6; $i++):?>
                                        <?php if ($i <= $average_ceil_rating): ?>
                                            <i class="fas fa-star filled"></i>
                                        <?php else: ?>
                                            <i class="fas fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                                </div>
                                <div class="rating-number">
                                    <?php echo $this->crud_model->get_ratings('course', $course['id'])->num_rows().' '.get_phrase('ratings'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
</div>
</section>

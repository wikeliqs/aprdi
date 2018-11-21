<?php
    if (isset($sub_category_id)) {
        $sub_category_details = $this->crud_model->get_category_details_by_id($sub_category_id)->row_array();
        $category_details     = $this->crud_model->get_categories($sub_category_details['parent'])->row_array();
        $category_name        = $category_details['name'];
        $sub_category_name    = $sub_category_details['name'];
    }
    $admin_details = $this->user_model->get_admin_details()->row_array();
?>

<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $category_name; ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?php echo $sub_category_name; ?>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    <?php echo $sub_category_name; ?>
                </h1>
            </div>
        </div>
    </div>
</section>


<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="category-filter-box filter-box clearfix">
                    <a href = "<?php echo site_url('home/all_category'); ?>" class="btn btn-outline-secondary all-btn"><?php echo get_phrase('all'); ?></a>

                    <?php if (isset($sub_category_id)): ?>
                        <div class="btn-group category-list">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#"data-toggle="dropdown">
                                <?php echo get_phrase('category_list'); ?>
                            </a>
                            <div class="dropdown-menu">
                                <?php foreach ( $this->crud_model->get_sub_categories($category_details['id']) as $sub_category): ?>
                                    <a class="dropdown-item" href="<?php echo site_url('home/category/'.slugify($sub_category['name']).'/'.$sub_category['id']); ?>">
                                        <?php echo $sub_category['name']; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="category-course-list">
                    <ul>
                        <?php
                            if (isset($sub_category_id)) {
                                $array = array('category_id' => $category_details['id'], 'sub_category_id' => $sub_category_id);
                                $this->db->where($array);
                                $courses = $this->db->get('course', $per_page, $this->uri->segment(5));

                            }
                         foreach($courses->result_array() as $course):?>
                        <li>
                            <div class="course-box-2">
                                <div class="course-image">
                                    <a href="<?php echo site_url('home/course/'.slugify($course['title']).'/'.$course['id']) ?>">
                                        <img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$course['id'].'.jpg'; ?>" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="course-details">
                                    <a href="<?php echo site_url('home/course/'.slugify($course['title']).'/'.$course['id']); ?>" class="course-title"><?php echo $course['title']; ?></a>
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
                <nav>
                    <?php echo $this->pagination->create_links(); ?>
                </nav>
            </div>
        </div>
    </div>
</section>

<?php
$admin_details = $this->user_model->get_admin_details()->row_array();
$social_links  = json_decode($admin_details['social_links'], true);
?>
<section class="instructor-header-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="instructor-name"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></h1>
                <h2 class="instructor-title"><?php echo $admin_details['title']; ?></h2>
            </div>
        </div>
    </div>
</section>

<section class="instructor-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="instructor-left-box text-center">
                    <div class="instructor-image">
                        <img src="<?php echo base_url().'uploads/user_image/'.$admin_details['id'].'.jpg';?>" alt="" class="img-fluid">
                    </div>
                    <div class="instructor-social">
                        <ul>
                            <li><a href="<?php echo $social_links['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php echo $social_links['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo $social_links['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="instructor-right-box">

                    <div class="biography-content-box view-more-parent">
                        <!-- <div class="view-more" onclick="viewMore(this,'hide')"><b><?php echo get_phrase('show_full_biography'); ?></b></div> -->
                        <div class="biography-content">
                            <?php echo $admin_details['biography']; ?>
                        </div>
                    </div>

                    <div class="instructor-stat-box">
                        <ul>
                            <li>
                                <div class="small"><?php echo get_phrase('total_student'); ?></div>
                                <div class="num">
                                    <?php
                                    $this->db->select('user_id');
                                    $this->db->distinct();
                                    echo $this->db->get('enroll')->num_rows(); ?>
                                </div>
                            </li>
                            <li>
                                <div class="small"><?php echo get_phrase('courses'); ?></div>
                                <div class="num"><?php echo $this->db->get('course')->num_rows(); ?></div>
                            </li>
                            <li>
                                <div class="small"><?php echo get_phrase('reviews'); ?></div>
                                <div class="num"><?php echo $this->db->get('rating')->num_rows(); ?></div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

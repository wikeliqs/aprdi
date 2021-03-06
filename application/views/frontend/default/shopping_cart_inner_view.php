<div class="col-lg-9">

    <div class="in-cart-box">
        <div class="title"><?php echo sizeof($this->session->userdata('cart_items')).' '.get_phrase('courses_in_cart'); ?></div>
        <div class="">
            <ul class="cart-course-list">
                <?php
                    $actual_price = 0;
                    $total_price  = 0;
                    $admin_details = $this->user_model->get_admin_details()->row_array();
                    foreach ($this->session->userdata('cart_items') as $cart_item):
                    $course_details = $this->crud_model->get_course_by_id($cart_item)->row_array();
                    ?>
                    <li>
                        <div class="cart-course-wrapper">
                            <div class="image">
                                <a href="">
                                    <img src="<?php echo base_url().'uploads/thumbnails/course_thumbnails/'.$cart_item.'.jpg';?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="details">
                                <a href="">
                                    <div class="name"><?php echo $course_details['title']; ?></div>
                                    <div class="instructor">
                                        <?php echo get_phrase('by'); ?>
                                        <span class="instructor-name"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></span>,
                                    </div>
                                </a>
                            </div>
                            <div class="move-remove">
                                <div id = "<?php echo $course_details['id']; ?>" onclick="removeFromCartList(this)"><?php echo get_phrase('remove'); ?></div>
                                <!-- <div>Move to Wishlist</div> -->
                            </div>
                            <div class="price">
                                <a href="">
                                    <?php if ($course_details['discount_flag'] == 1): ?>
                                        <div class="current-price">
                                            <?php
                                                $total_price += $course_details['discounted_price'];
                                                echo '$'.$course_details['discounted_price'];
                                             ?>
                                        </div>
                                        <div class="original-price">
                                            <?php
                                                $actual_price += $course_details['price'];
                                                echo '$'.$course_details['price'];
                                             ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="current-price">
                                            <?php
                                                $actual_price += $course_details['price'];
                                                $total_price  += $course_details['price'];
                                                echo '$'.$course_details['price'];
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <span class="coupon-tag">
                                        <i class="fas fa-tag"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>
<div class="col-lg-3">
    <div class="cart-sidebar">
        <div class="total"><?php echo get_phrase('total'); ?>:</div>
        <div class="total-price"><?php echo '$'.$total_price; ?></div>
        <div class="total-original-price">
            <span class="original-price"><?php echo '$'.$actual_price; ?></span>
            <!-- <span class="discount-rate">95% off</span> -->
        </div>
        <button type="button" class="btn btn-primary btn-block checkout-btn"><?php echo get_phrase('checkout'); ?></button>
    </div>
</div>

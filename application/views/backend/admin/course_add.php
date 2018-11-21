<ol class="breadcrumb bc-3">
    <li class = "active">
        <a href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li><a href="<?php echo site_url('admin/courses'); ?>" class=""><?php echo get_phrase('courses'); ?></a> </li>
    <li><a href="#" class="active"><?php echo get_phrase('add_courses'); ?></a> </li>
</ol>
<h2><i class="fa fa-arrow-circle-o-right"></i> <?php echo $page_title; ?></h2>
<br />
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('add_course_form'); ?>
				</div>
			</div>
			<div class="panel-body">
                <div class="row">
                    <div class="col-md-7">
                        <form class="" action="<?php echo site_url('admin/course_actions/add'); ?>" method="post" enctype="multipart/form-data" novalidate>
                            <div class="panel-group" id="accordion" data-toggle="collapse">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="" data-toggle="collapse" data-parent="#accordion"  href="#collapseTwo">
                                                <?php echo get_phrase('basic_info'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('title'); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name = "title" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('short_description'); ?></label>
                                                    <div class="controls">
                                                        <textarea type="text" rows="5" name = "short_description" class="form-control" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('description'); ?></label>
                                                    <div class="controls">
                                                        <textarea rows="5" class="form-control wysihtml5" data-stylesheet-url="<?php echo base_url('assets/backend/css/wysihtml5-color.css');?>"
                											name="description" placeholder="<?php echo get_phrase('description'); ?>"
                											id="sample_wysiwyg1" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('level'); ?></label>
                                                    <div class="controls">
                                                        <select class="form-control selectboxit" id="level" name="level"required>
                                                            <option value="beginner"><?php echo get_phrase('beginner'); ?></option>
                                                            <option value="advanced"><?php echo get_phrase('advanced'); ?></option>
                                                            <option value="intermediate"><?php echo get_phrase('intermediate'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('language_made_in'); ?></label>
                                                    <div class="controls">
                                                        <select class="form-control" id="language_made_in" name="language_made_in" required>
                                                            <?php
                                                                $fields = $this->db->list_fields('language');
                                                                foreach ($fields as $field):
                                                                $current_default_language	=	$this->db->get_where('settings' , array('key'=>'language'))->row()->value;?>
                                                                <?php if ($field == 'phrase_id' || $field == 'phrase') continue;?>
                                                                <option value="<?php echo $field;?>"
                                                                    <?php if ($current_default_language == $field)echo 'selected';?>> <?php echo ucfirst($field);?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="form-group">
                                                    <div class="checkbox check-success">
                                                        <input id="isTopCourseCheckbox" type="checkbox" value="1" name = "is_top_course" onclick="topCourseChecked(this)">
                                                        <label for="isTopCourseCheckbox" onclick="topCourseChecked(this)"><?php echo get_phrase('is_top_course'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <?php echo get_phrase('outcomes'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-xs-8" id = "outcomes_area">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo get_phrase('outcomes'); ?></label>
                                                        <div class="controls">
                                                            <input type="text" name = "outcomes[]" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div id = "blank_outcome_field">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" name = "outcomes[]" class="form-control" required>
                                                                <button type="button" class = "btn btn-default" name="button" onclick="removeOutcome(this)" style="float: right;margin-right: -52px;margin-top: -37px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2"  style="margin-top: 24px; float: left; margin-left: 0; padding-left: 0;">
                                                    <button type="button" class = "btn btn-default" name="button" onclick="appendOutcome()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                <?php echo get_phrase('category_and_sub_category'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('category'); ?></label>
                                                    <div class="controls">
                                                        <select class="form-control" id="category_id" name="category_id" onchange="ajax_get_sub_category(this.value)" required>
                                                            <option value=""><?php echo get_phrase('select_a_category'); ?></option>
                                                            <?php
                                                                $categories = $this->crud_model->get_categories();
                                                                foreach ($categories->result_array() as $category):?>
                                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                                            <?php endforeach; ?>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('sub_category'); ?></label>
                                                    <div class="controls">
                                                        <select class="form-control" id="sub_category_id" name="sub_category_id" required>
                                                            <option value=""><?php echo get_phrase('select_a_category_first'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                <?php echo get_phrase('requirements'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8 col-xs-8" id = "requirement_area">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo get_phrase('requirements'); ?></label>
                                                            <div class="controls">
                                                                <input type="text" name = "requirements[]" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div id = "blank_requirement_field">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <input type="text" name = "requirements[]" class="form-control" required>
                                                                    <button type="button" class = "btn btn-default" name="button" onclick="removeRequirement(this)" style="float: right;margin-right: -52px;margin-top: -37px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-2"  style="margin-top: 24px; float: left; margin-left: 0; padding-left: 0;">
                                                        <button type="button" class = "btn btn-default" name="button" onclick="appendRequirement()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                                <?php echo get_phrase('price_and_discount'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('price'); ?></label>
                                                    <div class="controls">
                                                        <input type="number" id = "price" name = "price" class="form-control" required onkeyup="calculateDiscountPercentage($('#discounted_price').val())" min="0">
                                                    </div>
                                                </div>

                                                <div class="row-fluid">
                                                    <div class="checkbox check-success">
                                                        <input id="discountCheckbox" type="checkbox" value="1" name = "discount_flag" onclick="priceChecked(this)">
                                                        <label for="discountCheckbox" onclick="priceChecked(this)"><?php echo get_phrase('has_discount'); ?></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><?php echo get_phrase('discounted_price'); ?></label>
                                                    <div class="controls">
                                                        <input type="number" name = "discounted_price" id ="discounted_price" class="form-control" required onkeyup="calculateDiscountPercentage(this.value)" min="0">
                                                    </div>
                                                    <input type="text" class="form-control" name = "discounted_percentage" id = "discounted_percentage" style="float: right; margin-right: -81px; width: 80px; text-align: center; margin-top: -37px;" readonly value="0%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 34px;">
                                <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('add_course'); ?></button>
                            </div>
                    </div>
                    <div class="col-md-5">
                        <div class="panel panel-primary" data-collapsed="0">
                			<div class="panel-body">
                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('course_thumbnail');?></label>

                                    <div class="controls">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <img src="<?php echo base_url('uploads/thumbnails/thumbnail.png');?>" alt="..." required>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                                    <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                                    <input type="file" name="course_thumbnail" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="form-label" style="color: red; font-weight: bold;"><?php echo get_phrase('note').': '.get_phrase('thumbnail_size_should_be_600_X_600');?></label>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('course_overview_url'); ?></label>
                                    <div class="controls">
                                        <input type="text" name = "course_overview_url" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    var blank_outcome = jQuery('#blank_outcome_field').html();
    var blank_requirement = jQuery('#blank_requirement_field').html();
    jQuery(document).ready(function() {
        jQuery('#blank_outcome_field').hide();
        jQuery('#blank_requirement_field').hide();
    });
    function appendOutcome() {
        jQuery('#outcomes_area').append(blank_outcome);
    }
    function removeOutcome(outcomeElem) {
        jQuery(outcomeElem).parent().parent().remove();
    }

    function appendRequirement() {
        jQuery('#requirement_area').append(blank_requirement);
    }
    function removeRequirement(requirementElem) {
        jQuery(requirementElem).parent().parent().remove();
    }

    function ajax_get_sub_category(category_id) {
        console.log(category_id);
        $.ajax({
            url: '<?php echo site_url('admin/ajax_get_sub_category/');?>' + category_id ,
            success: function(response)
            {
                jQuery('#sub_category_id').html(response);
            }
        });
    }

    function priceChecked(elem){
        if (jQuery('#discountCheckbox').is(':checked')) {

            jQuery('#discountCheckbox').prop( "checked", false );
        }else {

            jQuery('#discountCheckbox').prop( "checked", true );
        }
    }

    function topCourseChecked(elem){
        if (jQuery('#isTopCourseCheckbox').is(':checked')) {

            jQuery('#isTopCourseCheckbox').prop( "checked", false );
        }else {

            jQuery('#isTopCourseCheckbox').prop( "checked", true );
        }
    }

    function calculateDiscountPercentage(discounted_price) {
        if (discounted_price > 0) {
            var actualPrice = jQuery('#price').val();
            if ( actualPrice > 0) {
                var reducedPrice = actualPrice - discounted_price;
                var discountedPercentage = (reducedPrice / actualPrice) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#discounted_percentage').val(discountedPercentage.toFixed(2) + "%");

                }else {
                    jQuery('#discounted_percentage').val('<?php echo get_phrase('0%') ?>');
                }
            }
        }
    }
</script>

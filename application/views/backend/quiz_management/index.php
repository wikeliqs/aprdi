
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard'); ?>">
			<i class="entypo-folder"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li><a href="#" class="active"><?php echo get_phrase('courses'); ?></a> </li>
</ol>
<h2><i class="fa fa-arrow-circle-o-right"></i> <?php echo $page_title; ?></h2>
<br />

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<a href = "<?php echo site_url('admin/course_form/add_course'); ?>" class="btn btn-block btn-info btn-lg" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_course'); ?></a>
					</div>
				</div>
				<hr>
				<div class="row">
					<form class="" action="<?php echo site_url('admin/courses'); ?>" method="post">
						<div class="col-md-4">
							<select class="form-control" id="source" name="category_id" required onchange="ajax_get_sub_category(this.value)">
								<option value=""><?php echo get_phrase('select_category'); ?></option>
								<?php
								foreach ($categories->result_array() as $category):?>
									<option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $default_category_id) echo 'selected'; ?>><?php echo $category['name']; ?></option>
								<?php endforeach; ?>
							
							</select>
						</div>
						
						<div class="col-md-4" id = "sub_category_area">
							<select class="form-control" id="sub_category_id" name="sub_category_id" required>
								<option value=""><?php echo get_phrase('select_category'); ?></option>
								<?php foreach ($sub_categories as $sub_category): ?>
									<option value="<?php echo $sub_category['id']; ?>" <?php if($sub_category['id'] == $default_sub_category_id) echo 'selected'; ?>><?php echo $sub_category['name']; ?></option>
								<?php endforeach; ?>
							
							</select>
						</div>
						
						<div class="col-md-4">
							<button type="submit" class="btn btn-block btn-default btn-lg" name="button"><i class="fa fa-search"></i> Filter</button>
						</div>
					</form>
				</div>
				<br>
				<table class="table table-bordered datatable" id="table-1">
					<thead>
					<tr>
						<th><?php echo get_phrase('title'); ?></th>
						<th><?php echo get_phrase('category'); ?></th>
						<th><?php echo get_phrase('number_of_sections'); ?></th>
						<th><?php echo get_phrase('number_of_lessons'); ?></th>
						<th><?php echo get_phrase('number_of_enrolled_users'); ?></th>
						<th><?php echo get_phrase('action'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($course_name->result_array() as $course): ?>
						<tr>
							<td><?php echo $course['title']; ?></td>
							<td>
								<?php
								$category_details = $this->crud_model->get_categories($course['category_id'])->row_array();
								
								echo $category_details['name'];
								?>
							</td>
							<td hidden>
								<ul style="list-style-type:square">
									<?php
									$lessons = $this->crud_model->get_lessons('course', $course['id'])->result_array();
									foreach ($lessons as $lesson):?>
										<a href="<?php echo site_url('admin/watch_video/'.slugify($lesson['title']).'/'.$lesson['id']); ?>"><li><?php echo $lesson['title']; ?></li></a>
									<?php endforeach; ?>
								</ul>
							</td>
							<td>
								<?php
								$sections = $this->crud_model->get_section('course', $course['id']);
								echo $sections->num_rows();
								?>
							</td>
							<td>
								<?php
								$lessons = $this->crud_model->get_lessons('course', $course['id']);
								echo $lessons->num_rows();
								?>
							</td>
							<td>
								<?php
								$enroll_history = $this->crud_model->enroll_history($course['id']);
								echo $enroll_history->num_rows();
								?>
							</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-small btn-default btn-demo-space"><?php echo get_phrase('action'); ?></button>
									<button class="btn btn-small btn-default dropdown-toggle btn-demo-space" data-toggle="dropdown"> <span class="caret"></span> </button>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo site_url('admin/course_actions/view_details/'.$course['id']); ?>">
												<?php echo get_phrase('view_course_details');?>
											</a>
										</li>
										
										<li>
											<a href="<?php echo site_url('admin/sections/'.$course['id']); ?>">
												<?php echo get_phrase('manage_section');?>
											</a>
										</li>
										
										<li>
											<a href="<?php echo site_url('admin/lessons/'.$course['id']); ?>">
												<?php echo get_phrase('manage_lesson');?>
											</a>
										</li>
										
										<li>
											<a href="<?php echo site_url('admin/course_form/course_edit/'.$course['id']) ?>">
												<?php echo get_phrase('edit');?>
											</a>
										</li>
										
										<li class="divider"></li>
										<li>
											<a href="#" onclick="confirm_modal('<?php echo site_url('admin/course_actions/delete/'.$course['id']); ?>');">
												<?php echo get_phrase('delete');?>
											</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function ajax_get_sub_category(category_id) {
        $.ajax({
            url: '<?php echo site_url('admin/ajax_get_sub_category/');?>' + category_id ,
            success: function(response)
            {
                jQuery('#sub_category_id').html(response);
                console.log(response);
            }
        });
    }
</script>
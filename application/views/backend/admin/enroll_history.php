<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li><a href="#" class="active"><?php echo get_phrase('enroll_history'); ?></a> </li>
</ol>
<h2><i class="fa fa-arrow-circle-o-right"></i> <?php echo $page_title; ?></h2>
<br />

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
                <!-- REPORT DATE RANGE SELECTOR STARTS-->
                <div class="form-group">

                	<div class="col-sm-4 col-sm-offset-4">
                        <form class="form-inline" action="<?php echo site_url('admin/enroll_history/filter_by_date_range') ?>" method="post">
                            <div class="col-md-10">
                                <div class="daterange daterange-inline add-ranges" data-format="D MMMM, YYYY" style="cursor:text;"
                        			data-start-date="<?php echo date("d F, Y" , $timestamp_start);?>" data-end-date="<?php echo date("d F, Y" , $timestamp_end);?>">
                        			<i class="entypo-calendar"></i>
                        				<span id="date_range_selector" style="font-size: 12px;color:#000;">
                        					<?php echo date("d M, Y" , $timestamp_start) . " - " . date("d M, Y" , $timestamp_end);?>
                        				</span>
                        				<input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                        		</div>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-info" id="submit-button"
                        			onclick="update_date_range();">
                        			<?php echo get_phrase('filter');?>
                        				</button>
                            </div>
                        </form>
                	</div>
                </div>
                <br>
                <hr>
                <table class="table table-bordered datatable" id="table-1">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('photo'); ?></th>
                            <th><?php echo get_phrase('user_name'); ?></th>
                            <th><?php echo get_phrase('email'); ?></th>
                            <th><?php echo get_phrase('enrolled_course'); ?></th>
                            <th><?php echo get_phrase('enrollment_date'); ?></th>
                            <th><?php echo get_phrase('actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enroll_history->result_array() as $enroll):
                            $user_data = $this->db->get_where('users', array('id' => $enroll['user_id']))->row_array();
                            $course_data = $this->db->get_where('course', array('id' => $enroll['course_id']))->row_array();?>
                            <tr class="gradeU">
                                <td>
                                    <?php
                                     if (file_exists('uploads/user_image/'.$enroll['user_id'].'.jpg')): ?>
                                         <img src="<?php echo base_url().'uploads/user_image/'.$enroll['user_id'].'.jpg'; ?>" alt="" height="50" width="50">
                                    <?php else: ?>
                                        <img src="<?php echo base_url().'uploads/user_image/placeholder.png';?>" alt="" height="50" width="50" class="img-fluid">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $user_data['first_name'].' '.$user_data['last_name']; ?>
                                </td>
                                <td><?php echo $user_data['email']; ?></td>
                                <td><?php echo $course_data['title']; ?></td>
                                <td><?php echo date('D, d-M-Y', $enroll['date_added']); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-small btn-default btn-demo-space"><?php echo get_phrase('action'); ?></button>
                                        <button class="btn btn-small btn-default dropdown-toggle btn-demo-space" data-toggle="dropdown"> <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?php echo site_url('admin/enroll_history_delete/'.$enroll['id']); ?>');">
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

<script>
function update_date_range()
{
	var x = $("#date_range_selector").html();
	$("#date_range").val(x);
}
</script>

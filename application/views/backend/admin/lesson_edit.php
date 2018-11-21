<?php
    $lesson_details = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
    $sections = $this->crud_model->get_section('course', $course_id)->result_array();
?>

<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li><a href="<?php echo site_url('admin/lessons/'.$course_id); ?>" class=""><?php echo get_phrase('lessons'); ?></a> </li>
    <li><a href="#" class="active"><?php echo get_phrase('edit_lesson'); ?></a> </li>
</ol>
<h2><?php echo $page_title; ?></h2>
<br />

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('edit_lesson_form'); ?>
				</div>
			</div>
			<div class="panel-body">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo site_url('admin/lessons/'.$course_id.'/edit'.'/'.$lesson_id); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
                            <div class="col-sm-5">
                                <input type="text" name = "title" class="form-control" required value="<?php echo $lesson_details['title']; ?>">
                            </div>
                        </div>

                        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('section'); ?></label>
                            <div class="col-sm-5">
                                <select class="form-control" id="section_id" name="section_id" data-init-plugin="select2" required>
                                    <?php foreach ($sections as $section): ?>
                                        <option value="<?php echo $section['id']; ?>" <?php if($lesson_details['section_id'] == $section['id']) echo 'selected'; ?>><?php echo $section['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('video_url'); ?></label>
                            <div class="col-sm-5">
                                <input type="text" id = "video_url" name = "video_url" class="form-control" required value="<?php echo $lesson_details['video_url']; ?>">
                                <button type="button" class = "btn btn-md btn-info" name="button" onclick="ajax_get_video_details(jQuery('#video_url').val());" style="float: right; margin-right: -50px; margin-top: -35px;"><i class="fa fa-refresh" id = "refresh" aria-hidden="true"></i></button>
                                <label class="form-label" id = "invalid_url" style ="margin-top: 4px; color: red; display: none;"><?php echo get_phrase('invalid_url').'. '.get_phrase('your_video_source_has_to_be_either_youtube_or_vimeo'); ?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('duration'); ?></label>
                            <div class="col-sm-5">
                                <input type="text" name = "duration" id = "duration" class="form-control" required readonly value="<?php echo $lesson_details['duration']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('thumbnail'); ?></label>
                            <div class="col-sm-5">
                                <input type="file" name = "thumbnail" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button class = "btn btn-success" type="submit" name="button" onclick="ajax_get_video_details(jQuery('#video_url').val());"><?php echo get_phrase('edit_lesson'); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
				<video   id="video_player" width="320" height="240" controls>
					<source src="" type="video/mp4">
				</video>
			</div>
			
			
		</div>
	</div>
</div>
<script type="text/javascript">
 
   /*  function ajax_get_section(course_id) {
        $.ajax({
            url: '<?php echo site_url('admin/ajax_get_section/');?>' + course_id ,
            success: function(response)
            {
                jQuery('#section_id').html(response);
            }
        });
    }
 */
    function ajax_get_video_details(video_url) {
		 // alert('tes');
		 
          if(checkURLValidity(video_url)){
            $('#refresh').addClass('fa-spin');
            $.ajax({
                url: '<?php echo site_url('admin/ajax_get_video_details');?>',
                type : 'POST',
                data : {video_url : video_url},
                success: function(response)
                {
                    jQuery('#duration').val(response);
                    $('#refresh').removeClass('fa-spin');
                }
            });
        }else { 
		 
			 $('#video_player').attr('src',video_url);
			  var myVideoPlayer = document.getElementById("video_player");
			  myVideoPlayer.addEventListener('loadedmetadata', function () {
			 
			 var duration = myVideoPlayer.duration;
			 var durasi = SecondsTohhmmss(duration.toFixed(0));
			 var strdurasi = durasi.toString();
			 alert(strdurasi);
			   $('#duration').val(strdurasi);  
           
        });    
		}
    } 

    function checkURLValidity(video_url) {
        var youtubePregMatch = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
        var vimeoPregMatch = /^(http\:\/\/|https\:\/\/)?(www\.)?(vimeo\.com\/)([0-9]+)$/;
        if (video_url.match(youtubePregMatch)) {
            return true;
        }
        else if (vimeoPregMatch.test(video_url)) {
            return true;
        }
        else {
            return false;
        }
    }
	
	var SecondsTohhmmss = function(totalSeconds) {
  var hours   = Math.floor(totalSeconds / 3600);
  var minutes = Math.floor((totalSeconds - (hours * 3600)) / 60);
  var seconds = totalSeconds - (hours * 3600) - (minutes * 60);

  // round seconds
  seconds = Math.round(seconds * 100) / 100

  
   var   result =   (minutes < 10 ? "0" + minutes : minutes);
      result += ":" + (seconds  < 10 ? "0" + seconds : seconds);
  return result;
	}
</script>

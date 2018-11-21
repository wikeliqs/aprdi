<?php
    $lesson_details = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
    $video_details  = $this->video_model->getVideoDetails($video_url);
?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>" class=""><?php echo get_phrase('dashboard'); ?></a> </li>
    <li><a href="<?php echo site_url('admin/lessons/').$lesson_details['course_id']; ?>"><?php echo get_phrase('lessons'); ?></a> </li>
    <li><a href="#" class="active"><?php echo get_phrase('video_player'); ?></a> </li>
</ul>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3><?php echo $page_title; ?></h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <div class="grid simple">
                <div class="grid-title no-border">
                    <h4><?php echo $lesson_details['title']; ?></h4>
                </div>
                <div class="grid-body no-border">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php if (strtolower($provider) == 'youtube'): ?>
                                <iframe width="100%" height="500"
                                    src="https://www.youtube.com/embed/<?php echo $video_details['video_id'];?>" frameborder="0" allowfullscreen>
                                </iframe>
                            <?php elseif (strtolower($provider) == 'vimeo'): ?>
                                <iframe width="100%" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen
                                    src="https://player.vimeo.com/video/<?php echo $video_details['video_id'];?>?title=0&byline=0&portrait=0" >
                                </iframe>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();

if (!isset($lesson_id)) {
    $section_id = $sections[0];

}else {
    $section_id = $this->db->get_where('lesson', array('id' => $lesson_id))->row()->section_id;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="accordion" id="accordionExample">
                <?php
                $section_counter = 0;
                foreach ($sections as $section):
                    $section_counter++;
                    $section_details = $this->crud_model->get_section('section', $section)->row_array();
                    $lessons = $this->crud_model->get_lessons('section', $section)->result_array();
                    ?>
                    <div class="card" style="margin:10px 0px;">
                        <div class="card-header" id="<?php echo 'heading-'.$section; ?>">

                            <h5 class="mb-0">
                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="<?php echo '#collapse-'.$section; ?>" aria-expanded="true" aria-controls="<?php echo 'collapse-'.$section; ?>" style="color: #535a66; background: none; border: none;">
                                    <h6 style="color: #686f7a; font-size: 15px;">section <?php echo $section_counter;?></h6> 
                                    <?php echo $section_details['title']; ?>
                                </button>
                            </h5>
                        </div>

                        <div id="<?php echo 'collapse-'.$section; ?>" class="collapse <?php if($section_id == $section) echo 'show'; ?>" aria-labelledby="<?php echo 'heading-'.$section; ?>" data-parent="#accordionExample">
                            <div class="card-body"  style="padding:0px;">
                                <table style="width: 100%;">
                                    <?php foreach ($lessons as $lesson): ?>

                                        <tr style="width: 100%; padding: 5px 0px;">
                                            <td style="text-align: left;padding:10px; border-bottom:1px solid #ccc;">
                                                <a href="<?php echo site_url('home/lesson/'.slugify($course_details['title']).'/'.$course_id.'/'.$lesson['id']); ?>" id = "<?php echo $lesson['id']; ?>">
                                                    <i class="fa fa-play" style="font-size: 12px;color: #909090;padding: 10px;"></i>
                                                    <?php echo $lesson['title']; ?>
                                                        
                                                </a>
                                            </td>
                                            <td style="text-align: right; padding:10px; border-bottom:1px solid #ccc;">
                                                <span class="lesson_duration">
                                                    <?php echo $lesson['duration']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-9" id = "video_player_area">
            <div class="" style="background-color: #333;">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php if (strtolower($provider) == 'youtube'): ?>
                        <iframe width="100%" height="500" class = "embed-responsive-item"
                        src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen>
                    </iframe>
                <?php elseif (strtolower($provider) == 'vimeo'): ?>
                    <iframe width="100%" height="500" frameborder="0" class ="embed-responsive-item" webkitallowfullscreen mozallowfullscreen allowfullscreen
                    src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&byline=0&portrait=0" >
                </iframe>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>

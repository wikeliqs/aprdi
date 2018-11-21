<?php
    $paypal_settings = $this->db->get_where('settings', array('key' => 'paypal'))->row()->value;
    $paypal = json_decode($paypal_settings);
    $stripe_settings = $this->db->get_where('settings', array('key' => 'stripe_keys'))->row()->value;
    $stripe = json_decode($stripe_settings);
?>

<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li><a href="#" class="active"><?php echo get_phrase('payment_settings'); ?></a> </li>
</ol>

<h2><i class="fa fa-arrow-circle-o-right"></i> <?php echo $page_title; ?></h2>
<br />
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
                <div class="panel-group" id="accordion" data-toggle="collapse">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="" data-toggle="collapse" data-parent="#accordion"  href="#collapseTwo">
                                    <?php echo get_phrase('paypal_settings'); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <form class="" action="<?php echo site_url('admin/payment_settings/update'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo get_phrase('client_id').' ('.get_phrase('sandbox').')'; ?></label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="sandbox_client_id" value="<?php echo $paypal[0]->sandbox_client_id;?>"  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label"><?php echo get_phrase('client_id').' ('.get_phrase('production').')'; ?></label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="production_client_id" value="<?php echo $paypal[0]->production_client_id;?>"  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label"><?php echo get_phrase('active'); ?></label>
                                        <div class="controls">
                                            <select class="form-control select2" id="source" name="paypal_active" data-init-plugin="select2" >
                                                <option value="0"
                                            <?php if ($paypal[0]->active == 0) echo 'selected';?>>
                                                <?php echo get_phrase('no');?></option>
                                        <option value="1"
                                            <?php if ($paypal[0]->active == 1) echo 'selected';?>>
                                                <?php echo get_phrase('yes');?></option>
                                                <option value=""disabled></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label"><?php echo get_phrase('mode'); ?></label>
                                        <div class="controls">
                                            <select class="form-control select2" id="source" name="paypal_mode" data-init-plugin="select2" >
                                                <option value="sandbox"
                                            <?php if ($paypal[0]->mode == 'sandbox') echo 'selected';?>>
                                            <?php echo get_phrase('sandbox');?></option>
                                        <option value="production"
                                            <?php if ($paypal[0]->mode == 'production') echo 'selected';?>>
                                            <?php echo get_phrase('production');?></option>
                                                <option value=""disabled></option>
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
                                <a class="" data-toggle="collapse" data-parent="#accordion"  href="#collapseThree">
                                    <?php echo get_phrase('stripe_settings'); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('active'); ?></label>
                                    <div class="controls">
                                        <select class="form-control select2" id="source" name="stripe_active" data-init-plugin="select2" >
                                            <option value="0"
                                                    <?php if ($stripe[0]->active == 0) echo 'selected';?>>
                                                        <?php echo get_phrase('no');?></option>
                                                <option value="1"
                                                    <?php if ($stripe[0]->active == 1) echo 'selected';?>>
                                                        <?php echo get_phrase('yes');?></option>
                                            <option value=""disabled></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('testmode'); ?></label>
                                    <div class="controls">
                                        <select class="form-control select2" id="source" name="testmode" data-init-plugin="select2" >
                                            <option value="on"
                                               <?php if ($stripe[0]->testmode == 'on') echo 'selected';?>>
                                                   <?php echo get_phrase('on');?></option>
                                           <option value="off"
                                               <?php if ($stripe[0]->testmode == 'off') echo 'selected';?>>
                                                   <?php echo get_phrase('off');?></option>
                                            <option value=""disabled></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('test_secret_key') ?></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="secret_key" value="<?php echo $stripe[0]->secret_key;?>"  />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('test_public_key') ?></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="public_key" value="<?php echo $stripe[0]->public_key;?>"  />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('live_secret_key') ?></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="secret_live_key" value="<?php echo $stripe[0]->secret_live_key;?>"  />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo get_phrase('live_public_key') ?></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="public_live_key" value="<?php echo $stripe[0]->public_live_key;?>"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('save_changes'); ?></button>
                </div>
            </form>
			</div>
		</div>
	</div>
</div>

<div class="row top-bar">
	<div class="col-md-12 clearfix hidden-xs">
		<h3 style="float:left; margin:0px;">{{ get_settings('system_name') }}</h3>
		<a href="{{ base_url() }}" class="btn btn-default btn-icon" style="margin: 0px 15px;" target="_blank">
			View frontend <i class="entypo-forward"></i>
		</a>
		<ul class="user-info pull-right pull-none-xsm ">
			<!-- Profile Info -->
			<li class="profile-info pull-right dropdown"><!-- add class "pull-right" if you want to place this from right -->

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{ base_url('uploads/user_image/'.$ci->session->userdata('user_id').'.jpg') }}" alt="" class="img-circle" width="44" />
					@php
						$admin_details = $ci->user_model->get_all_user($ci->session->userdata('user_id'))->row_array();
						echo $admin_details['first_name'].' '.$admin_details['last_name'];
					@endphp
				</a>

				<ul class="dropdown-menu">

					<!-- Reverse Caret -->
					<li class="caret"></li>

					<!-- Profile sub-links -->
					<li>
						<a href="{{ site_url('admin/manage_profile') }}">
							<i class="entypo-user"></i>
							{{ get_phrase('edit_profile') }}
						</a>
					</li>

					<li>
						<a href="{{ site_url('login/logout') }}">
							<i class="entypo-logout left"></i>
							{{ get_phrase('log_out') }}
						</a>
					</li>
				</ul>
			</li>

		</ul>
	</div>
</div>

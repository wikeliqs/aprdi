<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pendaftaran</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/registration/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

		<!-- DATE-PICKER -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/registration/vendor/date-picker/css/datepicker.min.css">

		<!-- STYLE CSS -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/registration/css/style.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="image-holder">
				<img src="<?php echo base_url(); ?>assets/registration/images/form-wizard.png" alt="">
			</div>
            <form style="display:none" action="<?php echo site_url('login/register'); ?>" id="wizard-pribadi" action="">
            	<div class="form-header">
            		<a href="#">#OnlineClass Waperd</a>
            		<h3>Register for the course online</h3>
            	</div>
            	<div id="wizard">
            		<!-- SECTION 1 -->
	                <h4></h4>
	                <section  id="unpribadi">
					 <div class="form-row" style="margin-bottom: 50px;">
	                    	<label for="">
	                    		Daftar Sebagai:
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input id="tipe_daftar" type="radio"   value="0" checked> Personal<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input id="tipe_daftar"  type="radio"  value="1"> Institusi<br>
										<span class="checkmark"></span>
									</label>
									 
								</div>
	                    	</div>
	                    </div>
					
	                </section>
					<!-- SECTION 2 -->
					 <h4></h4>
					 
					 <section id="pribadi-1">
	                    
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Sesuai KTP
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control"  name="data[nm_ktp]" placeholder="">
	                    	</div>
	                    </div>	
						<div class="form-row">
	                    	<label for="">
	                    		Nama Panggilan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control"  name="data[first_name]" placeholder="">
	                    	</div>
	                    </div>
	                    <div class="form-row">
	                    	<label for="">
	                    		Jenis Kelamin
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input type="radio" name="data[kelamin]" value="male" checked> Laki-Laki<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="data[kelamin]" value="female"> Perempuan<br>
										<span class="checkmark"></span>
									</label>
									 
								</div>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Status Pernikahan:
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input type="radio" name="data[marital]" value="male" checked> Kawin<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="data[marital]" value="female"> Belum Kawin<br>
										<span class="checkmark"></span>
									</label>
									 
								</div>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Tgl. Lahir
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[tgl_lahir]" readonly data-view="years" class="form-control datepicker-here" data-date-format="dd-mm-yyyy" data-language='en'  id="dp1">
	                    	</div>
	                    </div>		
	                </section>
					
	                <!-- SECTION 3 -->
	                
	                <h4></h4>
	                <section id="pribadi-2">
	                    <div class="form-row">
	                    	<label for="">
	                    		Pendidikan Terakhir
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="data[pendidikan]" id="" class="form-control">
									<option value="canvas" class="option">SMA</option>
									<option value="svg" class="option">D3</option>
									<option value="svg" class="option">S1</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
						 <div class="form-row" style="margin-bottom: 50px;">
	                    	<label for="">
	                    		Pendidikan Reksa Dana
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input type="radio" name="data[rdc]" value="1" checked> Ya<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="data[rdc]" value="0"> Tidak<br>
										<span class="checkmark"></span>
									</label>
									 
								</div>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Lembaga Pendidikan Reksa Dana
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[nm_rdc]" class="form-control">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		No. KTP
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[no_ktp]" class="form-control">
	                    	</div>
	                    </div>	
	                    <div class="form-row" style="margin-bottom: 3.4vh">
	                    	<label for="">
	                    		Kewarganegaraan 
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="data[kwn]" id="" class="form-control">
									<option value="canvas" class="option">WNI</option>
									<option value="svg" class="option">WNA</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
	                   	
	                </section>
					<!-- SECTION 4 -->
	                <h4></h4>
	                <section id="pribadi-3">
	                    <div class="form-row">
	                    	<label for="">
	                    		Upload Pas Photo Berwarna
	                    	</label>
	                    	<div class="form-holder">
	                    		<input onchange="readURL(this);" type="file" id="photo" name="data[photo]" class="form-control" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="photo_view" src="http://www.waperd.or.id/FileUpload/no_image.gif"   />
	                    	</div>
	                    </div>	
                     	 
	                </section>
					<!-- SECTION 5 -->
	                <h4></h4>
					 <section id="pribadi-4">
	                    <div class="form-row">
	                    	<label for="">
	                    		Upload KTP
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="file"  name="data[file_ktp]" class="form-control" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="blah" src="http://www.waperd.or.id/FileUpload/no_image.gif"   />
	                    	</div>
	                    </div>	
                     	 
	                </section>
					<!-- SECTION 6 -->
	                <h4></h4>
					<section id="pribadi-5">
	                    <div class="form-row">
	                    	<label for="">
	                    		Alamat Tinggal Sekarang
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[alamat_rumah]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		RT / RW
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" value="000/000" name="data[rtrw]" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Kode Pos
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" id="kode_pos" name="data[kode_pos]" placeholder="">
	                    	</div>
	                    </div>
						<div class="form-row">
	                    	<label for="">
	                    		Kelurahan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" id="kelurahan" name="data[kelurahan]"  placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kecamatan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" id="kecamatan" name="data[kecamatan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kota / Kabupaten
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" id="kabupaten" name="data[kabupaten]" placeholder="">
	                    	</div>
	                    </div>	
	                     
	                </section>
					<!-- SECTION 7 -->
	                <h4></h4>
					 <section id="pribadi-6">
	                    <div class="form-row">
	                    	<label for="">
	                    		SK Waperd
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="file" name="data[sk_waperd]" class="form-control" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="blah" src="http://www.waperd.or.id/FileUpload/no_image.gif"   />
	                    	</div>
	                    </div>	
                     	 
	                </section>
					<!-- SECTION 6 -->
	                <h4></h4>
					 
					 
					<section  >
						<div class="form-row" style="margin-bottom: 26px;">
	                    	<label for="">
	                    		Nama Perusahaan
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="data[nm_perusahaan]" id="type_pendaftaran" class="form-control selectpicker" data-live-search="true" >
								<?php
																						
								foreach ($prsh_assets as $row)
									{
											echo "<option class='option' value='$row->id_type'>$row->nm_type</option>";
									}
								?>
								</select>
								
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
	                    
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Gedung
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="nm_gedung" class="form-control" name="data[alamat_perusahaan]" value="000/000" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Lantai 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="lantai" class="form-control" name="data[nm_perusahaan]" placeholder="">
	                    	</div>
	                    </div>
						<div class="form-row">
	                    	<label for="">
	                    		Jalan 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="alamat" class="form-control" name="data[alamat_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kode Pos 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="kd_pos" class="form-control" name="data[kode_pos_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kota / Kabupaten
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="kabupaten_prsh" class="form-control" name="data[kota_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                     
	                </section>
					<!-- SECTION 8 -->
					<h4></h4>
					
	                <section  >
	                    <div class="form-row">
	                    	<label for="">
	                    		 Telp. Kantor
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[tlp_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		 Fax
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control"name="data[fax_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		 Handphone
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[hp]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		 Telp. Rumah
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[tlp_rumah]" placeholder="">
	                    	</div>
	                    </div>	
	                   
	                </section>
					 <h4></h4>
					 <!-- SECTION 9 -->
	                <section id="perusahaan" >
	                    
	                    <div class="form-row">
	                    	<label for="">
	                    		Alamat Email
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="email" class="form-control" name="data[email]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Password
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="password" class="form-control" name="data[password]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Konfirmasi Password
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="password" class="form-control" name="data[password]" placeholder="">
	                    	</div>
	                    </div>	
						
	                     <div class="form-row">
	                    	<label for="">
	                    		Chapta
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle" style="margin-bottom: 48px;">
									<div class="g-recaptcha" data-sitekey="6Leq2SYTAAAAAC6UjI2YaXuV2G9haYnBa7bycVNe"></div>
								</div>
	                    	</div>
	                    </div>	
	                    <div class="checkbox-circle" style="margin-bottom: 48px;">
							<label>
								<input type="checkbox" checked>I agree all statement in Terms & Conditions
								<span class="checkmark"></span>
							</label>
						</div> 	
	                    
							
	                    
						  
	                </section>
            	</div>
            </form>
			
			
			
			
			<form id="wizard-perusahaan" action="<?php echo site_url('login/register'); ?>" action="" style="display:none">
            	<div class="form-header">
            		<a href="#">#OnlineClass Waperd</a>
            		<h3>Register for the course online</h3>
            	</div>
            	<div id="wizard" class="wizard-prsh">
            		<!-- SECTION 1 -->
	                <h4></h4>
	                <section  >
					 <div class="form-row" style="margin-bottom: 50px;">
	                    	<label for="">
	                    		Daftar Sebagai:
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input id="tipe_daftar" type="radio"   value="0" > Personal<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input id="tipe_daftar"  type="radio"   value="1" checked> Institusi<br>
										<span class="checkmark"></span>
									</label>
									 
								</div>
	                    	</div>
	                    </div>
					
	                </section>
					<!-- SECTION 2 -->
					 <h4></h4>
					     
					<section  >
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Perusahaan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[nm_type]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Gedung
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[nm_gedung]" value="" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Lantai 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[lantai]" placeholder="">
	                    	</div>
	                    </div>
						<div class="form-row">
	                    	<label for="">
	                    		Jalan 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[alamat]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kode Pos 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" id="kd_pos" name="data[kd_pos]" value="000/000" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kota / Kabupaten
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[kabupaten]" placeholder="">
	                    	</div>
	                    </div>	
	                     
	                </section>
					<!-- SECTION 8 -->
					<h4></h4>
					 <section id="pribadi-3">
	                    <div class="form-row">
	                    	<label for="">
	                    		Upload Pas Photo Berwarna
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="file" class="form-control" name="data[photo]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="blah" src="http://placehold.it/180"   />
	                    	</div>
	                    </div>	
                     	 
	                </section>
					<!-- SECTION 5 -->
	                <h4></h4>
	                <section>
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Contact
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="tel" name="data[pic]" pattern="\(\d\d\d\)-\d\d\d\d\d\d\d" name="telepon" placeholder="(999)-99999999" required class="form-control"  >
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Jabatan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[jabatan]" class="form-control" placeholder="Ex. Intro to physic">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		 Telepon
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[tlp]" placeholder="Ex. 3679 or 33fa, 4295">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Fax
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[fax]" placeholder="Ex. 3679 or 33fa, 4295">
	                    	</div>
	                    </div>	
	                   <div class="form-row">
	                    	<label for="">
	                    		No, HP
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" name="data[hp]" placeholder="Ex. 3679 or 33fa, 4295">
	                    	</div>
	                    </div>
	                </section>
					 <h4></h4>
					 <!-- SECTION 9 -->
	                <section id="perusahaan" >
	                    
	                    <div class="form-row">
	                    	<label for="">
	                    		Alamat Email
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="email" name="data[email]" class="form-control" placeholder="Email">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Password
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="password" name="data[password]" class="form-control" placeholder="Password">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Konfirmasi Password
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="password" name="data[password]" class="form-control" placeholder="Password">
	                    	</div>
	                    </div>	
						
	                     <div class="form-row">
	                    	<label for="">
	                    		Chapta
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle" style="margin-bottom: 48px;">
									<div class="g-recaptcha" data-sitekey="6Leq2SYTAAAAAC6UjI2YaXuV2G9haYnBa7bycVNe"></div>
								</div>
	                    	</div>
	                    </div>	
	                    <div class="checkbox-circle" style="margin-bottom: 48px;">
							<label>
								<input type="checkbox" checked>I agree all statement in Terms & Conditions
								<span class="checkmark"></span>
							</label>
						</div> 	
	                    
							
	                    
						  
	                </section>
            	</div>
            </form>
			
		</div>
		<div id="wait" class="container col-sm-6 col-sm-offset-3" style="display:none;position: fixed;z-index: 999;height: 2em;width: 15em;overflow: show;margin: auto;top: 0;left: 0;bottom: 0;right: 0;" ><img class="img-responsive" src='<?php echo base_url().'assets/loader.gif'; ?>' style="float: none;margin: 0 auto;" /></div>

		<script src="<?php echo base_url(); ?>assets/registration/js/jquery-latest.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/registration/js/jquery-3.3.1.min.js"></script>
		
		<!-- JQUERY STEP -->
		<script src="<?php echo base_url(); ?>assets/registration/js/jquery.steps.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

		<!-- DATE-PICKER -->
		
		<script src="<?php echo base_url(); ?>assets/registration/vendor/date-picker/js/datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/registration/vendor/date-picker/js/datepicker.en.js"></script>

		<script src="<?php echo base_url(); ?>assets/registration/js/main.js"></script>
<!-- Template created and distributed by Colorlib -->
</body>
</html>

<script>

 
 
 
 $('#wait').show();
 $(window).on('load', function () {
	 $('#wizard-pribadi').hide();
	
       setTimeout(function () {
		  $('#wizard-pribadi').show();
		 $('#wait').hide();
     }, 100);

 });
  
 
</script>

<script>
 
 $(document).ready(function() {
	
	$('#kode_pos').keyup(function () {
           
       $.ajax({
            url: '<?php echo site_url('signup/kodepos');?>',
            type : 'POST',
            data : {kodepos : this.value},
            success: function(response)
            {	
					 var json = $.parseJSON(response);
					 
					
					 
					    if (response == false) {
						
						
						} else { 
							
						  $('#kelurahan').val(json.kelurahan);
						  $('#kecamatan').val(json.kecamatan);
						  $('#kabupaten').val(json.kabupaten);
						
							
						} 
					  
                  if (!response) {
                    $('#signInModal').modal('show');
                }else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    }else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                }  
            }
        }); 
 
       
     });
	 
	
  $("select#type_pendaftaran").change(function () {
	  
	       // alert(this.value);
       $.ajax({
            url: '<?php echo site_url('signup/perusahaan');?>',
            type : 'POST',
            data : {perusahaan : this.value},
            success: function(response)
            {	
					 var json = $.parseJSON(response);
					    // alert(response);
					 // alert(response);
					 
					    if (response == false) {
						
						
						} else { 
							
						  $('#nm_gedung').val(json.nm_gedung);
						  $('#lantai').val(json.lantai);
						  $('#kd_pos').val(json.kd_pos);
						  $('#alamat').val(json.alamat);
						  $('#kabupaten_prsh').val(json.kabupaten);
						
							
						} 
					  
                    
            }
        }); 
	  
	  
	  
	  
	});  
	  
  $( "a:contains('Submit')" ).click(function () {
	  
	  if($('#tipe_daftar').val()==0){
	  form = $("#wizard-pribadi").serialize();
	  }else{
		   form = $("#wizard-prsh ").serialize();
		  
	  }
		
		
	 
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password"
        }
    }
});
		
     $.ajax({
       type: "POST",
       url: "<?php  echo site_url('Login/register'); ?>",
       data: form,

       success: function(response){
           alert(response); //Unterminated String literal fixed
       }

     });
     event.preventDefault();
     return false; 
	  
	});  
	  
	  

  $("input#tipe_daftar").change(function () {
     if ($(this).is(':checked'))
    {
      if($(this).val()==1){
		  // $('#section_personal').hide();
		   
			 $('#wizard-pribadi').hide();
			 $('#wizard-perusahaan').show();
			 
		  
	  }else{
			$('#wizard-pribadi').show();
			$('#wizard-perusahaan').hide();
			 
		  
	  }
    }
  });
});
 

 
 
</script>
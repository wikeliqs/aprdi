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
            <form style="display:none" action="<?php echo site_url('login/register'); ?>" id="wizard-pribadi" enctype="multipart/form-data" method="post">
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
	                    		<input type="text" class="form-control step1"  required id="nm_ktp"  name="data[nm_ktp]" placeholder="">
								<span class="checkmark_ktp"></span>
	                    	</div>
	                    </div>	
						<div class="form-row">
	                    	<label for="">
	                    		Nama Panggilan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step1" id="first_name" required  name="data[first_name]" placeholder="">
								<span class="checkmark_nik"></span>
	                    	</div>
	                    </div>
	                    <div class="form-row">
	                    	<label for="">
	                    		Jenis Kelamin
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle" required>
									<label class="male">
										<input type="radio" name="data[kelamin]" id="kelamin"  required   class="step1" value="male"  > Laki-Laki<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="data[kelamin]" id="kelamin"  required class="step1" value="female"> Perempuan<br>
										<span class="checkmark"></span>
									</label>
								
								</div>	<span class="err-radio"></span> 
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Status Pernikahan:
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male" >
										<input type="radio" name="data[marital]" id="marital" required  class="step1" value="male"  > Kawin<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="data[marital]" id="marital"  required  class="step1" value="female"> Belum Kawin<br>
										<span class="checkmark"></span>
									</label>
									 
								</div> <span class="err-radio"></span> 
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Tgl. Lahir
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[tgl_lahir]"   required readonly data-view="years" class="form-control datepicker-here step1" data-date-format="dd-mm-yyyy" data-language='en'  id="dp1">
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
	                    		<select name="data[pendidikan]" id="" required class="form-control step2">
									<option value="canvas" class="option" value="SMA">SMA</option>
									<option value="svg" class="option" value="D3">D3</option>
									<option value="svg" class="option" value="S1">S1</option>
									<option value="svg" class="option" value="S2">S2</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
						 <div class="form-row">
	                    	<label for="">
	                    		Jenis ID
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="data[identitas]" id="" required class="form-control step2">
									<option value="canvas" class="option" value="KTP">KTP</option>
									<option value="svg" class="option" value="Passport">Passport</option>
									 
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
						 <!--div class="form-row" style="margin-bottom: 50px;">
	                    	<label for="">
	                    		Pendidikan Reksa Dana
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input type="radio" name="data[rdc]"  value="1" class="" > Ya<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="data[rdc]" class="" value="0"> Tidak<br>
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
	                    		<input type="text" name="data[nm_rdc]"   class="form-control ">
	                    	</div>
	                    </div-->
						
	                    <div class="form-row">
	                    	<label for="">
	                    		No. ID
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[no_ktp]" required  class="form-control step2">
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
	                    		<input onchange="Photo(this);" type="file" required id="photo" name="data[photo]" class="form-control step3" placeholder="">
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
	                    		<input type="file" onchange="Ktp(this);" id="ktp"   name="data[file_ktp]" required class="form-control step4" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="ktp_view" src="http://www.waperd.or.id/FileUpload/no_image.gif"   />
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
	                    		<input type="text" class="form-control step5" required name="data[alamat_rumah]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		RT / RW
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step5" id="rtrw"  required value="000/000" name="data[rtrw]" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Kode Pos
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step5" required id="kode_pos" name="data[kode_pos]" placeholder="">
	                    	</div>
	                    </div>
						<div class="form-row">
	                    	<label for="">
	                    		Kelurahan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step5 " required id="kelurahan" name="data[kelurahan]"  placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kecamatan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step5" required id="kecamatan" name="data[kecamatan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kota / Kabupaten
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step5" required id="kabupaten" name="data[kabupaten]" placeholder="">
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
	                    		<input type="file" onchange="SK(this);" id="sk" name="data[sk_waperd] " required class="form-control step6" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="sk_view" src="http://www.waperd.or.id/FileUpload/no_image.gif"   />
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
	                    		<select name="data[nm_perusahaan]" required id="type_pendaftaran" class="form-control step7 selectpicker" data-live-search="true" >
									<option class='option'> Pilih Data </option>
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
	                    		<input type="text" id="nm_gedung" required class="form-control step7" name="data[alamat_perusahaan]" value="000/000" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Lantai 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="lantai" required class="form-control step7" name="data[nm_perusahaan]" placeholder="">
	                    	</div>
	                    </div>
						<div class="form-row">
	                    	<label for="">
	                    		Jalan 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="alamat" required class="form-control step7" name="data[alamat_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kode Pos 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="kd_pos" required class="form-control step7" name="data[kode_pos_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kota / Kabupaten
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" id="kabupaten_prsh" required class="form-control step7" name="data[kota_perusahaan]" placeholder="">
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
	                    		<input type="text" class="form-control step8" required name="data[tlp_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		 Fax
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step8" required name="data[fax_perusahaan]" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		 Handphone
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step8" required name="data[hp]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		 Telp. Rumah
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control step8" required name="data[tlp_rumah]" placeholder="">
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
	                    		<input type="email" class="form-control step9" required name="data[email]" placeholder="">
	                    	</div>
	                    </div>	
						
					 
						
	                    <div class="form-row">
	                    	<label for="">
	                    		Password
	                    	</label>
	                    	<div class="form-holder">
								<input id="password" name="data[password]" class="form-control step9" type="password"/>
	                    		 
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Konfirmasi Password
	                    	</label>
	                    	<div class="form-holder">
													
								<input type="password" class="left form-control step9" id="password_again" name="password_again" />
	                    	</div>
	                    </div>	
						
	                     <div class="form-row">
	                    	<label for=""> 
	                    		Chapta
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle" style="margin-bottom: 48px;">
									<div class="g-recaptcha" required data-sitekey="6Leq2SYTAAAAAC6UjI2YaXuV2G9haYnBa7bycVNe"></div>
								</div>
	                    	</div>
	                    </div>
						<div class="form-holder">						
	                    <div class="checkbox-circle" style="margin-bottom: 48px;">
							<label>
								<input type="checkbox" required name="faq" class="step9 " >I agree all statement in Terms & Conditions
								<span class="checkmark"></span>
							</label>
						</div> 	
						</div> 	
	                    
							
	                    
						  
	                </section>
            	</div>
            </form>
			
			
			
			
			<form id="wizard-perusahaan" action="<?php echo site_url('login/register_prsh'); ?>" enctype="multipart/form-data" method="post" style="display:none">
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
	                    		<input type="text" class="form-control cek1" required name="data[nm_type]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Gedung
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek1" required name="data[nm_gedung]" value="" placeholder="">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Lantai 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek1" required name="data[lantai]" placeholder="">
	                    	</div>
	                    </div>
						<div class="form-row">
	                    	<label for="">
	                    		Jalan 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek1" required name="data[alamat]" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kode Pos 
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek1" required id="kd_pos" name="data[kd_pos]" value="000/000" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Kota / Kabupaten
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek1" required name="data[kabupaten]" placeholder="">
	                    	</div>
	                    </div>	
	                     
	                </section>
					<!-- SECTION 8 -->
					<h4></h4>
					 <section id="pribadi-3">
					 <div class="form-row">
	                    	<label for="">
	                    		No. SK OJK
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[no_sk_ojk]" name="telepon"   required class="form-control cek2"  >
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Upload SK OJK
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="file" onchange="Photoprsh(this);" class="form-control cek2" required name="sk_ojk" placeholder="">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Preview
	                    	</label>
	                    	<div class="form-holder">
	                    		<img class="col-md-6" id="photo_viewprsh" src="http://www.waperd.or.id/FileUpload/no_image.gif"   />
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
	                    		<input type="text" name="data[pic]" name="telepon"   required class="form-control cek3"  >
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Jabatan
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" name="data[jabatan]" required class="form-control cek3"  >
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		 Telepon
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek3" required name="data[tlp]"  >
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Fax
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek3" required name="data[fax]"  >
	                    	</div>
	                    </div>	
	                   <div class="form-row">
	                    	<label for="">
	                    		No, HP
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control cek3" required name="data[hp]"  >
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
	                    		<input type="email" name="data[email]" required class="form-control cek4" placeholder="Email">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Password
	                    	</label>
	                    	<div class="form-holder">
								<input id="password_prsh" name="data[password]" class="form-control step9" required type="password"/>
	                    		 
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Konfirmasi Password
	                    	</label>
	                    	<div class="form-holder">
													
								<input type="password" class="left form-control step9" id="password_again" required name="password_again_prsh" />
	                    	</div>
	                    </div>	
						
	                     <div class="form-row">
	                    	<label for="">
	                    		Chapta
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle" style="margin-bottom: 48px;">
									<div class="g-recaptcha step9" required data-sitekey="6Leq2SYTAAAAAC6UjI2YaXuV2G9haYnBa7bycVNe"></div>
								</div>
	                    	</div>
	                    </div>	
						<div class="form-holder">			
	                    <div class="checkbox-circle" style="margin-bottom: 48px;">
							<label>
								<input type="checkbox" class="cek4" name="faq_prsh" required >I agree all statement in Terms & Conditions
								<span class="checkmark"></span>
							</label>
						</div> 	
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
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>


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
 
$(document).ready(function(){
	
	$("#rtrw").inputmask({"mask": "999/999"});
	 $('.phone_with_ddd').mask('(00) 0000-0000');
	
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
    
});
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
	  
  
	  
	  

  $("input#tipe_daftar").change(function () {
     if ($(this).is(':checked'))
    {
      if($(this).val()==1){
		  // $('#section_personal').hide();
			$(this).prop('checked', false);
			 $('#wizard-pribadi').hide();
			 $('#wizard-perusahaan').show();
			 
		  
	  }else{ 
			$(this).prop('checked', false);
			$('#wizard-pribadi').show();
			$('#wizard-perusahaan').hide();
			 
		  
	  }
    }
  });
});
 

 
 
</script>
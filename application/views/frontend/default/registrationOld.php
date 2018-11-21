 <style>
 
.card {
    margin-top: 1em;
}

 

/* IMG displaying */
.person-card {
    margin-top: 5em;
    padding-top: 5em;
}
.person-card .card-title{
    text-align: center;
}
.person-card .person-img{
    width: 10em;
    position: absolute;
    top: -5em;
    left: 50%;
    margin-left: -5em;
    border-radius: 100%;
    overflow: hidden;
    background-color: white;
}

html {
  position: relative;
  min-height: 100%;
}
 

footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 10%;
   background-color: red;
   color: white;
   text-align: center;
}


</style>

<div id="content" class="container" style="margin-top: 1em;padding-bottom: 5%;">
    <!-- Sign up form -->
     <form id="form" action="<?php echo site_url('login/register'); ?>" enctype="multipart/form-data" method="post">
        <!-- Sign up card -->
        <div class="card person-card"><img id="img_sex" class="person-img"
                    src="https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg">
		 <div class="card">
            <div class="card-body">
                <!-- Sex image -->
                
					
                <h2 id="who_message" class="card-title">Who are you ?</h2>
                <!-- First row (on medium screen) -->
                <div class="row">
				
                    <div class="form-group col-md-2">
                        <select name="kelamin" id="input_sex" class="form-control">
                            <option value="L">Mr.</option>
                            <option value="P">Ms.</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
						
                        <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First name" >
                        <div id="first_name_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <input id="last_name" type="text" name="last_name" class="form-control" placeholder="Last name" >
                        <div id="last_name_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
				 <div class="row">
                    <div class="form-group col-md-2">
					<label for="basic-url">Marital status</label>
                        <select id="marital" name="marital" class="form-control" >
							<option value="Single">Single</option>
                            <option value="Married">Married</option>
                           
                        </select>
                    </div>
                    <div class="form-group col-md-3">
						<label for="basic-url">Birth Date</label>
                        <input name="tgl_lahir" id="tgl_lahir" type="text" autocomplete=off class="form-control"  placeholder="Birth Date">
                        <div id="tgl_lahir_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
					 <div class="form-group col-md-2">
					<label for="basic-url">Latest Education</label>
                        <select name="pendidikan" id="pendidikan" class="form-control" >
							<option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                           
                        </select>
                    </div>
					<div class="form-group col-md-2">
					<label for="ktp">ID Cards Type</label>
                        <select name="ktp" id="ktp" class="form-control">
							<option value="ktp">KTP</option>
                           
                           
                        </select>
                    </div>
                    <div class="form-group col-md-3">
						<label for="basic-url">ID Cards Number</label>
                        <input name="id_card_number" id="id_card_number" type="text" class="form-control" placeholder="Please input" > 
                        <div id="id_card_number_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
					
                </div>
				<div class="row">
				<div class="form-group col-md-2">
					<label for="basic-url">Citizenship</label>
                        <select name="warga_negara" id="warga_negara" class="form-control" >
							<option value="wni">WNI</option>
                            <option value="wna">WNA</option>
                            
                           
                        </select>
                    </div>
                     <div class="form-group col-md-2">
					<label for="course">Reksa Dana Courses</label>
                        <select name="course" id="course" class="form-control" >
							<option value="1">Yes</option>
                            <option value="0">No</option>
                           
                        </select>
                    </div>
                    <div class="form-group col-md-8">
					<label for="basic-url">Reksa Dana Institution Courses</label>
                        <input name="name_course"  id="name_course" type="text" class="form-control"  placeholder="Please input">
                        <div id="name_course_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
					 
					 
                </div>
				<div class="row">
                   <div class="form-group col-md-6">
					<label for="basic-url">Upload Photo</label>
                        <input name="photo" id="photo" onchange="readURL(this);" type="file"  class="form-control" placeholder="Please input">
                        <div id="photo_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
					 <div class="form-group col-md-6 text-center" >
					 
                        <img class="col-md-6" id="blah" src="http://placehold.it/180" alt="your image" />
                        <div id="name_course_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
				 </div>
				 </div>
        </div>
        
		<div class="row">
            <div class="col-md-12" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
						 
                        <h2 class="card-title text-center">Where do you live ?</h2>
                        <div class="row">
						<div class="form-group col-md-12">
							<label for="basic-url">Address</label>
								<textarea name="alamat_rumah" class="form-control" aria-label="With textarea" ></textarea>
							</div>
						
						</div>
						<div class="row">
							
							<div class="form-group col-md-2">
								<label for="basic-url">RT / RW</label>
								<input name="rtrw" id="rtrw" type="text" class="form-control" placeholder="000/000" >
								<div id="basic_feedback" class="invalid-feedback">
							</div>
							</div> 
							<div class="form-group col-md-2">
								<label for="basic-url">Postal Code</label>
								<input name="kodepos" id="kodepos" type="number" class="form-control" onkeyup="AjaxKodepos(this)" placeholder="Please input" >
								<div id="kodepos_feedback" class="invalid-feedback">
								</div>
							</div>
							<div class="form-group col-md-3">
								<label for="basic-url">Kelurahan</label>
								<input name="kelurahan" id="kelurahan" readonly type="text" class="form-control" placeholder="Please input" >
								<div id="kelurahan_feedback" class="invalid-feedback">
								</div>
							</div>
							
							<div class="form-group col-md-3">
								<label for="basic-url">Kecamatan</label>
								<input name="kecamatan" id="kecamatan" readonly type="text" class="form-control" placeholder="Please input" >
								<div id="kecamatan_feedback" class="invalid-feedback">
								</div>
							</div>
							
							<div class="form-group col-md-2">
								<label for="basic-url">City</label>
								<input name="kabupaten" id="kabupaten" type="text" readonly class="form-control" placeholder="Please input" >
								<div id="kota_feedback" class="invalid-feedback">
								</div>
							</div>
							
							
							
							
						
						 
						</div>
						<div class="row">
						   <div class="form-group col-md-6">
							<label for="basic-url">Upload KTP</label>
								<input name="file_ktp" id="ktp_upload" onchange="readURLKTP(this);" type="file" class="form-control"  placeholder="Please input">
								<div id="ktp_feedback" class="invalid-feedback">
									
								</div>
							</div>
							 <div class="form-group col-md-6 text-center" >
							 
								<img class="col-md-6 view-img" id="view_ktp" src="http://placehold.it/180" alt="your image" />
								<div id="name_course_feedback" class="invalid-feedback">
									
								</div>
							</div>
						</div>
							
						 
						 
						 
						
                    </div>
                </div>
            </div>
                
             
        </div>
		
		<div class="row">
            <div class="col-md-12" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
						 
                        <h2 class="card-title text-center">Where do you work ?</h2>
                          
						
						<div class="row">
							 
							<div class="form-group col-md-12">
								<label for="basic-url">Company Name</label>
								<input name="nm_prsh" id="perusahaan" type="text" class="form-control"  placeholder="Please input">
								<div id="basic_feedback" class="invalid-feedback">
							</div>
							</div> 
							 
						</div>
						 <div class="row">
						<div class="form-group col-md-12">
							<label for="basic-url">Company Address</label>
								<textarea name="alamat_prsh" class="form-control" aria-label="With textarea" ></textarea>
							</div>
						
						</div>
						<div class="row">
							
							<div class="form-group col-md-4">
								<label for="basic-url">Postal Code</label>
								<input name="kdpos_prsh" id="kodepos_company" type="text" onkeyup="AjaxKodeposKantor(this)"  class="form-control" placeholder="Please input" >
								<div id="kodepos_company_feedback" class="invalid-feedback">
							</div>
							</div> 
							
							<div class="form-group col-md-4">
								<label for="course">City</label>
								<input name="kabupaten_prsh" id="kabupaten_kantor" type="text" class="form-control"   placeholder="Please input" >
								<div id="kabupaten_kantor_feedback" class="invalid-feedback">
							</div>
							</div>
							 <div class="form-group col-md-4">
								<label for="basic-url"> Office Phone No.</label>
								<input name="tlp_prsh" id="tlp_office" type="text" class="form-control" placeholder="Please input" >
								<div id="tlp_office_company_feedback" class="invalid-feedback">
							</div>
							</div> 
							
							
							
							 
							
						
						 
						</div>
						
                    </div>
                </div>
            </div>
                
             
        </div>
		
        <div class="row">
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">How to contact you ?</h2>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com" >
                            <div class="email-feedback">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Phone number</label>
                            <input name="hp" type="text" class="form-control" id="tel" placeholder="+62" >
                            <div class="phone-feedback">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-body">
                        <h2 class="card-title">Securize your account !</h2>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Pasword</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Type your password" >
                            <div class="password-feedback">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_conf" class="col-form-label">Pasword (confirm)</label>
                            <input name="password" type="password" class="form-control" id="password_conf" placeholder="Type your password again" >
                            <div class="password_conf-feedback">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 1em;">
            <button type="submit" id="submit" class="btn btn-danger btn-lg btn-block">Sign up !</button>
        </div>
        </form>
</div>
</div>



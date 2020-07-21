            <div class="block-header p-t-25">
                <div class="row">
                    <div class="col-md-4 ">
                        <p class="fz-18 biru nunito-bold p-t-25"> Course / Project Management</p>
                    </div>
                    <div class="col-md-8"  align="right">
                        <p class="nunito-bold biru fz-18 p-t-25">Server Time : August 6th 2019, 08:20:10 AM</p>
                    </div>
                </div>
            </div>

            

            <div class="row clearfix">
              <div class="col-md-12">
                <div class="card">
                  <div class="body">
                    <div class="row text-center m-t-10">
                      <div class="col-md-6">
                        <img src="<?php echo base_url()?>assets/img/Image7.png" width="100%">
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-12" align="left">
                            <p class="biru font-18 nunito-bold">Project Management</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12" align="left">
                            <p class="biru font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12" align="left">
                            <p class="abu font-14">Tutor: </p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4" align="left">
                            <img src="<?php echo base_url()?>assets/img/ariel.jpg" width="100%">
                          </div>

                          <div class="col-md-8" align="left">
                            <p class="biru font-14 nunito-bold">Mark Hoppus</p>
                          </div>
                        </div>
                        
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <!-- Tab -->
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 view">
                  <div class="card">
                      <div class="body">
                          <ul class="nav nav-tabs-new2">
                              <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" data-toggle="tab" href="#course">Materi</a></li>
                              <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" data-toggle="tab" href="#forum">Forum</a></li>
                              <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" data-toggle="tab" href="#assign">Tugas</a></li>
                          </ul>

                          <div class="tab-content">
                              <div class="tab-pane <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" id="course">
                                  <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="body">
                                        <div id="accordion">
										  <div class="card">
										    <div class="card-header" id="headingOne">
										      <h5 class="mb-0">
										        <button class="btn btn-link col-md-12" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										          <div class="row">
										          	<div class="col-md-2" align="left">
										          		<p class="abu fz-14">Chapter 1 :</p>
										          	</div>
										          	<div class="col-md-6" align="left">
										          		<p class="biru fz-14">Introducing to Project Management</p>
										          	</div>
										          </div>
										          
										        </button>
										      </h5>
										    </div>

										    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
										      <div class="card-body">
										        <div class="row">
										        	<div class="col-md-12">
										        		<b class="biru fz-14">Judul 1</b>
										        	</div>
										        </div>
										        <div class="row">
										        	<div class="col-md-1">
										        		<img src="<?php echo base_url()?>assets/img/file.png">
										        	</div>
										        	<div class="col-md-2">
										        		<p class="abu fz-14">Power Point</p>
										        	</div>
										        	<div class="col-md-1">
										        		<img src="<?php echo base_url()?>assets/img/video.png">
										        	</div>
										        	<div class="col-md-2">
										        		
										        		<p class="abu fz-14">Video</p>
										        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
										  <div class="card">
										    <div class="card-header" id="headingTwo">
										      <h5 class="mb-0">
										        <button class="btn btn-link collapsed col-md-12" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										          <div class="row">
										          	<div class="col-md-2" align="left">
										          		<p class="abu fz-14">Chapter 2 :</p>
										          	</div>
										          	<div class="col-md-6" align="left">
										          		<p class="biru fz-14">Change Management in Project Management</p>
										          	</div>
										          </div>
										        </button>
										      </h5>
										    </div>
										    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
										      <div class="card-body">
										         <div class="row">
										        	<div class="col-md-12">
										        		<b class="biru fz-14">Judul 2</b>
										        	</div>
										        </div>
										        <div class="row">
										        	<div class="col-md-1">
										        		<img src="<?php echo base_url()?>assets/img/file.png">
										        	</div>
										        	<div class="col-md-2">
										        		<p class="abu fz-14">Power Point</p>
										        	</div>
										        	<div class="col-md-1">
										        		<img src="<?php echo base_url()?>assets/img/video.png">
										        	</div>
										        	<div class="col-md-2">
										        		
										        		<p class="abu fz-14">Video</p>
										        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
										  <div class="card">
										    <div class="card-header" id="headingThree">
										      <h5 class="mb-0">
										        <button class="btn btn-link collapsed col-md-12" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										          <div class="row">
										          	<div class="col-md-2" align="left">
										          		<p class="abu fz-14">Chapter 3 :</p>
										          	</div>
										          	<div class="col-md-6" align="left">
										          		<p class="biru fz-14">Stakeholder Management</p>
										          	</div>
										          </div>
										        </button>
										      </h5>
										    </div>
										    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
										      <div class="card-body">
										         <div class="row">
										        	<div class="col-md-12">
										        		<b class="biru fz-14">Judul 3</b>
										        	</div>
										        </div>
										        <div class="row">
										        	<div class="col-md-1">
										        		<img src="<?php echo base_url()?>assets/img/file.png">
										        	</div>
										        	<div class="col-md-2">
										        		<p class="abu fz-14">Power Point</p>
										        	</div>
										        	<div class="col-md-1">
										        		<img src="<?php echo base_url()?>assets/img/video.png">
										        	</div>
										        	<div class="col-md-2">
										        		
										        		<p class="abu fz-14">Video</p>
										        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
										</div>
                                           
                                      </div>
                                          
                                    </div>
                                  </div>
                                  
                              </div>

                              <!-- Forum -->
                              <div class="tab-pane <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" id="forum">
                                  <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="body">
                                        <div class="table-responsive">
                                            <table  class="table table-hover js-basic-example dataTable table-custom  nowrap dataTable dtr-inline" style="width: 100%">

                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th class="abu">Materi </th>
                                                        <th class="abu">Last Post</th>
                                                        <th class="abu">Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Agile Management Approach on Building New Software Development</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">August 6</p>
                                                    </td>
                                                    <td>
                                                    	<!-- <div class="row">
                                                    		<div class="col-md-3">
                                                    			<img src="<?php echo base_url()?>assets/img/mata.png" width="100%">		
                                                    		</div>
                                                    		<div class="col-md-2">
                                                    			<p class="">200</p>
                                                    		</div>
                                                    		<div class="col-md-3">
                                                    			<img src="<?php echo base_url()?>assets/img/reply.png" width="100%">
                                                    		</div>
                                                    		<div class="col-md-2">
                                                    			<p class="">15</p>
                                                    		</div>
                                                    	</div> -->
                                                      
                                                      <i class="fa fa-eye biru" aria-hidden="true"></i>
                                                      200
                                                      <i class="fa fa-share" aria-hidden="true"></i>
                                                      15
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Resource Management on Building New Software Development</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">August 5</p>
                                                    </td>
                                                    <td>
                                                      <i class="fa fa-eye biru" aria-hidden="true"></i>
                                                      200
                                                      <i class="fa fa-share" aria-hidden="true"></i>
                                                      15
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">How to Accelerate Government Projects</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">August 4</p>
                                                    </td>
                                                    <td>
                                                      <i class="fa fa-eye biru" aria-hidden="true"></i>
                                                      200
                                                      <i class="fa fa-share" aria-hidden="true"></i>
                                                      15
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Introduction to Strengths Based Project Management Seeing the Strength of Others</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">August 3</p>
                                                    </td>
                                                    <td>
                                                      <i class="fa fa-eye biru" aria-hidden="true"></i>
                                                      200
                                                      <i class="fa fa-share" aria-hidden="true"></i>
                                                      15
                                                    </td>
                                                  </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <!-- Assignment -->
                              <div class="tab-pane <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" id="assign">
                                  <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="body">
                                        <div class="table-responsive">
                                            <table  class="table table-hover js-basic-example dataTable table-custom  nowrap dataTable dtr-inline" style="width: 100%">

                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th class="abu">Nama Tugas </th>
                                                        <th class="abu text-center">Download</th>
                                                        <th class="abu">Upload</th>
                                                        <th class="abu">Deadline</th>
                                                        <th class="abu">Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Chapter 1-1 : Assignments</p>
                                                    </td>
                                                    <td align="center">
                                                      <img src="<?php echo base_url()?>assets/img/download.png" width="10%">
                                                    </td>
                                                    <td>
                                                      <p class="biru">Tugas1.doc</p>
                                                    </td>
                                                    <td>
                                                      <p class="biru">24 Juli 2019 14:00</p>
                                                    </td>
                                                    <td>
                                                      <p class="biru">Berhasil</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Chapter 1-2 : Assignments</p>
                                                    </td>
                                                    <td align="center">
                                                      <img src="<?php echo base_url()?>assets/img/download.png" width="10%">
                                                    </td>
                                                    <td>
                                                      <p class="biru">Tugas2.doc</p>
                                                    </td>
                                                    <td>
                                                      <p class="biru">24 Juli 2019 14:00</p>
                                                    </td>
                                                    <td>
                                                      <p class="biru">Berhasil</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Chapter 1-3 : Assignments</p>
                                                    </td>
                                                    <td align="center">
                                                      <img src="<?php echo base_url()?>assets/img/download.png" width="10%">
                                                    </td>
                                                    <td>
                                                      <img src="<?php echo base_url()?>assets/img/upload.png" width="10%">
                                                    </td>
                                                    <td>
                                                      <p class="biru">24 Juli 2019 14:00</p>
                                                    </td>
                                                    <td>
                                                      <p class="biru">Berhasil</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="font-14 biru">Chapter 1-4 : Assignments</p>
                                                    </td>
                                                    <td align="center">
                                                      <img src="<?php echo base_url()?>assets/img/download.png" width="10%">
                                                    </td>
                                                    <td>
                                                      <img src="<?php echo base_url()?>assets/img/upload.png" width="10%">
                                                    </td>
                                                    <td>
                                                      <p class="biru">24 Juli 2019 14:00</p>
                                                    </td>
                                                    <td>
                                                      <p class="biru">Berhasil</p>
                                                    </td>
                                                  </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              
                          </div>
                      </div>
                  </div>
              </div>
                       
            </div>
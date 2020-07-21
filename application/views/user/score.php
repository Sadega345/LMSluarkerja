            <div class="block-header p-t-25">
                <div class="row">
                    <div class="col-md-4 ">
                        <p class="fz-18 biru nunito-bold p-t-25">Nilai</p>
                    </div>
                    <div class="col-md-8"  align="right">
                        <p class="nunito-bold biru fz-18 p-t-25">Server Time : August 6th 2019, 08:20:10 AM</p>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-tabs-new2">
                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" data-toggle="tab" href="#period">Current Period</a></li>
                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" data-toggle="tab" href="#cumulative">Cumulative</a></li>
                    </ul>
                  </div>
                </div>

            </div>

            <!-- Tab -->
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 view">
                  <div class="card">
                      <div class="body">
                          <div class="tab-content">
                              <div class="tab-pane <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" id="period">
                                  <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="container">
                                          <div class="table-responsive">
                                            <table  class="table table-hover dataTable table-custom " style="width: 100%">
                                                <thead class="thead-dark">
                                                  <tr>
                                                      <th class="abu">Kode</th>
                                                      <th class="abu">Mata Kuliah</th>
                                                      <th class="abu">SKS</th>
                                                      <th class="abu">Score</th>
                                                      <th class="abu">Final Grade</th>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM001</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Project Management</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM002</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Business Intelligence</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM003</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Corporate Information Technology Strategy</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM004</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Information System Leadership</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                           
                                      </div>
                                          
                                    </div>
                                  </div>
                                  
                              </div>

                              <!-- Forum -->
                              <div class="tab-pane <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" id="cumulative">
                                  <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="container">
                                        <div class="table-responsive">
                                            <table  class="table table-hover dataTable table-custom" style="width: 100%">

                                                <thead class="thead-dark">
                                                  <tr>
                                                      <th class="abu">Kode</th>
                                                      <th class="abu">Mata Kuliah</th>
                                                      <th class="abu">SKS</th>
                                                      <th class="abu">Score</th>
                                                      <th class="abu">Final Grade</th>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM001</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Project Management</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM002</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Business Intelligence</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM003</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Corporate Information Technology Strategy</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM004</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Information System Leadership</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <td>
                                                      <p class="biru font-14">PM005</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">Information System Risk Management</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">2</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">91</p>
                                                    </td>
                                                    <td>
                                                      <p class="font-14 biru">A+</p>
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
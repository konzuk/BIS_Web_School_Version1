

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Manage User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Sean Vit</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">Manage User</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Manage Users</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>UserName</th>
                                                            <th>Password</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
															<th>Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                            if(isset($users)){
                                                                foreach($users as $row){
                                                         ?>

                                                        <tr>
                                                            <td><?php echo $row->FirstName;?></td>
                                                            <td><?php echo $row->LastName;?></td>
                                                            <td><?php echo $row->AccountNumber;?></td>
                                                            <td><?php echo $row->Password;?></td>
                                                            <td>Phone</td>
                                                            <td><?php echo $row->Email;?></td>
															<td>
																<a href="#" class="btn btn-warning btn-xs">Edit</a> 
																<a href="#" onclick="return confirm('Are you sure you want to perform this action?')" class="btn btn-danger btn-xs">Delete</a>
															</td>
                                                        </tr>


                                                        <?php

                                                                }
                                                            }

                                                        ?>

<!--                                                       -->
<!--                                                        <tr>-->
<!--                                                            <td>Tiger Nixon</td>-->
<!--                                                            <td>System Architect</td>-->
<!--                                                            <td>Edinburgh</td>-->
<!--                                                            <td>61fdae</td>-->
<!--                                                            <td>093425343</td>-->
<!--                                                            <td>gryp1@gmail.com</td>-->
<!--															<td>-->
<!--																<a href="#" class="btn btn-warning btn-xs">Edit</a> -->
<!--																<a href="#" onclick="return confirm('Are you sure you want to perform this action?')" class="btn btn-danger btn-xs">Delete</a>-->
<!--															</td>-->
<!--                                                        </tr>-->

                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


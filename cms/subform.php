<!DOCTYPE html>
<html lang="en">
<head>
    <title>crm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
<div id="content">
<a href="index.html"  type="submit" class="btn btn-outline-light"><input type="image" style="height: 15px;" src="./img/return.png"></a><!--BACK BUTTON-->
<button href=""  type="submit" id="plus" data-toggle="modal" data-target="#loginModal" class="btn btn-outline-success">+</button> <!--ADD FORM MODAL BUTTON-->
  
<nav id="sidebar">
    <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
    </div>
    <div class="sidebar-header">
        <h3>Option Bar</h3>
    </div>
    <ul class="list-unstyled components">
        <p>Choose Option :</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home asd1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="table.php">View table</a>
                <a href="#">action</a>
            </li>
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a href="" class="download">Download source</a>
        </li>
        <li>
            <a href="" class="article">Back to article</a>
        </li>
    </ul>
</nav>
<!--END SIDE BAR-->
<!-- TABLE-->
    <div id=table>
        <?php require_once 'process.php'; ?>
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);?>
    </div>
<?php endif ?>
<?php $mysqli = new mysqli('localhost','root','','crm') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error); ?>

<div class="row justify-content-center">
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>Date</th><!--name-->
                <th>Company</th><!--location-->
                <th>Phone</th>
                <th>City</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Call attempt</th>
                <th>ActionItems</th>
                <th>CB date</th>
                <th>CB time</th>
                <th>view</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
<?php while ($row=$result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['attempt'];?></td>
                <td><?php echo $row['aitems'];?></td>
                <td><?php echo $row['cbdate'];?></td>
                <td><?php echo $row['cbtime'];?></td> 
                <td><input type="image" data-toggle="modal" data-target="#viewModal" src="./img/view.png"></td>  
             
                <td>
                    <a href="table.php?edit=<?php echo $row['id']; ?>"
                        type="image" scr="./img/edit.png"  id="action-button" class="btn btn-info"><input type="image" style="height: 13px;" src="./img/edit.png"></a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                        id="action-button" class="btn btn-danger"><input type="image" style="height: 13px;" src="./img/garbage.png"></a>
                </td>
            </tr>
<?php endwhile; ?>
    </table>
</div>

<?php
    function pre_r($array) {
                    echo '<pre>';

    print_r($array);
                    echo '</pre>';
     }
?>
            <!--END TABLE-->
    
<!--VIEW END-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">add info</h3>
                    <button type="button" class="close" data-dismiss="modal"&times;></button>
                    <button type="button" class="btn btn-outline-success"  data-toggle="modal" data-target="#3rdModal">sub-form</button>
                </div>
                <div class="modal-body">
                    <form class="form-row" action="process.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group col-md-5">
                                <label>Date</label><!--name-->
                                <input type="date" name="name" class="form-control form-control-sm"  value="<?php echo $name; ?>" placeholder="Enter Date">
                            </div>
                            <div class="form-group col-md-7">        
                                <label>Company</label><!--location-->
                                <input type="text" name="location"class="form-control form-control-sm" value="<?php echo $location; ?>" placeholder="Enter Company">
                            </div>
                            <div class="form-group col-md-4">        
                                <label>Phone</label><!--phone number-->
                                <input type="text" name="phone"class="form-control form-control-sm" value="<?php echo $phone; ?>" placeholder="Enter Phone">
                            </div>
                            <div class="form-group col-md-8">        
                                <label>City</label><!--city number-->
                                <input type="text" name="city"class="form-control form-control-sm" value="<?php echo $city; ?>" placeholder="City">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>Email</label><!--email number-->
                                <input type="text" name="email"class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>Contact</label><!--contact number-->
                                <input type="text" name="contact"class="form-control form-control-sm" value="<?php echo $contact; ?>" placeholder="Contact">
                            </div>
                            <div class="form-group col-md-3">        
                                <label>Call attempt</label><!--call attempt-->
                                <input type="text" name="attempt"class="form-control form-control-sm" value="<?php echo $attempt; ?>" placeholder="calls">
                            </div>
                            <div class="form-group col-md-9">        
                                <label>Action items</label><!--action items-->
                                <input type="text" name="aitems"class="form-control form-control-sm" value="<?php echo $aitems; ?>" placeholder="Act items">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>CB date</label><!--cb date-->
                                <input type="date" name="cbdate"class="form-control form-control-sm" value="<?php echo $cbdate; ?>" placeholder="CB date">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>CB time</label><!--cb time-->
                                <input type="time" name="cbtime"class="form-control form-control-sm" value="<?php echo $cbtime; ?>" placeholder="CB time">
                            </div> 
                            <div class="form-group col-md-6">        
                                <label>other</label><!--cb time-->
                                <input type="text" name="other" class="form-control form-control-sm" value="<?php echo $other; ?>" placeholder="other">
                            </div> 
                     </div>
            <div class="modal-footer">
<?php if ($update == true): ?>
                <button type="submit" id="action" class="btn btn-primary" name="update"> Update </button>
            <?php else: ?>
                <button type="submit" id="action" class="btn btn-primary" name="save"> Save </button>
            <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="viewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">sub-form</h3>
                <button type="button" class="close" ></button>
            </div>
                <div class="modal-body">
                <?php require_once 'process.php'; ?>
                <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?>">
               
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <?php
                $mysqli = new mysqli('localhost','root','','crm') or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        ?>
        <!--SUB-FORM TABLE-->
        
                <form>
                    <?php
                    while ($row=$result->fetch_assoc()):
                    ?>
                    
                    <div class="col-md-5 "> 
                                <label for="">Other</label>
                                <input type="text" name="1" class="form-control form-control-sm"  value="<?php echo $row['other'];?>">
                                </div>
             
                <?php endwhile; ?>
                </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<!--END OF SUB-FORM TABLE-->
 <!--SUB-FORM-->
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="3rdModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">sub-form</h3>
                <button type="button" class="close" data-dismiss="modal"&times;></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                          
                    <div id="all">  <!--all-->
                        <div class="form-col" id="first"><!--1st-->
                            <div class="form-row">
                                <div class="col-md-2">
                                <label class="my-1 mr-2" for="">Subscription :</label>
                                    <select  class="form-control form-control-sm" id="">
                                        <option selected>choose</option>
                                        <option value="1">Sole</option>
                                        <option value="2">Bonus</option>
                                        <option value="3">Expert</option>
                                    </select>
                                </div>
                                <div class="col-md-5 ">
                                <label for="">Contact Person</label>
                                    <input type="text" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                                <div class="col-md-5 ">
                                <label for="">Contact email</label>
                                    <input type="email" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                <label for="">Business Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control form-control-sm" id="" placeholder="" aria-describedby="" required>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <label for="">Contact #</label>
                                        <input type="text" class="form-control form-control-sm" id="" placeholder="" aria-describedby="" required>
                                    </div>
                                    <div class="col-md-3">
                                    <label for="">Business #</label>
                                        <input type="text" class="form-control form-control-sm" id="" placeholder="" aria-describedby="" required>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="">City</label>
                                        <input type="text"class="form-control form-control-sm" id="" placeholder="City" required>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="">State</label>
                                        <input type="text" class="form-control form-control-sm" id="" placeholder="State" required>
                                   </div>
                                    <div class="col-md-2">
                                    <label for="">Zip</label>
                                        <input type="text" class="form-control form-control-sm" id="" placeholder="Zip" required>
                                   </div>
                            </div>
                        </div>
                        <div class="form-col" id="first-half"><!--1st half-->
                            <div class="form-row">
                                <div class="col-md-6 ">
                                <label for="">Agent</label>
                                    <input type="text" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                                <div class="col-md-3 ">
                                <label for="">Subscription date</label>
                                    <input type="date" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                                <div class="col-md-3 ">
                                <label for="">Payment due</label>
                                    <input type="date" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 ">
                                <label for="">Facebook</label>
                                    <input type="text" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                                <div class="col-md-6 ">
                                <label for="">Twitter</label>
                                    <input type="text" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                            </div>
                                          
                            <div class="form-row">
                                <div class="col-md-6 ">
                                <label for="">Google</label>
                                    <input type="text" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                                <div class="col-md-6 ">
                                <label for="">Instagram</label>
                                    <input type="text" class="form-control  form-control-sm " id="" placeholder=""  required>
                                </div>
                            </div>
                                         
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                <label for="">Other</label>
                                    <input type="text"class="form-control form-control-sm" id="" placeholder="" required>
                                </div>
                             </div>
                        </div>
                        
                        <div class="form-row" id="second"><!--2nd-->
                            <div class="col-8 md-3 mb-1">
                            <label for="">Offers :</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder=""  required>
                                <input type="text" class="form-control form-control-sm" id="" placeholder=""  required>
                                <input type="text" class="form-control form-control-sm" id="" placeholder=""  required>
                                <input type="text" class="form-control form-control-sm" id="" placeholder=""  required>
                                <input type="text" class="form-control form-control-sm" id="" placeholder=""  required>
                            </div>
                            <div class="col-md-4 ">
                            <label for="">Expiration Date</label>
                                <input type="date" class="form-control form-control-sm" id="" placeholder=""  required>
                                <label for="">About Us</label>
                                     <textarea  rows="4" cols="25" class="form-control form-control-sm" id="message" required></textarea>
                            </div>
                                
                            <div class="form-row">
                                <div class="col-md">
                                <label for="">Notes</label>
                                    <textarea  rows="4" cols="80" class="form-control form-control-sm" id="message" required></textarea>
                                </div>
                                <div class="col-md-4 ">
                                <label for="">Date</label>
                                    <input type="date" class="form-control form-control-sm" id="" placeholder=""  required>
                                <label for="">Next call</label>
                                    <input type="date" class="form-control form-control-sm" id="" placeholder=""  required>
                                 </div>
                            </div>
                        </div>
                        
                    <table class="table table-sm "><!--3RD/table-->
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">type</th>
                                <th scope="col">due date</th>
                                <th scope="col">assign to</th>
                                 <th scope="col">cap date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                    <td> 
                                        <select  class="form-control form-control-sm" id="">
                                            <option selected>choose</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                    <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                    <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                    <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                    <td> 
                                        <select  class="form-control form-control-sm" id="">
                                            <option selected>choose</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                    <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                    <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                    <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                    <td> 
                                        <select  class="form-control form-control-sm" id="">
                                            <option selected>choose</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                    <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                    <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                    <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                            </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td> 
                                                <select  class="form-control form-control-sm" id="">
                                                    <option selected>choose</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </td>
                                            <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                            <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                            <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  required></td>
                                        </tr>
                        </tbody>
                    </table>
       
                        <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="submit">Submit form</button>
               
                </form>
            </div>
        </div>
    </div>
  
<!--END SUB-FORM-->
 </div>

  <div class="overlay"></div>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
  </script>
</body>
</html>
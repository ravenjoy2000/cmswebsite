
            <!-- Blog Sidebar Widgets Column -->
             
            <div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search2.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                        </form><!-- serach form--->
                    <!-- /.input-group -->
                </div>

                     <!-- LOGIN -->
                     <div class="well">
                    <h4>Login</h4>
                <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit</button>
                        </span>
                    </div>
                </form>
                        <!-- serach form--->
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <?php 
                $query = "SELECT * FROM categories LIMIT 4";
                $select_categories_query_sidebar = mysqli_query($connection,$query);
               ?>

                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                  while($row = mysqli_fetch_assoc($select_categories_query_sidebar )){
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];

                                    echo"<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                               }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>





                <!-- Side Widget Well -->
             <?php
                    include "widget.php";
             ?>

            </div>
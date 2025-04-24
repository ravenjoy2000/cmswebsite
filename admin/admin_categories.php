
    <!-- header -->
    <?php include "includes/admin_header.php" ?>

    <div id="wrapper">

<!-- Navagator -->
<?php include "includes/admin_navgation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small>AUTHOR</small>
                        </h1>

                            <div class="col-xs-6">
                         
                                <!---- This Form is for input categories -->
                                <form action="" method="post">
                                    <div class="form-group">
                                            <label for="cat-title">Add Category</label>
                                            <input class="form-control" type="text" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                                </form>

                                        <?php insert_categories(); ?>

                                        <?php // Edit Categories Queri
                                                if(isset($_GET['edit'])){
                                                       $cat_id = $_GET['edit'];
                                                       include "includes/update_categories.php";
                                                }
                                        ?>

                            </div>

                            <div class="col-xs-6">
                                <table class="table table-bordered table-hover">
                                    <tread>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Title</th>
                                        </tr>
                                    </tread>
                                    <tbody class="">
                                            <tr>
                                            <?php // categories and id print or something like navagtion
                                              findAllCategotries();
                                                ?> 
                                                      <?php // Delete Categories Querys
                                                        deleteCategories();
                                                     ?>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer -->
        <?php include "includes/admin_footer.php" ?>

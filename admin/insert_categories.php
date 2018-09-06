<ul class="list-group"><div class="row">
        <div class="offset-md-2 col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <h2 class="offset-lg-3 offset-md-2 offset-1 "> Insert New Categories </h2>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cat_title">Categories </label>
                    <div class="col-12 col-sm-8 col-lg-9">
                        <input class="form-control" type="text" id="cat_title" name="cat_title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-3 col-12 col-sm-6">
                        <input class="btn btn-block btn-primary btn-lg" type="submit" id="insert_cat" name="insert_cat"
                               value="Insert new categories">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['insert_cat'])){
        //getting text data from the fields

        $cat_title = $_POST['cat_title'];

        $insert_cat = "insert into categories (cat_title) 
                  VALUES ('$cat_title');";
        $insert_c = mysqli_query($con, $insert_cat);
        if($insert_c){
            header("location: ".$_SERVER['PHP_SELF']);
        }

    }

    ?>
</ul>

<?php require APPROOT . '/views/inc/header.php';?>

        <a href="<?php echo URLROOT;?>/posts" class="btn btn-light">
            <i class="fa fa-backward"></i>
        </a>

        <div class="card card-body bg-light mt-5">
  
       

         
            <h2 class="text-center">Add Post</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT;?>/posts/add" method="post">
               
                <div class="form-group">
                    <label for="title">Title <sup>*</sup></label>
                    <input type="text" name="title" id="title" 
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['title_error'])) ? 'is-invalid': '' ;?>"
                    value="<?php echo $data['title'];?>" >
                    <span class="invalid-feedback">
                    <?php echo $data['title_error'];?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="body">Body <sup>*</sup></label>
                   <textarea name="body" id="body" cols="30" rows="10"
                       class="form-control form-control-lg 
                    <?php echo (!empty($data['body_error'])) ? 'is-invalid': '' ;?>"
         
                   >
                   <?php echo $data['body'];?>
                   </textarea> 
                
                    <span class="invalid-feedback">
                    <?php echo $data['body_error'];?>
                    </span>
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">



            </form>
        </div>
   








<?php require APPROOT . '/views/inc/footer.php'; ?>
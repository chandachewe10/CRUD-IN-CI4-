


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><?=esc($title);?></p>

                <form class="mx-1 mx-md-4" action="store" method="post">
<?= csrf_field();?>

<!--Show Errors For Fake csrf-->
<?= session()->getFlashdata('error') ?>
<!--Show Errors validation-->
<?= service('validation')->listErrors() ?> 

<!--success Message-->  
<?php if (session()->getFlashdata('user_stored') !== null) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('user_stored'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>


                  <div class="d-flex flex-row align-items-center mb-4">
                    
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="Name">Name</label>
                      <input type="text" id="Name" name="name" class="form-control" />
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="Email">Email</label>
                      <input type="email" name="email" id="Email" class="form-control" />
                      
                    </div>
                  </div>


                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Add user</button>
                  </div>

                </form>

              </div>







              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>              
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</section>



<center>
<div class="shadow-sm p-3 mb-5 bg-white rounded w-75">

<!--Datatable here -->  

<table class="table table-bordered" id="users_table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                
               
            </tr>
        </thead>
        <tbody>
<tr>
        <?php if (! empty($data_users) && is_array($data_users)): ?>

<?php foreach ($data_users as $data): ?>

    <td><?= esc($data['id']) ?></td>
    <td><?= esc($data['name']) ?></td>
    <td><?= esc($data['email']) ?></td>
    <td>
      <span><a href="/edit/<?= esc($data['id']); ?>"><i class="fa fa-edit"></i></a></span>
      <span><a href="/edit/<?= esc($data['id']); ?>"><i class="fa fa-trash-o"></i></a></span>
  </td>

</tr>

<?php endforeach ?>

<?php else: ?>

<h3>No User Created</h3>

<p>Please Create A User</p>

<?php endif ?>


        </tbody>
    </table>

<!--End DataTable here -->

</div>

    <!-- Js DataTable Script-->
</center>





    <script>  
    $(document).ready( function () {
    $('#users_table').DataTable();
} );


</script>

<!--End Js DataTable Script-->





<!--End Getting dataTables-->




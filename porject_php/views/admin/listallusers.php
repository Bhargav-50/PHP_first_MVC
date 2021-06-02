<!-- modals -->
<section class="template-cards">
    <div class="card card_border">
      <div class="cards__heading">
        <h3>Users</h3>
      </div>
      <div class="card-body pb-0">
        <div class="row">
          <div class="col-lg-12 pr-lg-2 ">
          <table class="table table_bordered">
              <thead class="bg-dark text-white">
                  <tr>
                      <td>Sr No</td>
                      <td>User Name</td>
                      <td>Email</td>
                      <td>Mobile</td>
                      <td width=8%>Image</td>
                      <td>Action</td>
                  </tr>
              </thead>
              <tbody>
                  <?php $i=1;  foreach ($AllUsers['Data'] as $key => $value) { ?>
                    <tr>
                      <td><?php echo $i; $i++; ?></td>
                      <td><?php echo $value->user_name; ?></td>
                      <td><?php echo $value->email; ?></td>
                      <td><?php echo $value->mobile; ?></td>
                      <td><img src="image/<?php echo $value->pro_pic; ?>" alt=""  width= 100%></td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="edit?id=<?php echo $value->user_id; ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="delete?id=<?php echo $value->user_id; ?>">Delete</a>
                      </td>
                    </tr>
                    <?php  } ?>
                 
              </tbody>
          </table>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //modals -->

</div>
<!-- //content -->
</div>
<!-- main content end-->
</section>
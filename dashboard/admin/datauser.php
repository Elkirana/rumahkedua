<?php include 'include/header.php'; ?>
<div id="scrollHeight">
</div>
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-12">
               <div class="breadcrumb-holder">
                  <h1 class="main-title float-left">Data User</h1>
                  <ol class="breadcrumb float-right">
                     <li class="breadcrumb-item">Home</li>
                     <li class="breadcrumb-item active">User</li>
                  </ol>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
         <!-- end row -->
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               <div class="card mb-3">
                  <div class="card-header">
                     <table width="100%">
                        <tr>
                           <td>
                              <h3><i class="fas fa-table"></i> List User</h3>
                              Anda dapat membuat dan mengedit artikel yang ada di list artikel.
                           </td>
                           <td>
                              <div class="text-right">
                                 <a role="button" href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahuser">
                                 Tambah User
                                 </a>
                              </div>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="tambahuserLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="tambahuserLabel">Tambah User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form id="formuser" role="form" class="" action="#">
                              <div class="modal-body">
                                 <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <div>
                                       <input data-parsley-type="alphanum" name="nama_lengkap" type="text-align"
                                          class="form-control" required
                                          placeholder="Nama Lengkap"/>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Username</label>
                                    <div>
                                       <input data-parsley-type="alphanum" name="username" type="text-align"
                                          class="form-control" required
                                          placeholder="username"/>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <div>
                                       <input type="email" name="email" type="text-align"
                                          class="form-control" required
                                          placeholder="Email"/>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Password</label>
                                    <div>
                                       <input type="password" name="password" type="text-align"
                                          class="form-control" required
                                          placeholder="Password"/>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div>
                                       <select name="jenis_kelamin" class="form-control" required>
                                        <option selected disabled value>-- Harap Pilih Jenis Kelamin --</option>
                                         <option value="<?php echo enurl('L'); ?>">Pria</option>
                                         <option value="<?php echo enurl('P'); ?>">Wanita</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Status User</label>
                                    <div>
                                       <select name="status_user" class="form-control" required>
                                        <option selected disabled value>-- Harap Pilih Status User --</option>
                                         <option value="admin">Admin</option>
                                         <option value="psikolog">Psikolog</option>
                                         <option value="user">User</option>
                                       </select>
                                    </div>
                                 </div>
                                 
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                 Submit
                                 </button>
                                 <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="table12" class="table table-bordered table-hover display" style="width:100%">
                           
                              <?php
                                 if (isset($_GET['status'])) {
                                  $get = preg_replace('/[^a-z-A-Z]/', '', $_GET['status']);
                                  if (strtolower($get)=='admin') {
                                    $where = "where status_user='admin'";
                                  }elseif (strtolower($get)=='psikolog') {
                                    $where = "where status_user='psikolog'";
                                  }elseif (strtolower($get)=='user') {
                                    $where = "where status_user='user'";
                                  }else{
                                    $where = "";
                                  }
                                 }else{
                                  $where = "";
                                 }
                                 if ($where=="") {
                                    $sdata = '<th style="text-align: center;">Status User</th>';
                                  }else{
                                    $sdata = '';
                                  }
                                echo '<thead>
                              <tr>
                                 <th style="text-align: center;">No</th>
                                 <th style="text-align: center;">Nama Lengkap</th>
                                 <th style="text-align: center;">Username</th>
                                 <th style="text-align: center;">Email</th>
                                 '.$sdata.'
                                 <th style="text-align: center;"></th>
                              </tr>
                           </thead>
                           <tbody>';
                                 $no = 0;
                                 $sql_data = "SELECT * FROM tbl_user ".$where." order by nama_lengkap asc";
                                 $query_data = $db->query($sql_data);
                                 while ($result_data = mysqli_fetch_assoc($query_data)) {
                                  if ($where=="") {
                                    $status_user = '<td style="text-align: center;">'.$result_data['status_user'].'</td>';
                                  }else{
                                    $status_user = '';
                                  }
                                  if ($id_user==$result_data['id']) {
                                    $apus = '';
                                  }else{
                                    $apus = '|| <a href="#" data-id="'.enurl($result_data['id']).'" id="delete">Hapus</a>';
                                  }
                                  $no++;
                                   echo '<tr>
                                 <td style="text-align: center;">'.$no.'</td>
                                 <td style="text-align: center;">'.$result_data['nama_lengkap'].'</td>
                                 <td style="text-align: center;">'.$result_data['username'].'</td>
                                 <td style="text-align: center;">'.$result_data['email'].'</td>
                                 '.$status_user.'
                                 <td style="text-align: center;"><a href="#" id="edit" data-id="'.enurl($result_data['id']).'">Edit</a> '.$apus.'</td>
                              </tr>';
                                 }
                                 ?>
                           </tbody>
                        </table>
                     </div>
                     <!-- end table-responsive-->
                  </div>
                  <!-- end card-body-->
               </div>
               <!-- end card-->
            </div>
            <div id="modal-edit" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <form role="form" id="xeform" method="post">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div id="data-edit">
                           </div>
                        </div>
                        <div style="text-align: center; padding: 1rem; border-top: 1px solid #e9ecef;">
                           <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row-->
   </div>
   <!-- END container-fluid -->
</div>
<!-- END content -->
</div>
<!-- END content-page -->
<script type="text/javascript">
   $(document).ready(function(){
           $('#formuser').on('submit',function(e) {  //Don't foget to change the id form
             $.ajax({
               url:'ajax/datauser.php?submit',
               type: "POST",
               data:  new FormData(this),
               contentType: false,
               cache: false,
               processData:false,
               success:function(response){
                 obj = JSON.parse(response);
                           //Success Message == 'Title', 'Message body', Last one leave as it is
                           if (obj['status']!=1) {
                             // swal(obj['title'], obj['detail'], "error");
                             swal({title: 'Oops...', text: obj['detail'], icon: "error"});
                           }else{
                             swal({title: "Good job!", text: "Sukses Menambah data user", icon: "success"}).then((value) => {
                               location.reload();
                             });
                           }
                         },
                         error:function(data){
                           //Error Message == 'Title', 'Message body', Last one leave as it is
                           //"Oops...", "Something went wrong :(", "error"
                           swal({title: "Oops...", text: "Something went wrong :(", type: "error"},);
                         }
                       });
               e.preventDefault();
               return false;
               
           });
       });
   $(document).on('click','#delete',function(e){
           var idd= $(this).attr('data-id');
           swal({
               title: "Apa anda yakin untuk menghapusnya?",
               text: "Jika anda menghapus data tidak akan dapat dikembalikan / akan dihapus secara permanent.",
               icon: "warning",
               buttons: true,
               dangerMode: true,
           })
           .then((willDelete) => {
               if (willDelete) {
                   $.ajax({
                       url: 'ajax/datauser.php?delete',
                       type: 'POST',
                       data: {id : idd},
   
                       success: function(response) {
                           obj = JSON.parse(response);
                           //Success Message == 'Title', 'Message body', Last one leave as it is
                           if (obj['status']!=1) {
                               swal({title: 'Oops..', text: obj['detail'], icon: "error"});
                           }else{
                               swal({title:'Good job!', text: 'Data User berhasil dihapus', icon: "success"}).then((value) => {
                                   location.reload();
                               });
                           }
                       }
                   });
                   e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
                   return false;
                   
               } else {
                   // swal("Your imaginary file is safe!");
               }
           });
       });
     $(document).on('click','#edit',function(e){
       e.preventDefault();
       $("#modal-edit").modal('show');
       $.post('ajax/datauser.php?get',
         {id:$(this).attr('data-id')},
         function(html){
           $("#data-edit").html(html);
         }   
       );
     });
     $(document).ready(function(){
           $('#xeform').on('submit',function(e) {  //Don't foget to change the id form
               $.ajax({
                   url:'ajax/datauser.php?edit',
                   data:$(this).serialize(),
                   type:'POST',
                   success:function(response){
                       obj = JSON.parse(response);
                       //Success Message == 'Title', 'Message body', Last one leave as it is
                       if (obj['status']!=1) {
                           swal({title: 'Oops..', text: obj['detail'], icon: "error"});
                       }else{
                           swal({title:'Good job!', text: 'Data User berhasil Diperbaharui', icon: "success"}).then((value) => {
                              location.reload();
                          });
                       }
                   },
                   error:function(data){
                       //Error Message == 'Title', 'Message body', Last one leave as it is
                       //"Oops...", "Something went wrong :(", "error"
                       swal({title: "Oops...", text: "Something went wrong :(", type: "error"},);
                   }
               });
               e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
               return false;
           });
       });
</script>
<?php include 'include/footer.php'; ?>
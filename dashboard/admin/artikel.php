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
                  <h1 class="main-title float-left">Artikel Manager</h1>
                  <ol class="breadcrumb float-right">
                     <li class="breadcrumb-item">Home</li>
                     <li class="breadcrumb-item active">Artikel</li>
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
                              <h3><i class="fas fa-table"></i> List Artikel</h3>
                              Anda dapat membuat dan mengedit artikel yang ada di list artikel.
                           </td>
                           <td>
                              <div class="text-right">
                                 <a role="button" href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahartikel">
                                 Buat Artikel
                                 </a>
                              </div>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal fade" id="tambahartikel" tabindex="-1" role="dialog" aria-labelledby="tambahartikelLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="tambahartikelLabel">Buat Artikel</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form id="formartikel" role="form" class="" action="#" autocomplete="off">
                              <div class="modal-body">
                                 <div class="form-group">
                                    <label>Judul Artikel</label>
                                    <div>
                                       <input data-parsley-type="alphanum" name="judul_post" type="text-align"
                                          class="form-control" required
                                          placeholder="Judul Artikel"/>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Kategori Artikel</label>
                                    <div>
                                       <select data-parsley-required="true" class="form-control" name="id_kategori" >
                                          <option disabled selected value> -- Harap Pilih Kategori -- </option>
                                          <?php
                                             $sql = "SELECT * FROM tbl_kategori order by nama_kategori asc";
                                             $query = $db->query($sql);
                                             while ($result=mysqli_fetch_assoc($query)) {
                                                 echo '<option value="'.enurl($result['id']).'">'.$result['nama_kategori'].'</option>';
                                             }
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Isi Artikel</label>
                                    <div>
                                       <textarea rows="3" name="isi_post" class="form-control" required></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Image Artikel</label>
                                    <div>
                                       <input class="form-control" name="foto_artikel" id="ImageBrowse"  type="file" required>
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
                           <thead>
                              <tr>
                                 <th style="text-align: center;">No</th>
                                 <th style="text-align: center;">oleh</th>
                                 <th style="text-align: center;">Judul</th>
                                 <th style="text-align: center;">Kategori</th>
                                 <th style="text-align: center;">Image</th>
                                 <th style="text-align: center;">Isi</th>
                                 <th style="text-align: center;"></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $no = 0;
                                     $sql = "SELECT * FROM tbl_post ";
                                     $query = $db->query($sql);
                                     while ($result=mysqli_fetch_assoc($query)) {
                                         if (strlen($result['judul_post'])>=20) {
                                             $judul_post = substr($result['judul_post'], 0, 16).' ...';
                                         }else{
                                             $judul_post = $result['judul_post'];
                                         }
                                         if (strlen($result['isi_post'])>=100) {
                                             $isi_post = substr($result['isi_post'], 0, 100).' ...';
                                             $isi_post = str_replace('<br />', ' ', $isi_post);
                                         }else{
                                             $isi_post = $result['isi_post'];
                                             $isi_post = str_replace('<br />', ' ', $isi_post);
                                         }
                                         $id_kategori = $result['id_kategori'];
                                         $a_id = $result['id_user'];
                                         $sql_k = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
                                         $query_k = $db->query($sql_k);
                                         $row_k = mysqli_num_rows($query_k);
                                         if ($row_k==0) {
                                             $kategori = 'Unknown';
                                         }else{
                                             $result_k = mysqli_fetch_assoc($query_k);
                                             $kategori = $result_k['nama_kategori'];
                                         }
                                         $sql_u_a = "SELECT * FROM tbl_user where id = '$a_id' ";
                                         $query_u_a = $db->query($sql_u_a);
                                         $row_u_a = mysqli_num_rows($query_u_a);
                                         if ($row_u_a==0) {
                                             $oleh = 'Unknown';
                                         }else{
                                             $result_u_a = mysqli_fetch_assoc($query_u_a);
                                             $oleh = $result_u_a['nama_lengkap'];
                                         }
                                         $no++;
                                         echo '<tr>
                                 <td align="center" width="1px">'.$no.'</td>
                                 <td align="center">'.ucwords(strtolower($oleh)).'</td>
                                 <td align="center">'.$judul_post.'</td>
                                 <td align="center">'.ucwords(strtolower($kategori)).'</td>
                                 <td align="center"><a data-fancybox="ajax" data-src="image.php?get='.$result['gambar_post'].'" data-type="ajax"  href="javascript:;">View</a></td>
                                 <td style="max-width:330px;">'.$isi_post.'</td>
                                 <td align="center"><a href="#" id="edit" data-id="'.enurl($result['id']).'">Edit</a> || <a href="#" data-id="'.enurl($result['id']).'" id="delete">Hapus</a></td>
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
                           <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
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
           $('#formartikel').on('submit',function(e) {  //Don't foget to change the id form
               var ext = $('[name="foto_artikel"]').val().split('.').pop().toLowerCase();
               if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                   swal('Oops', 'File harus gambar', "error");
               }else{
                   $.ajax({
                       url:'ajax/artikel.php?submit',
                       type: "POST",
                       data:  new FormData(this),
                       contentType: false,
                       cache: false,
                       processData:false,
                       success:function(response){
                           obj = JSON.parse(response);
                           //Success Message == 'Title', 'Message body', Last one leave as it is
                           if (obj['status']!=1) {
                               swal(obj['title'], obj['detail'], "error");
                           }else{
                               swal({title: "Good job!", text: "Sukses menambahkan artikel", icon: "success"}).then((value) => {
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
               }
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
                       url: 'ajax/artikel.php?delete',
                       type: 'POST',
                       data: {id : idd},
   
                       success: function(response) {
                           obj = JSON.parse(response);
                           //Success Message == 'Title', 'Message body', Last one leave as it is
                           if (obj['status']!=1) {
                               swal({title: obj['title'], text: obj['detail'], icon: "error"});
                           }else{
                               swal({title:'Good job!', text: 'Artikel berhasil dihapus', icon: "success"}).then((value) => {
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
       $.post('ajax/artikel.php?get',
         {id:$(this).attr('data-id')},
         function(html){
           $("#data-edit").html(html);
         }   
       );
     });
     $(document).ready(function(){
           $('#xeform').on('submit',function(e) {  //Don't foget to change the id form
               var ext = $('[name="foto_artikel"]').val().split('.').pop().toLowerCase();
               if($.inArray(ext, ['gif','png','jpg','jpeg', '']) == -1) {
                   swal('Oops', 'File harus gambar', "error");
               }else{
                   $.ajax({
                       url:'ajax/artikel.php?edit',
                       type: "POST",
                       data:  new FormData(this),
                       contentType: false,
                       cache: false,
                       processData:false,
                       success:function(response){
                           obj = JSON.parse(response);
                           //Success Message == 'Title', 'Message body', Last one leave as it is
                           if (obj['status']!=1) {
                               swal(obj['title'], obj['detail'], "error");
                           }else{
                               swal({title: "Good job!", text: "Sukses Mengedit artikel", icon: "success"}).then((value) => {
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
               }
               e.preventDefault();
               return false;
               
           });
       });
</script>
<?php include 'include/footer.php'; ?>
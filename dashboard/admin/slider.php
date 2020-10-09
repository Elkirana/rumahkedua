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
                  <h1 class="main-title float-left">Slider Manager</h1>
                  <ol class="breadcrumb float-right">
                     <li class="breadcrumb-item">Home</li>
                     <li class="breadcrumb-item active">Slider</li>
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
                              <h3><i class="fas fa-table"></i> List Slider</h3>
                              Anda dapat membuat dan mengedit artikel yang ada di list artikel.
                           </td>
                        </tr>
                     </table>
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
                                     $sql = "SELECT * FROM tbl_post order by status_slider desc ";
                                     $query = $db->query($sql);
                                     while ($result=mysqli_fetch_assoc($query)) {
                                      if ($result['status_slider']=='0') {
                                        $but = '<a href="#" id="tambah" data-id="'.enurl($result['id']).'">Tambah Slider</a>';
                                      }elseif ($result['status_slider']=='1') {
                                        $but = '<a href="#" id="hapus" data-id="'.enurl($result['id']).'">Hapus Slider</a>';
                                      }else{
                                        $but = ' - ';
                                      }
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
                                 <td align="center"> '.$but.'</td>
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
     $(document).on('click','#tambah',function(e){
      var idd = $(this).attr('data-id');
      $.ajax({
       url: 'ajax/artikel.php?addslide',
       type: 'POST',
       data: {id : idd},

       success: function(response) {
         obj = JSON.parse(response);
         if (obj['status']!=1) {
           swal({title: obj['title'], text: obj['detail'], icon: "error"});
         }else{
           swal({title:'Good job!', text: 'Artikel berhasil Ditambahkan Ke Slider', icon: "success"}).then((value) => {
             location.reload();
           });
         }
       }
     });
      e.preventDefault(); 
      return false;
     });
     $(document).on('click','#hapus',function(e){
      var idd = $(this).attr('data-id');
      $.ajax({
       url: 'ajax/artikel.php?removeslide',
       type: 'POST',
       data: {id : idd},

       success: function(response) {
         obj = JSON.parse(response);
         if (obj['status']!=1) {
           swal({title: obj['title'], text: obj['detail'], icon: "error"});
         }else{
           swal({title:'Good job!', text: 'Artikel berhasil Dihapus dari Slider', icon: "success"}).then((value) => {
             location.reload();
           });
         }
       }
     });
      e.preventDefault(); 
      return false;
     });
</script>
<?php include 'include/footer.php'; ?>
<?php include 'include/header.php'; ?>

        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Dashboard</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <!-- <canvas id="comboBarLineChart"></canvas> -->
                                    <div class="text-center">
                                        <h3>Hi, <?php echo $data_user['nama_lengkap']; ?></h3>
                                        <h6>Status kamu adalah Psikolog/psikiater, anda dapat melakukan update post artikel atau membalas user yang melakukan live chat</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>

                    </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        <?php include 'include/footer.php'; ?>
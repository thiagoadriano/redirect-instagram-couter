<?php
require('db.php');
?>

<?php include('header.php'); ?>
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Links</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>URLs</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">


                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Links do YouTube</h5>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>URL</th>
                                                    <th>Descrição</th>
                                                    <th>Android (cliques)</th>
                                                    <th>iOS (cliques)</th>
                                                    <th>Outros (cliques)</th>
                                                    <th>Total (cliques)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $data = $pdo->query("SELECT * FROM youtube")->fetchAll();
                                            foreach ($data as $row) : ?>
                                                <tr>
                                                    <td><?php echo $row[0]; ?> <i class="zmdi zmdi-link link-youtube" data-id="<?php echo $row[0]; ?>" data-clipboard-text="<?php echo $row[0]; ?>"></i></td>
                                                    <td><?php echo $row[1]; ?></td>
                                                    <td><?php echo $row[2]; ?></td>
                                                    <td><?php echo $row[3]; ?></td>
                                                    <td><?php echo $row[4]; ?></td>
                                                    <td><?php echo $row[5]; ?></td>
                                                    <td><?php echo $row[3]+$row[4]+$row[5]; ?></td>
                                                </tr>
                                            <?php endforeach; ?>


                                            </tbody>                                                        
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>








                       
                       
                       
                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->
<?php include('footer.php'); ?>

<?php

require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $url = $_POST['url'];
    $descricao = $_POST['descricao'];


    $sql = "INSERT INTO youtube (url, descricao) VALUES (?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$url, $descricao]);

    header("Location: admin.php");
    exit();
}

?>

<?php include('header.php'); ?>
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">YouTube</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Adicionar URL</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Adicionar Link</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">

                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Adicionar Novo Link</h5>
                            <div class="row">
                                <div class="col-sm">
                                    <form class="mb-30" method="POST">
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="text" id="url" name="url" class="form-control" aria-describedby="passwordHelpBlock" required>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                  Insira a URL do YouTube, exemplo: https://www.youtube.com/watch?v=dQw4w9WgXcQ
                                                </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <textarea class="form-control" rows="3" id="descricao" name="descricao" required></textarea>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                  Insira uma descrição sobre o vídeo
                                                </small>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                                    </form>
                                </div>
                            </div>
                        </section>


                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
<?php include('footer.php'); ?>

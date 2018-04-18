<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Codeigniter upload single example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <br>
    <div class="container">
        <div class="card">
            <h5 class="card-header">Codeigniter การอัพโหลดไฟล์แบบไฟล์เดียว</h5>
            <div class="card-body">
                <form action="<?= base_url('upload/upload_file') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="btn btn-warning" style="margin: 0">
                            เลือกรูปภาพอัพโหลด
                            <span id="file_text"></span>
                            <input type="file" onchange="file_text.innerText = this.value" hidden name="file">
                        </label>
                        <input type="submit" value="อัพโหลดภาพ" class="btn btn-primary">
                    </div>
                </form>
                <?php if(isset($data)) : ?>
                    <p><img class="img-thumbnail" style="width: 480px" src="<?= base_url("application/uploads/{$data['file_name']}") ?>"></p>
                    <a target="_blank" href="<?= base_url("application/uploads/{$data['file_name']}") ?>">
                        ดูภาพขนาดเต็ม
                    </a>
                <?php elseif(isset($error)) : ?>
                    <div style="color: #aa0000"><?= $error ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
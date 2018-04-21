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
                <form action="<?= base_url('upload/upload_multiple_file') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div id="file_text" class="alert alert-warning">กรุณาอัพโหลดไฟล์</div>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-warning" style="margin: 0">
                            เลือกรูปภาพอัพโหลด
                            <input multiple type="file" onchange="show_upload_filename(this)" hidden name="file[]">
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
                <?php elseif(isset($uploads)) : ?>
                    <!-- Upload แบบหลายไฟล์ -->
                    <div class="row">
                        <?php foreach($uploads as $data) : ?>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="card">
                                        <!-- ไม่มีข้อผิดพลาด -->
                                        <?php if($data['error'] == false) : ?>
                                            <img src="<?= base_url("application/uploads/{$data['file_name']}") ?>" class="card-img-top">
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <div><?= $data['file_name'] ?></div>
                                                    <a target="_blank" href="<?= base_url("application/uploads/{$data['file_name']}") ?>">
                                                        ดูภาพขนาดเต็ม
                                                    </a>
                                                </div>
                                            </div>
                                        <!-- เกิดข้อผิดพลาด -->
                                        <?php else : ?>
                                            <img src="http://www.pbs.org/black-culture/lunchbox_plugins/s/photogallery/img/no-image-available.jpg" class="card-img-top">
                                            <div class="alert alert-danger" style="border-radius: 0; border: none">
                                                <p><?= $data['file_name'] ?></p>
                                                <strong>Error : </strong>
                                                <span><?= $data['message'] ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- javascript -->
    <script>
        function show_upload_filename(input)
        {
            var files = input.files;
            var filename = [];
            // ตรวจสอบว่ามีการอัพโหลดหรือไม่
            if(files.length > 0)
            {
                // วนลูปเพื่อเก็บชื่อไฟล์
                for(var i = 0; i < files.length; i++)
                    filename.push(files[i].name); 
            }
            // นำชื่อไฟล์ที่เป็น Array มาต่อสตริงคั่นด้วย <br />
            file_text.innerHTML = filename.join('<br />');
        }
    </script>
</body>
</html>
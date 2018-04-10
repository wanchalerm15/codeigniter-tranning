<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Tranning</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
		body {
			background-color: #eee;
		}
		.no-border td {
			border: none;
		}
	</style>
</head>
<body>
	<br>
	<div class="container">
		<div class="card">
			<h4 class="card-header">CRUD เพิ่ม/ลบ/แก้ไข/อ่านข้อมูล จาก Database (MySQL)</h4>
			<form method="post" class="card-body">
				<table class="table">
					<thead>
						<tr class="no-border">
							<td width="150">
								<input type="text" value="<?= isset($item->id) ? $item->id : '' ?>" name="id" readonly class="form-control">
							</td>
							<td>
								<input type="text" value="<?= isset($item->name) ? $item->name : '' ?>" name="name" class="form-control">
							</td>
							<td>
								<div class="row">
									<div class="col">
										<button type="submit" class="btn btn-primary btn-block">
											บันทึก
										</button>
									</div>
									<div class="col">
										<a href="<?= base_url('/') ?>" class="btn btn-secondary btn-block">
											ยกเลิก
										</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>รหัส</th>
							<th>ชื่อ</th>
							<th>จัดการข้อมูล</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($items) <= 0) : ?>
							<tr>
								<td colspan="3" class="text-danger">ไม่มีข้อมูลในระบบ !</td>
							</tr>
						<?php endif; ?>
						<?php foreach($items as $row) : ?>
							<tr>
								<td><?= $row->id ?></td>
								<td><?= $row->name ?></td>
								<td>
									<div class="row">
										<div class="col">
											<a href="<?= base_url("welcome/index/{$row->id}") ?>" class="btn btn-warning btn-block btn-sm">
												แก้ไข
											</a>
										</div>
										<div class="col">
											<a onclick="return confirm('คุณต้องการจะลบข้อมูลนี้จริงหรือ?')" href="<?= base_url("welcome/delete/{$row->id}") ?>" class="btn btn-danger btn-block btn-sm">
												ลบทิ้ง
											</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3" class="text-right">
								รายการข้อมูลทั้งหมดในระบบ <?= count($items) ?> รายการ
							</th>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</body>
</html>
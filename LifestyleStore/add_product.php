<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" type="text/css">
    
</head>
<body>
    <div class="container">
    <h2>Thêm sản phẩm mới</h2>
    <form action="add_product_script.php" method='POST' enctype = "multipart/form-data" >
        <div class="form_group">
            <label for="tên sản phẩn"> Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form_group">
            <label for="giá"> Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form_group">
            <label for="ảnh"> Ảnh</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
    </form>
</div>
</body>
</html>


<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left">
        <h2> Thêm Tour</h2>
    </div>
</div>
<div class="space50">&nbsp;</div>
<div class="container">
    <form action="/formtravel" method="POST">
        @csrf   
        <div class="form-group">
        <label >Name:</label><br>
            <input type="text"  name="name" >
        </div>
        <div class="form-group">
            <label>Nơi khởi hành:</label>
            <select class="form-control" name="start_place">
                <option>--Hồ Chí Minh--</option>
                <option>--Bình Dương--</option>
                <option>--Buồn Ma Thuột--</option>
                <option>--Cà Mau--</option>
                <option>--Cần Thơ--</option>
                <option>--Đà Lạt--</option>
                <option>--Đà Nẵng--</option>
                <option>--Hà Nội--</option>
                <option>--Hải Phong --</option>
                <option>--Huế--</option>
                <option>--Long Xuyên--</option>
                <option>--Nha Trang--</option>
                <option>--Phú Quốc--</option>
                <option>--Quảng Ninh--</option>
                <option>--Quy Nhơn--</option>
            </select>
        </div>
        <div class="form-group">
            <label>Vận chuyển:</label>
            <select class="form-control" name="transport">
                <option>--Tất cả--</option>
                <option>--Máy bay--</option>
                <option>--Ô tô--</option>                
            </select>
        </div>
        <div class="form-group">
            <label>Giá:</label>
            <select class="form-control" name="price">
                <option>5000000</option>
                <option>1000000</option>
                <option>2000000</option>
                <option>3000000</option>
                <option>6000000</option>
                <option>10000000</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tình trạng:</label>
            <select class="form-control" name="status">
                <option>Còn chỗ</option>
                <option>Hết chỗ</option>
            </select>
        </div>
        <div class="form-group">
            <label>Từ ngày:</label>
            <select class="form-control" >
                <option><input type="datetime-local" id="start_date" name="from_date"></option>
            </select>
        </div>
        <div class="form-group">
            <label>Đến ngày:</label>
            <select class="form-control" >
                <option><input type="datetime-local" id="end_date" name="to_date"></option>
            </select>
        </div>

        <div class="form-group">
            <label>Dòng tour:</label>
            <select class="form-control" name="type">
                <option>--Tất cả--</option>
                <option>--Cao cấp--</option>
                <option>--Tiêu chuẩn--</option>
                <option>--Tiết kiệm--</option>
                <option>--Giá tốt--</option>
            </select>
        </div>
        <div class ="form-group">
            <label >Image file:</label><br>
            <input type="file" id="" name="image" >
            </div>
        <input type="submit" class ="btn btn-primary"value="Submit">
    </form>
</div>
<div class="space50">&nbsp;</div>

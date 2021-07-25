
<div class="space50">&nbsp;</div>
<div class="container">
<div> 
<p scope="col"><a href="/formtravel" class="btn btn-primary" style="width:80px;">add</a></p>
</div>
    @foreach($travel as $travels)
    <div class="container-fluid">
         <p>{{$travels->image}}</p>
         <img src="travel/{{$travels->image}}" alt="">
        <p>{{$travels->name}}</p>
        <hr />
        <div class="row">
            <div class="col-sm-4">
                <img src="" alt="">
            </div>
            <div class="col-sm-4">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>        
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>Mã tour: {{$travels->id}}</div>
                <div>Ngày đi: {{$travels->from_date}}</div>
                <div>Ngày về: {{$travels->to_date}}</div>
                <div>Giá: {{$travels->price}}</div>
           
            </div>
            <div class="col-sm-4">
            <div>Nơi khởi hành: {{$travels->start_place}}</div>
                <div>Tình trạng: {{$travels->status}}</div>
                <div>Dòng tour: {{$travels->type}}</div>
                <div>Vận chuyển: {{$travels->transport}}</div>

            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="space50">&nbsp;</div>

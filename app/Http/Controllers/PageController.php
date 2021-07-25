<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\BillDetail;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Cart;
use App\Jobs\SendEmail;
use App\Models\User;
use App\Rules\Captcha;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class PageController extends Controller
{
    //==========================================TẤT CẢ CÁC TRANG=======================================
    // Trang chủ
    public function getIndex(){
        $slide = Slide :: All();
        $new_product = Product:: where('new',1)->paginate(8);
        
        $sanpham_khuyenmai = Product:: where('promotion_price','<>',0)->paginate(8);

        return view('product.trangchu', compact('slide','new_product','sanpham_khuyenmai'));
    }  
// Loại sản phẩm
    public function getLoaisp($type){
        // hiện thị sp  theo loại
        $sp_theoloai = Product:: where ('id_type',$type)->paginate(6);
       //  hiện thị sp khác loại
        $loai_sp = ProductType::where('id',$type)->first();
        $loai = ProductType::all();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(8);
        return view('product.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }  
// Trang chi tieets sanr phaamr
    public function getChitietsp(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sp_banchay = Product::where('promotion_price','=',0)->paginate(3);    
        $sp_new = Product::select('id','name','id_type','description','unit_price','promotion_price','image','unit','new','created_at','updated_at')->where('new','>',0)->orderBy('updated_at','ASC')->paginate( 3);
        return view('product.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }
 // trang about
    public function getAbout(){
        return view('product.about');
    }  
    //Trang liên hệ
    public function getContact(){
        return view('product.contact');
    }  

    //===============================================CHECKOUT================================================
   // Phần xem giỏ hàng
    public function getcheckout(){
        return view('product.checkout');
    }

// Lưu thông tin giỏ hàng
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        // test thử card
        // dd($cart);
        // Tạo đối tượng customer mới
        $customer = new Customer;
        $customer->name = $req->full_name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }

        $message = [
            'type' => 'Email thông báo đặt hàng thành công',
            'thanks' =>'cảm ơn '. $req->full_name . ' Đã đặt hàng',
            
            'cart'=>$cart,
            'content' => 'Đơn hàng của bạn sẽ tới sớm nhất có thể!',
        ];
        SendEmail::dispatch($message, $req->email)->delay(now()->addMinute(1));

        $totalPrice =  $cart->totalPrice;
        $total = $totalPrice/23.01365/1000;
        if($bill->payment==='paypal'){
            return view('product.paywithpaypal', compact('total'));
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }


// thêm vào Giỏ hàng 
    public function getAddToCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }
// Xóa thông tin giỏ hàng 
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
        Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    //================================================== CRUD của admin===============================================
// Trang chủ
    public function getIndexAdmin(){
        $products =Product::all();
        return view('admin.admin',compact('products'));
    }
    // Trang form thêm sản phẩm
    public function getAdminAdd(){
        return view('admin.addform');
    }
    // thêm sản phẩm
    public function postAdminAdd(Request $request){
    $product = new Product();
    if($request->hasFile('image')){
        $file=$request->file('image');
        $fileName=$file->getClientOriginalName('image');
        $file->move('source/image/product', $fileName);
    }
        $file_name=null;
        if($request->file('image')!=null){
            $file_name = $request->file('image')->getClientOriginalName();
        }
        $product->name = $request->name;
        $product->image = $file_name;
        $product->description=$request->description;
        $product->unit_price =$request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->type;
        $product->save();
        //return $this->getIndexAdmin();
        return redirect()->route('admin');
    }
    
//---------------------------------------------------
// public function postAdminAdd(Request $request){
//     $product = new Product();
//     $name='';
//     if($request->hasfile('image')){
//         $this->validate($request,[
//             'image'=>'mimes:jpg,png,gif,jpeg',
//             'description'=>'required',
//             'unit_price'=>'required',
//             'promotion_price'=>'required',
//             'unit'=>'required',
//             'new'=>'required',
//             'id_type'=>'required'
//         ],[
//             'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
//             'description.required'=>'Bạn chưa nhập mô tả',
//             'unit_price.required'=>'Bạn chưa nhập price',
//             'promotion_price.required'=>'Bạn chưa bạn chưa promotion_price',
//             'unit.required'=>'Bạn chưa nhập unit',
//             'new.required'=>'Bạn chưa bạn chưa new',
//             'id_type.required'=>'Bạn chưa nhập id_type'
        
//         ]);
//         $file = $request->file('image');
//         $name=$file->getClientOriginalName();
//         //$destinationPath=public_path('images'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
//         $file->move('source/image/product', $name); //lưu hình ảnh vào thư mục public/car
//     }
//     $product->name = $request->name;
//     // $product->image = $file_name;
//     $product->description=$request->description;
//     $product->unit_price =$request->unit_price;
//     $product->promotion_price = $request->promotion_price;
//     $product->unit = $request->unit;
//     $product->new = $request->new;
//     $product->id_type = $request->type;
//     $product->save();
//     //return $this->getIndexAdmin();
//     return redirect()->route('admin');
// }

//------------------------------------------------
// Sửa sản phẩm
public function getAdminEdit($id){
    $product = Product::find($id);
    return view('admin.editform',compact('product'));
}
// Sửa sản phẩm
    public function postAdminEdit(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName('image');
            $file->move('source/image/product',$fileName);
        }
        if($request->file('image')!=null){
            $product->image = $fileName;
        }
        $product->name = $request->name;
        $product->id_type = $request->type;
       
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;

        $product->unit = $request->unit;
        $product->new = $request->new;
        
        $product->save();
        return redirect()->route('admin');
        //return $this->getIndexAdmin();
      
    }
    // Xóa sản phẩm
    public function postAdminDelete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin');
    }


    //===========================================ĐĂNG KÍ, ĐĂNG NHẬP====================================================
    
    public function getSignUp(){
    return view('product.dangki');
    }

    public function getSignIn(){
        return view('product.dangnhap');
        }
        // Đăng kí 

    public function postSignUp(Request $req){
        $this->validate($req,[
                        'email'=>'required|email|unique:users,email',
                        // 'password'=>'required|min:6|max:20',
                        'full_name'=>'required',
                        // 're_password'=>'required|same:password',
                        'g-recaptcha-response' => new Captcha(),
                    ],[
                      
                        'email.required'=>'Bạn chưa nhập email',
                        'email.email'=>'Không đúng định dạng email',
                        'email.unique'=>'Email có người sử dụng',
                        // 'password.required'=>'Bạn chưa bạn chưa password',
                        // 're_password.same'=>'Mật khau không giống nhau',
                        // 'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                        // 'password.max'=>'Mật khẩu lớn nhất 20 kí tự'
                    
                    ]);
        $user = new User();
       //dd($req);
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = FacadesHash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
       return redirect()->back()->with('thanhcong','đăng kí thanh cong');
    }

    //Đăng nhập
    public function postSignIn(Request $req){
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'

        ],[
          
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email có người sử dụng',
            'password.required'=>'Bạn chưa bạn chưa password',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu khoong qua 20 kí tự'
        
        ]);
        $credentials =array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
          
        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập khong thành công']);
         
        }
    }

    // Đăng xuất
    public function postlogout(){
        Auth::logout();
        return redirect()->route('home');

    }
    public function getsearch(Request $request){
        // Tìm kiếm sản phẩm theo tên gần giống nhau
        $product =Product::where('name','like','%'.$request->key.'%')
        // Hoặc tìm kiếm sp  theo giá
        ->orwhere('unit_price',$request->key)
        ->get();
        return view('product.search',compact('product'));
    }
}



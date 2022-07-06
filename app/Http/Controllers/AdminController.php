<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Catagory;

use App\Models\Product;

use App\Models\Order;

use PDF;

use Notification;

use App\Notifications\MyNotification;

class AdminController extends Controller
{
   public function view_catagory()
   {

    if(Auth::id())
    {
        $data=catagory::all();

        return view('admin.catagory',compact('data'));
    }

    else
    {
        return redirect('login');
    }

   }

   public function add_catagory(Request $request)
   {

    if(Auth::id())
    {

    $data=new catagory;

    $data->catagory_name=$request->catagory;

    $data->save();

    return redirect()->back()->with('message','Catagory Added Succesfully✔');
    }

    else
    {
        return redirect ('login');
    }

   }

public function delete_catagory($id)
{
    if(Auth::id())
    {
     $data=catagory::find($id);

     $data->delete();

     return redirect()->back()->with('message','Catagory Deleted Succesfully✔');
    }

    else
    {
       return redirect('login');
    }
    }

public function view_product()
{
    if(Auth::id())
    {
    $catagory= catagory::all();

     return view('admin.product', compact('catagory'));
    }

    else
    {
        return redirect('login');
    }
}

public function add_product(Request $request)
{
    if(Auth::id())
    {
     $product=new product;

     $product->title=$request->title;
     $product->description=$request->description;
     $product->price=$request->price;
     $product->quantity=$request->quantity;
     $product->discount_price=$request->discount_price;
     $product->catagory=$request->catagory;

     $image=$request->image;
     $imagename=time().'.'.$image->getClientOriginalExtension();
     $request->image->move('product',$imagename);

     $product->image=$imagename;

     $product->save();

     return redirect()->back()->with('message','Product Added Succesfully✔');
    }

    else
    {
        return redirect('login');
    }
}

public function show_product()
{

    if(Auth::id())
    {
    $product=product::all();

    return view('admin.show_product',compact('product'));
    }

    else
    {
        return redirect('login');
    }
}

public function delete_product($id)
{
    if(Auth::id())
    {
       $product=product::find($id);
       $product->delete();
       return redirect()->back()->with('message','Product Deleted Succesfully✔');;
    }

    else
    {
        return redirect('login');
    }
}

public function update_product($id)
{
    if(Auth::id())
    {
    $product=product::find($id);

    $catagory=catagory::all();

    return view('admin.update_product',compact('product','catagory'));
    }

    else
    {
        return redirect('login');
    }
}

public function confirmupdate_product(Request $request,$id)
{
    if(Auth::id())
    {
     $product=product::find($id);

     $product->title=$request->title;

     $product->description=$request->description;

     $product->price=$request->price;

     $product->quantity=$request->quantity;

     $product->discount_price=$request->discount_price;

     $image=$request->image;

     if($image)
     {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;

     }

     $product->save();

     return redirect()->back()->with('message','Product Info. Updated Succesfully✔');
    }

    else
    {
        return redirect('login');
    }

}

public function order()
{
    if(Auth::id())
    {
    $order=order::all();

   return view('admin.order',compact('order'));
    }

    else
    {
        return redirect('login');
    }
}

public function print_pdf($id)
{
    if(Auth::id())
    {
    $order=order::find($id);

    $pdf=PDF::loadView('admin.pdf',compact('order'));

    return $pdf->download('order_details.pdf');
    }

    else
    {
        return redirect('login');
    }
}

public function send_email($id)
{
    if(Auth::id())
    {
    $order=order::find($id);

    return view('admin.email_info',compact('order'));
    }

    else
    {
        return redirect('login');
    }
}

public function send_user_email(Request $request,$id)
{
    if(Auth::id())
    {
    $order=order::find($id);

    $details = [
        'greeting' =>$request->greeting,

        'firstline' =>$request->firstline,

        'body'=>$request->body,

        'button'=>$request->button,

        'url'=>$request->url,

        'lastline'=>$request->lastline,
    ];

    Notification::send($order,new MyNotification($details));

    return redirect()->back()->with('message','Email Delivered Succesfully✔');
   }

   else
   {
    return redirect('login');
   }

}

 public function searchdata(Request $request)
{
    if(Auth::id())
    {
    $searchText=$request->search;

    $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();

     return view('admin.order',compact('order'));
    }

    else
    {
        return redirect('login');
    }
}

}

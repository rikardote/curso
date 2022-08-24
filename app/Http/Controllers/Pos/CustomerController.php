<?php

namespace App\Http\Controllers\Pos;


use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function CustomerAll()
    {
            $customers = Customer::latest()->get();
            return view('backend.customer.customer_all', compact('customers'));
    }

    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }
    public function CustomerStore(Request $request)
    {
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(200,200)->save('upload/customer_images/'.$name_gen);

        $save_url = 'upload/customer_images/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'customer_image' => $save_url,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::Now(),
        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }
     public function CustomerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }
    public function CustomerUpdate(Request $request)
    {
        $customer_id = $request->id;
        if($request->file('customer_image')){
            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,200)->save('upload/customer_images/'.$name_gen);

            $save_url = 'upload/customer_images/'.$name_gen;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'customer_image' => $save_url,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::Now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated Successfuly',
                'alert-type' => 'success'
             );

            return redirect()->route('customer.all')->with($notification);

        } else{
            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::Now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated Successfuly',
                'alert-type' => 'success'
             );

            return redirect()->route('customer.all')->with($notification);
        }


    }
}

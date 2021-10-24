<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * listing function.
     * Showing listing latest first. 
     */

    public function listing(Request $request)
    {
        $data['result'] = DB::table('items')->latest()->get();
        return view('/post/list', $data);
    }

    /**
     * submit function 
     * validate the input field
     * image uploading and renaming.
     * calculating tax information
     * check if tax include or exclude.
     * get input data and save into db table.
     * redirect to listing page with any error message. 
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'product_type' => 'required',
            'tax_type' => 'required',
            'tax_percent' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);


        $image = $request->file('image');
        $filename = time() . '.' . $image->extension();

        $image->storeAs('/public/post/', $filename);   /* make public link by php artisan storage:link */

        /* Calculating the tax amount */
        $tax_amnt = ($request->price * $request->tax_percent) / 100;
        $net_price = ($request->price + $tax_amnt);
        $value = ($request->tax_type == 'include') ? $net_price : $request->price;

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $value,
            'product_type' => $request->input('product_type'),
            'tax_type' => $request->input('tax_type'),
            'tax_percent' => $request->input('tax_percent'),
            'image' => $filename,
            'net_price' => $request->input('price'),
            'tax_amount' => $tax_amnt,
        ];

        DB::table('items')->insert($data);
        $request->Session()->flash('msg', 'Product Added');
        return redirect('/post/list');
    }

    /**
     * Delete function
     * Request ID parameter
     * Delete record of ID from DB
     * redirect to list page with message.
     */

    public function delete(Request $request,  $id)
    {

        $data['result'] = DB::table('items')->where('id', $id)
            ->delete();

        $request->session()->flash('msg', 'Item Deleted');
        return redirect('/post/list');
    }


    /**
     * Edit function
     * with ID parameter 
     * show the details of ID from db
     *  
     */
    public function edit(Request $request, $id)
    {
        $data = DB::table('items')->where('id', $id)->get();
        return view('/post/edit', ['result' => $data]);
    }


    /**
     * Update fuunction 
     * With ID parameter.
     * validate the input field. 
     * Tax Calculating and get all request data
     * check if image is uploading or not
     * Update  the data to db with ID parameter
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'product_type' => 'required',
            'tax_type' => 'required',
            'tax_percent' => 'required',
            // 'image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $tax_amnt = ($request->price * $request->tax_percent) / 100;
        $net_price = ($request->price + $tax_amnt);
        $value = ($request->tax_type == 'include') ? $net_price : $request->price;

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $value,
            'product_type' => $request->input('product_type'),
            'tax_type' => $request->input('tax_type'),
            'tax_percent' => $request->input('tax_percent'),
            // 'image'=>$filename,
            'net_price' => $request->input('price'),
            'tax_amount' => $tax_amnt,
            'updated_at' => now()
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->extension();
            $image->storeAs('/public/post/', $filename);   /* make public link by php artisan storage:link */

            $data['image'] = $filename;
        }

        DB::table('items')->where('id', $id)->update($data);

        $request->Session()->flash('msg', 'Product Updated');

        return redirect('/post/list');
    }
}

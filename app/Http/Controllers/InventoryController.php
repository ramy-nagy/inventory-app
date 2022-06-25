<?php

namespace App\Http\Controllers;

use App\Imports\InventoryImport;
use App\Jobs\UploadFiles;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $store = '';
        if ($request->has('store_name')) {
            $store =  Store::where('name', $request->store_name)->firstOrFail('id');
        }else {
            return redirect()->back()->withErrors("Please select store");
        }
        if ($request->has('excel_file')) {

            $excel_file = $request->file('excel_file');

            $validator = Validator::make($request->all(), [
                'excel_file' => 'required|max:5000|mimes:xlsx,csv'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->with(['type' => 'error', 'message' => 'File type is invalid - only xlsx is allowed']);
            }
            $fileName = time().'.'.$excel_file->extension();  
            $excel_file->move(public_path('uploads'), $fileName);
            $path = public_path()."/uploads/".$fileName;
            //Excel::import(new InventoryImport(), $path);

            $batch = Bus::batch([
                new UploadFiles($path),
            ])->dispatch();

            return redirect()->back()->with(['batchId' => $batch->id]);
        }
    }
}

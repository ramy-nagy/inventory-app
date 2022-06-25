<?php

namespace App\Http\Controllers;

use App\Jobs\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
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
            //UploadFiles::dispatch($excel_file);
            $batch = Bus::batch([
                new UploadFiles($path),
            ])->dispatch();
            Artisan::call('queue:work');
             return redirect()->back();
        }
    }
}

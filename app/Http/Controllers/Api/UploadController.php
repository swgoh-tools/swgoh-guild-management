<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $guilds = Guild::all();
        // $pages = Page::all();

        return view('admin.files.upload');
    }

    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // https://scotch.io/tutorials/understanding-and-working-with-files-in-laravel
        // https://laravel.com/docs/master/validation#rule-mimetypes
        // https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types

        $validation = request()->validate([
            'file' => 'required|file|mimes:jpeg,png,gif,webp,tif,bmp,svg,json,doc,docx,docm,pdf,odt,odc,ods,odp,odi,odg,odb,ppt,pptx,xls,xlsx,xlsm,txt,csv|max:20480'
            // for multiple file uploads
            // 'file.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        try {
            $path = Storage::disk('pages')->putFile('', request()->file('file'));
            // $path = request()->file('file')->store('', 'pages');
            $url = Storage::disk('pages')->url($path);
            return response()->json(array(
                'success' => true,
                'data' => ['url' => $url],
                'errors' => []
            ), 201);
        } catch (\Exception $e) {
            return response()->json(array(
                'success' => false,
                'data' => [],
                'errors' => $e
            ), 500);
        }

        // if (request()->wantsJson()) {
        //     return response(['url' => $url], 204);
        // }

        return response([], 501);
    }

    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCkeditor(Request $request)
    {
        // https://scotch.io/tutorials/understanding-and-working-with-files-in-laravel
        // https://laravel.com/docs/master/validation#rule-mimetypes
        // https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types

        $validation = $request->validate([
            'upload' => 'required|file|mimes:jpeg,png,gif,webp,tif,bmp,svg,json,doc,docx,docm,pdf,odt,odc,ods,odp,odi,odg,odb,ppt,pptx,xls,xlsx,xlsm,txt,csv|max:20480'
            // for multiple file uploads
            // 'file.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        try {
            $file = $request->file('upload');
            $path = Storage::disk('pages')->putFile('', $file);
            // $path = $request->file('file')->store('', 'pages');
            $url = Storage::disk('pages')->url($path);
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $file->getClientOriginalExtension();
            return response()->json(array(
                'uploaded' => 1,
                'filename' => $filenameWithExt, // $path,
                'url' => $url,
                'error' => []
            ), 201);
        } catch (\Exception $e) {
            return response()->json(array(
                'uploaded' => 0,
                'error' => $e
            ), 500);
        }

        // if (request()->wantsJson()) {
        //     return response(['url' => $url], 204);
        // }

        return response([], 501);
    }

    /**
     * Persist a new memo.
     *
     * @param  integer           $guildId
     * @param  Page            $page
     * @param  CreateMemoRequest $form
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeAdmin() //CreateMemoRequest $form)
    {
        // validate the uploaded file
        $validation = request()->validate([
            'file' => 'required|file|image|mimes:jpeg,png,gif,webp|max:20480'
            // for multiple file uploads
            // 'file.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $path = request()->file('file')->store('media', 'public');

        // dd($path);
        return response($path, 204);
    }
}

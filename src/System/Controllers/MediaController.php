<?php

namespace AvoRed\Framework\System\Controllers;

use AvoRed\Framework\System\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaController extends  BaseController
{
    /**
     * Uplaod a file to a media.
     * @params Request $request
     * @return \Illuminate\View\View
     */
    public function upload(Request $request)
    {       
        $files = $request->allFiles();
        $path = $request->get('path');
        $data = collect();
        
        foreach ($files as $file) {
            $dbPath = $file->store($path, ['disk' => 'public']);
            $media = Media::create([
                'path' => $dbPath
            ]);
            $data->push($media);
        }
        
        if ($data->count() <= 1) {
            $data = $data->first();
        }

        return new JsonResponse([
            'files' => $data
        ]);
    }

     /**
     * Uplaod a file to a media.
     * @params Media $media
     * @return \Illuminate\View\View
     */
    public function destroy(Media $media)
    {
        File::delete($media->path->absolutePath);
        $media->delete();

        return new JsonResponse([
            'success' => true
        ]);
    }
}

<?php
namespace AvoRed\Framework\Support\Traits\Controller;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\System\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\File;

trait MediaTrait
{
    public function mediaSync($model, $existingModelFiles, $requestMediaIds)
    {
        $existingFiles = collect();
        if ($existingModelFiles instanceof Collection || $existingModelFiles instanceof SupportCollection) {
            $existingFiles = $existingModelFiles;
        }
        if ($existingModelFiles instanceof BaseModel) {
            $existingFiles = collect()->push($existingModelFiles);
        }

        if (!($requestMediaIds instanceof Collection || $requestMediaIds instanceof SupportCollection)) {
            $requestMediaCollection = collect($requestMediaIds);
        }


        // dd($requestMediaCollection, $existingFiles);
        foreach ($requestMediaCollection as $mediaId) {
            
            $mediaModel = Media::find($mediaId);
            $mediaModel->owner()->associate($model)->save();

           
            $existingFiles = $existingFiles->reject(function($item) use ($mediaId) {
                return $item->id == $mediaId;
            });
        }

        foreach ($existingFiles as $deletedExisting) {
            File::delete($deletedExisting->path->absolutePath);
            $deletedExisting->delete();
        }

    }
}

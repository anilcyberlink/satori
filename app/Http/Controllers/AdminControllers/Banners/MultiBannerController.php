<?php

namespace App\Http\Controllers\AdminControllers\Banners;

use App\Http\Controllers\Controller;
use App\Models\Banners\MultiBannerModel;
use App\Services\ModelImageService;

class MultiBannerController extends Controller
{
    protected $modelImageService;

    public function __construct(ModelImageService $modelImageService)
    {
        $this->modelImageService = $modelImageService;
    }

    public function destroy($id)
    {
        $banner = MultiBannerModel::findOrFail($id);

        $this->modelImageService->delete($banner);

        return response()->json([
            'success' => true,
            'message' => 'Banner deleted successfully.'
        ]);
    }
}

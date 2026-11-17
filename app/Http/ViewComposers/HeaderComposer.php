<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostTypeModel;
use App\Models\Travels\ActivityModel;
use App\Models\Destinations\DestinationModel;

class HeaderComposer
{

	public function __construct()
	{
		// Dependencies automatically resolved by service container...
	}

	public function compose(View $view)
	{
        $view->with('destinations', DestinationModel::with('trips')->get());
        $view->with('trekking',ActivityModel::where('activity_parent','trekking')->with('trips')->orderBy('ordering','asc')->get());

		$view->with('navigations', PostTypeModel::where(['is_menu' => '1'])
			->orderBy('ordering', 'asc')
			->get());
		$view->with('expedition', ActivityModel::where('activity_parent','expedition')->orderBy('ordering','asc')->get());
		$view->with('tours', ActivityModel::where('activity_parent','activity')->orderBy('ordering','asc')->get());
        $view->with('contact_us', PostTypeModel::where(['id' => '26'])->first());

		$view->with('training', PostTypeModel::where(['is_menu' => '1','id'=>'32'])->first());
	}
}

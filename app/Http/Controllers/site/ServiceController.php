<?php

namespace App\Http\Controllers\site;

use App\Service;
use App\ServiceDetail;
use App\ServiceFeature;
use App\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function getIndex() {
        $services = Service::all();
        $static   = StaticPage::all();
        $features = ServiceFeature::all();
        return view('site.pages.services.index', compact('services', 'static', 'features'));
    }

    public function getSingleService(Request $request) {
        $service = Service::where('slug', $request->slug)->first();
        $features = ServiceDetail::where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->features;
        $all_features = explode("\n", $features);
        $all_related = Service::all()->where('slug', $service->slug);
        return view('site.pages.services.single_service', compact('service', 'all_features', 'all_related'));
    }
}

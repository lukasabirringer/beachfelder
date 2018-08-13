<?php 

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Analytics;
use Spatie\Analytics\Period;
use App\Libraries\GoogleAnalytics;

class AnalyticsController extends Controller
{
  public function index()
  {
    $analyticsData_one = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
    $this->data['dates'] = $analyticsData_one->pluck('date');
    $this->data['visitors'] = $analyticsData_one->pluck('visitors');
    $this->data['pageViews'] = $analyticsData_one->pluck('pageViews');

    $this->data['browserjson'] = collect(GoogleAnalytics::topbrowsers());

    return view('backend.analytics.index', $this->data);
  }
  
}
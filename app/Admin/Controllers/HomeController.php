<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content->title('Dashboard')->view('admin.dashboard')->breadcrumb(
            ['text' => 'Dashboard'],
        );

        // ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))

        // ->description('Description...')
        // ->row(Dashboard::title())
        // ->row(function (Row $row) {

        //     $row->column(4, function (Column $column) {
        //         $column->append(Dashboard::environment());
        //     });

        //     $row->column(4, function (Column $column) {
        //         $column->append(Dashboard::extensions());
        //     });

        //     $row->column(4, function (Column $column) {
        //         $column->append(Dashboard::dependencies());
        //     });
        // });
    }
}

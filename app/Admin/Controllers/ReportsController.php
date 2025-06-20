<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Widgets\Tab;

class ReportsController extends Controller
{
    public function index(Content $content)
    {
        $tab = new Tab();
        $tab->add('Sales', view('admin.reports.sales')->render());
        $tab->add('Expenses', view('admin.reports.expenses')->render());
        $tab->add('Inventory', view('admin.reports.inventory')->render());
        return $content
            ->title('Reports')
            ->body($tab)
            ->breadcrumb(['text' => 'Reports']);
    }
}

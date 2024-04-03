<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use App\Models\XtremeToolUserModel;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class XtremeToolUserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
             ->rawColumns(['user', 'slug'])
            ->editColumn('user', function (XtremeToolUserModel $user) {
                return view('pages.xtreme-tools-users.columns._blog', compact('user'));
            })
            ->editColumn('name', function (XtremeToolUserModel $user) {
                return $user->first_name.' '.$user->last_name;
            })
            ->addColumn('action', function (XtremeToolUserModel $user) {
                return view('pages.xtreme-tools-users.columns._actions', compact('user'));
            })
            ->setRowId('uid');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(XtremeToolUserModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//xtreme-tools-users/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('uid')->title('ID'),
            Column::make('name')->title('Name'),
            Column::make('email')->title('Email'),
            Column::make('user_plan')->title('Plan'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Models\Slideshow;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SlideshowDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($item) {
                $actions = editBtn($item, 'slideshow');
                $actions .= moveBtn($item, 'slideshow');
                $actions .= deleteBtn($item, 'slideshow');

                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slideshow $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slideshow $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('slideshow-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->autoWidth(false)
                    ->languageUrl(asset('vendor/datatables/Persian.json'));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('position')->title('جایگاه'),
            Column::make('title')->title('عنوان'),
            Column::make('subtitle')->title('زیرعنوان'),
            Column::make('link')->title('لینک'),
            Column::computed('action')->title('عملیات')
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Slideshow_' . date('YmdHis');
    }
}

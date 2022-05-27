<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Attribute;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AttributeDataTable extends DataTable
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
            ->editColumn('use_as_filter', function ($item){
                return $item->use_as_filter ? 'بله': 'خیر';
            })
            ->addColumn('action', function ($item){
                $action = editBtn($item, 'attribute');
                $action .= moveBtn($item, 'attribute', 'shop');
                $action .= deleteBtn($item, 'attribute');
                return $action;
            });
    }


    /**
     * @param Attribute $model
     * @return Builder
     */
    public function query(Attribute $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->autoWidth(false)
//            ->responsive(false)
            ->languageUrl(asset('vendor/datatables/Persian.json'))
//                    ->dom('Bfrtip')
            ->orderBy(3,'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id')->title('شناسه'),
            Column::make('title')->title('عنوان'),
            Column::make('use_as_filter')->title('استفاده به عنوان فیلتر'),
            Column::make('position')->title('جایگاه'),
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
        return 'Blog_' . date('YmdHis');
    }
}

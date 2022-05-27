<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->editColumn('type', function ($item){
                return [
                    'normal' => 'ساده',
                    'variable' => 'متغییر',
                ][$item->type];
            })->addColumn('category', function ($item){
                return $item->categories->implode('title', ', ');
            })
            ->addColumn('action', function ($item){
                $action = editBtn($item, 'product');
                $action .= seoBtn($item, 'product', 'shop');
                $action .= deleteBtn($item, 'product');
                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Product $model
     * @return Builder
     */
    public function query(Product $model)
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
//                    ->setTableId('blog-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->autoWidth(false)
//            ->responsive(false)
            ->languageUrl(asset('vendor/datatables/Persian.json'))
//                    ->dom('Bfrtip')
            ->orderBy(0);
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
            Column::computed('category')->title('گروه'),
            Column::make('type')->title('نوع'),
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
        return 'Product_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
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
            ->addColumn('parent', function ($item) {
                return $item->parent->title ?? '';
            })
            ->addColumn('action', function ($item){
                $action = editBtn($item, 'category');
                $action .= seoBtn($item, 'category', 'blog');
                $action .= moveBtn($item, 'category', 'blog');
                $action .= deleteBtn($item, 'category');
                return $action;
            });
    }


    /**
     * @param Category $model
     * @return Builder
     */
    public function query(Category $model)
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
            Column::computed('parent')->title('نام والد'),
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

<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Post;
use App\Models\PostType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
                $types = PostType::query()->pluck('slug', 'type')->toArray();
                return $types[$item->type];
            })
            ->addColumn('action', function ($item){
                $action = editBtn($item, 'post');
                $action .= seoBtn($item, 'post', 'blog');
                $action .= deleteBtn($item, 'post');
                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $model
     * @return Builder
     */
    public function query(Post $model)
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
        return 'Blog_' . date('YmdHis');
    }
}

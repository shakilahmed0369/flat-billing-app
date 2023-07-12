<?php

namespace App\DataTables;

use App\Models\Flat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FlatDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', function($query){
                $edit = "<a href='".route('admin.flat.edit', $query->id)."' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $delete= "<a href='".route('admin.flat.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='fas fa-trash'></i></a>";
                return $edit.$delete;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Flat $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('flat-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('flat_name'),
            Column::make('flat_bill'),
            Column::make('per_unit_cost'),
            Column::make('gass_bill'),
            Column::make('garage_bill'),
            Column::make('maid_bill'),
            Column::make('rubbish_bill'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Flat_' . date('YmdHis');
    }
}

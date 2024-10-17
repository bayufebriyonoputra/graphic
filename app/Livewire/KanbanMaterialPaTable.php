<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use App\Models\KanbanMaterialPa;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class KanbanMaterialPaTable extends PowerGridComponent
{
    use WithExport, LivewireAlert;

    public $kanbanId;
    protected $listeners = [
        'deleteKanban'
    ];

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return KanbanMaterialPa::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('lokasi')
            ->add('month')
            ->add('part_number')
            ->add('part_address')
            ->add('issue')
            ->add('wip');
    }

    public function columns(): array
    {
        return [


            Column::make('Lokasi', 'lokasi')
                ->sortable()
                ->searchable(),
            Column::make('Bulan', 'month')
                ->sortable()
                ->searchable(),
            Column::make('Jumlah Part Number', 'part_number')
                ->sortable()
                ->searchable(),
            Column::make('Jumlah Part Address', 'part_address')
                ->sortable()
                ->searchable(),
            Column::make('Jumlah Issue', 'issue')
                ->sortable()
                ->searchable(),
            Column::make('Jumlah WIP', 'wip')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(KanbanMaterialPa $row): array
    {
        return [
            Button::add('delete')
            ->slot('Delete')
            ->class('bg-red-500 text-white font-bold py-2 px-2 rounded')
            ->dispatch('confirmDelete', ['kanban' => $row->id]),
        ];
    }

    #[On('confirmDelete')]
    public function clickToDelete(KanbanMaterialPa $kanban)
    {
        $this->kanbanId = $kanban->id;

        $this->alert('warning', 'Are you sure , you want to delete this data ? ', [
            'icon' => 'warning',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Delete',
            'cancelButtonText' => 'Cancel',
            'allowOutsideClick' => false,
            'timer' => null,
            'position' => 'center',
            'onConfirmed' => 'deleteKanban'
        ]);
    }
    public function deleteKanban(){
        KanbanMaterialPa::destroy($this->kanbanId);
        $this->dispatch('pg:eventRefresh-default')->to(KanbanMaterialFaTable::class);
 }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}

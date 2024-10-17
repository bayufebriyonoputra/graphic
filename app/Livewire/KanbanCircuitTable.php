<?php

namespace App\Livewire;

use App\Models\KanbanCircuit;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class KanbanCircuitTable extends PowerGridComponent
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
        return KanbanCircuit::query();
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
            ->add('no_control')
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
            Column::make('No Control', 'no_control')
                ->sortable()
                ->searchable(),
            Column::make('Issue', 'issue')
                ->sortable()
                ->searchable(),
            Column::make('WIP', 'wip')
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

    public function actions(KanbanCircuit $row): array
    {
        return [
            // Button::add('edit')
            //     ->slot('Edit: '.$row->id)
            //     ->id()
            //     ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
            //     ->dispatch('edit', ['rowId' => $row->id])
            Button::add('delete')
                ->slot('Delete')
                ->class('bg-red-500 text-white font-bold py-2 px-2 rounded')
                ->dispatch('confirmDelete', ['kanban' => $row->id]),
        ];
    }

    #[On('confirmDelete')]
    public function clickToDelete(KanbanCircuit $kanban)
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
           KanbanCircuit::destroy($this->kanbanId);
           $this->dispatch('pg:eventRefresh-default')->to(KanbanCircuitTable::class);
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

<x-frontend-app-layout>
    @section('title', 'Dashboard')
    @section('h1', 'Dashboard')
    <div class="page-body">
        <div class="container-xl">
            <x-jet-validation-errors class="mb-4" />
            <hr>
            <div class=" row">
                @livewire('inventory-statistic')
                @livewire('inventory')

            </div>
        </div>
    </div>
    <div class="modal modal-blur fade " id="modal-report" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Inventory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('upload-xlsx-to-inventory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Store Name</label>
                            <input type="text" class="form-control" required name="store_name" readonly
                                placeholder="Store Name" value="{{ $store->name ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Custom File Input</div>
                            <input type="file" class="form-control" name="excel_file" required
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Create new project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-frontend-app-layout>

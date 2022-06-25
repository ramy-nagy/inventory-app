<div class=" row">
    <div class="col-md-4 col-lg-4 list-group list-group-flush overflow-auto" style="max-height: 35rem">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Article Name Count</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Article Name</th>
                        <th>Count</th>
                        <th>Short</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statistics as $statistic)
                        <tr>
                            <td class="w-80">{{ $statistic->article_name ?? '' }}</td>
                            <td class="h4 strong">{{ $statistic->count_article_name ?? 0 }}</td>
                            <td class="h4 strong text-danger"><span class="border border-danger p-2">
                                    {{ $statistic->count_short ?? 0 }}</span></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="row col-8 py-0">
        {{-- @if ($models->total() == 0)
            <div class="alert alert-danger" role="alert">
                No Inventory Found For Store — <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report"
                    class="alert-link"> Create new project</a>!
            </div>
        @endif --}}

        <div class="col-12 mb-0">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Enter S/N</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3 ">
                        <label class="form-label">S / N</label>
                        <div>
                            <input type="number" autofocus class="form-control" aria-describedby="emailHelp"
                                placeholder="Enter sn" wire:model="sn">
                            <small class="form-hint">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div wire:loading.delay.long class="spinner-border text-primary h2 " role="status"></div>

                <div class="card-header">
                    <h3 class="card-title">Inventory ( {{ $models->total() }} )</h3>
                </div>

                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>S/N</th>
                                <th>Status</th>
                                <th>Article Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                                <tr>
                                    <td>{{ $model->id ?? '' }}</td>
                                    <td>{{ $model->sn ?? '' }}</td>
                                    <td>{{ $model->status ?? '' }}</td>
                                    <td>{{ $model->article_name ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $models->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

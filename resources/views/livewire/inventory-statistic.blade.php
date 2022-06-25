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
                </tr>
            </thead>
            <tbody>
                @foreach ($InventoryStatistics as $InventoryStatistic)
                <tr>
                    <td class="w-80">{{ $InventoryStatistic->article_name ?? '' }}</td>
                    <td class="h4 strong">{{ $InventoryStatistic->count_article_name ?? 0 }}</td>
                </tr>
                @endforeach
             
            </tbody>
        </table>
    </div>
</div>


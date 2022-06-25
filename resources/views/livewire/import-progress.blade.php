<div>
    @if ($importing && !$importFinished)
        <div wire:poll.5000ms="updateImportProgress" class="alert alert-info alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                </div>
                <div>
                    <h4 class="alert-title">Importing <span class="animated-dots"></span>please wait.</h4>
                    <div class="spinner-border text-green" role="status"></div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    @if ($importFinished)
        <div class="alert alert-success alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                </div>
                <div>
                    <h4 class="alert-title">Wow! importing Finished.</h4>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <span>
                        <b> Success - </b> {{ session('message') }}</span>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Book List</h4>
                        <p class="card-category">All book list</p>
                    </div>
                    <div class="card-body">
                        <div class="text-center visible-print">
                            {!! QrCode::size(500)->generate($studentInfo->id_number); !!}
                            <p>Scan me to return to the original page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading>
        @include('component.loading-state')
    </div>
</div>

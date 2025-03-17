<div class="card">
    <div class="card-body">
        <h5 class="card-title">Recent Activity</h5>

        <div class="activity">

            @foreach($moduleActivity as $key => $activity)
            <div class="activity-item d-flex border-bottom lh-lg py-2">
                <span class="activity-label me-2" data-date="{{$activity->created_at->format('Y-m-d')}}"></span>
                <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                <span class="activity-content">{{ $activity->description }}</span>
            </div><!-- End activity item-->
            @if($key === 7) @break @endif
            @endforeach
        </div>

    </div>
</div>

@push('script')
    jQuery(function($) {
        $('.activity-label').each(function() {
            $(this).text(dayjs($(this).attr('data-date')).fromNow());
        })
    });
@endpush
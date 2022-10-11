<x-app-layout>
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-sub"><span>Gatepass</span></div>
        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">Organizations pass</h2>
                {{-- <div class="nk-block-des">
                    <p>Here is your payment history of account.</p>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="nk-block">
        <div class="card card-bordered">
            <table class="table table-tranx table-billing">
                <thead>
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">#</span></th>
                        <th class="tb-tnx-id"><span class="">Organization</span></th>
                        <th class="tb-tnx-id"><span class="">destination</span></th>
                        <th class="tb-tnx-id"><span class="">Added By</span></th>
                        <th class="tb-tnx-id"><span class="">Added On</span></th>
                    </tr><!-- .tb-tnx-head -->
                </thead>
                <tbody>
                    @forelse ($datas->visits as $visit)
                        <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                                <a href="#"><span>{{ $visit->id }}</span></a>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <span class="title">{{ $visit->organization->display_name }}</span>
                                </div>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-date">
                                    <span class="date">{{ $visit->destination }}</span>
                                </div>
                            </td>
                            <td class="tb-tnx-amount">
                                <div class="tb-tnx-status">
                                    {{ $visit->user->name }}
                                </div>
                            </td>
                            <td class="tb-tnx-amount">
                                <div class="tb-tnx-status">
                                    {{ $visit->created_at }}
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        No data found
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

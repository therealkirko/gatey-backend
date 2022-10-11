<x-app-layout>
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-sub"><span>Team</span></div>
        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">My Team</h2>
                {{-- <div class="nk-block-des">
                    <p>Here is your payment history of account.</p>
                </div> --}}
            </div>
            <div class="nk-block-head-content">
                <ul class="nk-block-tools gx-3">
                    <li>
                        <button class="btn btn-white btn-dim btn-outline-primary" data-toggle="modal" data-target="#modalDefault">
                            <em class="icon ni ni-reports"></em><span><span class="d-none d-sm-inline-block">Add</span> User</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalDefault">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create Organization</h5>
                </div>
                <form action="{{ route('teams.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <x-text-input id="name" class="form-control form-control-lg"
                                type="text"
                                name="name"
                                required
                                placeholder="Enter user name" />
                        </div>

                        <div class="form-group">
                            <x-text-input id="name" class="form-control form-control-lg"
                                type="text"
                                name="email"
                                required
                                placeholder="Enter user email" />
                        </div>

                        <div class="form-group">
                            <x-text-input id="phone" class="form-control form-control-lg"
                                type="text"
                                name="phone"
                                required
                                placeholder="Enter user phone" />
                        </div>

                        <div class="form-group">
                            <select name="organization" class="form-select">
                                <option selected disabled>Choose organization</option>
                                @forelse ($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->display_name }}</option>
                                @empty
                                    <p>No Organization created yet.</p>
                                @endforelse
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <x-primary-button>
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="nk-block">
        <div class="card card-bordered">
            <table class="table table-tranx table-billing">
                <thead>
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">Organization</span></th>
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                <span>Name</span>
                            </span>
                            <span class="tb-tnx-date d-md-inline-block d-none">
                                <span class="d-md-none">Date</span>
                            </span>
                        </th>
                        <th class="tb-tnx-amount">
                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                        </th>
                    </tr><!-- .tb-tnx-head -->
                </thead>
                <tbody>
                    @forelse ($organizations as $organization)
                        @foreach ($organization->users as $user)
                            <tr class="tb-tnx-item">
                                <td class="tb-tnx-id">
                                    <a href="#"><span>{{ $organization->name }}</span></a>
                                </td>
                                <td class="tb-tnx-info">
                                    <div class="tb-tnx-desc">
                                        <span class="title">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="tb-tnx-amount">
                                    <div class="tb-tnx-status">
                                        @if (!$user->pivot->status)
                                            <span class="badge badge-dot badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-dot badge-success">Approved</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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

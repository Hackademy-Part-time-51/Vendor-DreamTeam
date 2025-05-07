<x-layout>
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center display-6" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container text-blu mb-3">
        <hr>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="card-title mb-4 text-center">{{__('user.whyworkWithUs')}}</h1>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-laptop fs-3 me-3 text-white"></i>
                                    <div>
                                        <h5>Smart Working</h5>
                                        <p>{{__('user.remoteWorking')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-graph-up fs-3 me-3 text-success"></i>
                                    <div>
                                        <h5>{{__('user.professionalGrowth')}}</h5>
                                        <p>{{__('user.continuousTraining')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-people fs-3 me-3 text-info"></i>
                                    <div>
                                        <h5>{{__('user.dynamicTeam')}}</h5>
                                        <p>{{__('user.youngStimulating ')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-3">
            <div class="col-12 text-center">
                <h1 class="mb-3">{{__('user.workWithUs')}}</h1>
                <p class="fs-4">{{__('user.joinOurTeam')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="card-title text-center mb-4">{{__('user.candidates')}}</h2>
                        <form action="{{ route('become.revisor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{__('auth.name')}}" required
                                               value="{{ Auth::user()->name }}">
                                        <label for="name">{{__('auth.name')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="surname" name="surname" placeholder="{{__('auth.surname')}}">
                                        <label for="surname">{{__('auth.surname')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required
                                               value="{{ Auth::user()->email }}">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{__('auth.telephoneNumber')}}"
                                               value="{{ Auth::user()->phone }}">
                                        <label for="phone">{{__('auth.telephoneNumber')}}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select bg-blu text-white" id="position" name="position" required>
                                            <option value="developer">{{__('auth.reviewer')}}</option>
                                        </select>
                                        <label for="position" class="text-white">{{__('auth.positionInterest')}}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-2">
                                        <textarea class="form-control text-blu" id="experience" name="experience" style="height: 100px"
                                                  placeholder="Esperienza"></textarea>
                                        <label for="experience" class="text-blu fs-6">{{__('auth.tellUs')}}...</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-add text-white border scalebig btn-lg w-100">
                                        {{__('auth.sendApplication')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="card-title mb-4">{{__('auth.openPositions')}}</h2>
                        <div class="accordion" id="openPositions">
                            <div class="accordion-item bg-blu text-white border-secondary">
                                <h3 class="accordion-header">
                                    <button class="accordion-button bg-blu text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#position1">
                                        {{__('auth.reviewer')}}
                                    </button>
                                </h3>
                                <div id="position1" class="accordion-collapse collapse show" data-bs-parent="#openPositions">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                               {{__('auth.editAndDelete')}}
                                            </li>
                                            <li>
                                                <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                                {{__('auth.reviewingPosts')}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
    </div>
</x-layout>

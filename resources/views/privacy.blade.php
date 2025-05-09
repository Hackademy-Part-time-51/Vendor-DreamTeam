<x-layout>
    <div class="container py-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-blu text-white text-center py-4">
                <h2 class="card-title mb-0 noto-sans">
                    <i class="bi bi-shield-lock-fill me-2"></i> {{__('assistance.privacyPolicy')}}
                </h2>
            </div>
        
            <div class="card-body montserrat px-4">
                <p class="text-blu lead">
                  {{__('assistance.yourPrivacy')}}
                </p>

                <hr class="bg-blu">

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-file-lock-fill me-2"></i>{{__('assistance.dataCollected')}}</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{__('assistance.informationProvided')}}</li>
                        <li class="list-group-item">{{__('assistance.dataPublished')}}</li>
                        <li class="list-group-item">{{__('assistance.browsingInformation')}}</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-lock-fill me-2"></i>{{__('assistance.useOfData')}}</h4>
                    <p>{{__('assistance.weUseData')}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{__('assistance.correctFunctioning')}}</li>
                        <li class="list-group-item">{{__('assistance.improveUserExperience')}}</li>
                        <li class="list-group-item">{{__('assistance.protectUsers')}}</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-person-lock me-2"></i>{{__('assistance.dataProtection')}}</h4>
                    <p>{{__('assistance.advancedSecurity')}}</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-person-check me-2"></i>{{__('assistance.userRights')}}</h4>
                    <p>{{__('assistance.usersHaveRight')}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{__('assistance.accessPersonalData')}}</li>
                        <li class="list-group-item">{{__('assistance.requestModification')}}</li>
                        <li class="list-group-item">{{__('assistance.objectProcessing')}}</li>
                    </ul>
                </div>

                <hr class="bg-blu">

                <div class="text-center mt-4">
                    <button class="btn btn-rosso px-4 py-2">
                        <i class="bi bi-trash-fill me-2"></i>{{__('assistance.requestDeletion')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>

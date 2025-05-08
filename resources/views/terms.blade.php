<x-layout>
    <div class="container py-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-blu text-white text-center py-4">
                <h2 class="card-title mb-0 noto-sans">
                    <i class="bi bi-file-text-fill me-2"></i> {{__('assistance.termsAndConditions')}}
                </h2>
            </div>
        
            <div class="card-body montserrat px-4">
                <p class="text-blu lead">
                    {{__('assistance.readTermsConditions')}}
                </p>

                <hr class="bg-blu">

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-clipboard-check me-2"></i>{{__('assistance.acceptanceTheTerms')}}</h4>
                    <p>{{__('assistance.agreeTheTerms')}}</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-cart-check me-2"></i>{{__('assistance.useService')}}</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{__('assistance.userBuyProducts')}}</li>
                        <li class="list-group-item">{{__('assistance.deceptivePurposes.')}}</li>
                        <li class="list-group-item">{{__('assistance.provideTruthfulInformation ')}}</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{__('assistance.userResponsibility')}}</h4>
                    <p>{{__('assistance.responsibleForTheContent')}}</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-shield-lock me-2"></i>{{__('assistance.dataProtection')}}</h4>
                    <p>{{__('assistance.processingPersonalData')}}<a href="/privacy" class="text-blu">{{__('assistance.privacyPolicy')}}</a>.</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-gear-fill me-2"></i>{{__('assistance.changesTerms')}}</h4>
                    <p>{{__('assistance.responsiveUpdate')}}</p>
                </div>

                <hr class="bg-blu">

                <div class="text-center mt-4">

                    @auth
                    <form action="">
                    <button class="btn btn-rosso px-4 py-2">
                        <i class="bi bi-person-x-fill me-2"></i>{{__('assistance.deactivateAccount')}}
                    </button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>

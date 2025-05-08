<x-layout>
    <section class="container-fluid py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-4 fw-bold text-blu montserrat">{{__('assistance.frequentlyAskedQuestions')}}(FAQ)</h2>
                    <p class="fs-5 text-muted noto-sans">{{__('assistance.commonQuestions')}}</p>
                    <hr class="w-50 mx-auto">
                </div>
            </div>
    
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="accordion accordion-flush" id="faqAccordion">
    
                        <div class="accordion-item border-bottom mb-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed text-blu fs-4 fw-semibold noto-sans bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="bi bi-patch-question-fill me-3 text-verde"></i>
                                    {{__('assistance.sellItem')}}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-blu fs-5 montserrat">
                                    {{__('assistance.toSellItem')}}
                                </div>
                            </div>
                        </div>
    
                        <div class="accordion-item border-bottom mb-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-blu fs-4 fw-semibold noto-sans bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="bi bi-shield-check me-3 text-verde"></i>
                                    {{__('assistance.safeBuy')}}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-blu fs-5 montserrat">
                                   {{__('assistance.meetingBetweenBuyers')}} <a href="#" class="text-blu fw-bold">{{__('assistance.safetyGuidelines')}}</a> {{__('assistance.forMoreDetails')}}
                                </div>
                            </div>
                        </div>
    
                        <div class="accordion-item border-bottom mb-3">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-blu fs-4 fw-semibold noto-sans bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="bi bi-chat-dots-fill me-3 text-verde"></i>
                                    {{__('assistance.contactASeller')}}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-blu fs-5 montserrat">
                                   {{__('assistance.sellerResponds')}}
                                </div>
                            </div>
                        </div>
    
                        <div class="accordion-item border-bottom mb-3">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-blu fs-4 fw-semibold noto-sans bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="bi bi-currency-euro me-3 text-verde"></i>
                                    {{__('assistance.paymentsWork')}}
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-blu fs-5 montserrat">
                                    {{__('assistance.managePayments')}}
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h3 class="text-blu noto-sans">{{__('assistance.findTheAnswer')}}</h3>
                    <p class="fs-5 text-muted montserrat mb-4">{{__('assistance.supportTeam')}}</p>
                    <a href="#" class="btn btn-baseblu btn-lg py-3 px-5 scalebig">
                        <i class="bi bi-headset me-2"></i>{{__('assistance.contactSupport')}}
                    </a>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>
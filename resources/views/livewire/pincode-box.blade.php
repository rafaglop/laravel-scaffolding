<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            
            <div class="card-body p-lg-5">
                
                <h1 class="card-heading">
                    {{ __('¡Participa!') }} 
                </h1>
                <p class="lead">
                    {{ __('No hay límites: puedes usar tantos pincodes como quieras.') }}
                </p>
                
                <form wire:submit.prevent="checkPincode">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul class="list-unstyled m-0 p-0">
                            @foreach ($errors->all() as $error)
                            <li class="fw-bolder">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    
                    <!-- Step 1 (PINCODE) -->
                    @if($currentStep == 1)
                    <div class="bg-light rounded p-3 p-lg-4 shadow-sm text-center mb-3 animate__animated animate__flipInX">
                        <label for="pincode" class="d-block mb-3 fs-2">{{ __('Pincode') }}</label>
                        <input type="text" class="form-control text-center fw-bold text-primary form-control-lg" id="pincode" onkeyup="this.value = this.value.toUpperCase()" autofocus tabindex="1" wire:model.defer="pincode" maxlength="{{ $pincodeLength }}" minlength="{{ $pincodeLength }}" required placeholder="Introduce tu pincode">
                        
                        <button type="button" class="btn btn-primary px-5 mt-3" wire:click.prevent="firstStepSubmit">
                            {{ __('Siguiente') }} <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                    @endif
                    
                    <!-- Step 2 (POSTAL CODE) -->
                    @if($currentStep == 2)
                    <div class="bg-light rounded p-3 p-lg-4 shadow-sm text-center mb-3 animate__animated animate__flipInX">
                        <label for="postalCode" class="d-block mb-3 fs-2">{{ __('Tu código postal') }}</label>
                        <input type="text" class="form-control text-center fw-bold text-primary form-control-lg" id="postalCode" placeholder="Código postal" tabindex="2" wire:model.defer="postalCode" pattern="[0-9]*" maxlength="5" required>

                        <button type="button" class="btn btn-primary px-5  mt-3" wire:click.prevent="secondStepSubmit">
                            {{ __('Siguiente') }} <i class="bi bi-arrow-right"></i>
                        </button>    
                    </div>
                    @endif

                    <!-- Step 3 (OPTIONAL - CONFIRM POSTAL CODE) -->
                    @if($currentStep == 3)
                    <div class="bg-light rounded p-3 p-lg-4 shadow-sm text-center mb-3 animate__animated animate__flipInX">
                        <p class="lead fw-bold my-3">{{ __('Por favor, elige tu localidad') }}</p>

                        <ul class="list-group text-start">
                            @foreach($choosePostalCode as $cp)
                            <li class="list-group-item" wire:key="cp-{{ $cp->id }}">
                                <input class="form-check-input me-1" type="radio" name="localityCheck" value="{{ $cp->id }}" id="postalCode-{{ $cp->id }}" wire:model.defer="locality">
                                <label class="form-check-label" for="postalCode-{{ $cp->id }}">
                                    {{ $cp->locality }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        
                        <button type="button" class="btn btn-primary px-5  mt-3" wire:click.prevent="thirdStepSubmit">
                            {{ __('Siguiente') }} <i class="bi bi-arrow-right"></i>
                        </button>  
                    </div>
                    @endif   

                    <!-- Step 4 (THANKS) -->
                    @if($currentStep == 4)
                    <div class="bg-primary text-light rounded p-3 p-lg-4 shadow-sm text-center mb-3 animate__animated animate__flipInX">
                        <h2>{{ __('¡Genial!') }}</h2>
                        <p class="lead">{{ __('Tu pincode se ha activado correctamente y ya puedes verlo en tu panel de control.') }}</p>
                        <a href="{{ route('customer.index') }}" class="btn btn-outline-light btn-sm">
                            {{ __('Panel de control') }}
                        </a>
                    </div>
                    @endif
                </div>
                
            </form>
            
        </div>
    </div>
</div>
</div>